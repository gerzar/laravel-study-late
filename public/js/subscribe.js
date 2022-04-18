function subscribe(e) {
    let url = e.value;
    let csrf = e.dataset.csrf;
    e.setAttribute("disabled", "disabled");

    fetch(url, {
        method: "POST",
        headers: {"X-CSRF-TOKEN": csrf}
    })
        .then((response) => {

            responseHandler(response, e)

        })
        .catch((response) => {
            console.log(response)
        });

}


function unsubscribe(e) {
    let url = e.value;

    e.setAttribute("disabled", "disabled");

    fetch(url, {
        method: "DELETE",
        headers: {"X-CSRF-TOKEN": e.dataset.csrf}
    })
        .then((response) => {
            response.json().then(function (value) {

                let messageElement = showMessage(e, value.message);
                setTimeout(() => {

                    messageElement.remove();

                    e.innerText = 'Subscribe';

                    transformUrl(e, 'subscribe', value.category_id);

                    e.setAttribute('onclick',`subscribe(this)`);

                    e.removeAttribute("disabled");

                }, 2000);

            });
        })
        .catch((response) => {
            console.log(response)
        });

}


function showMessage(e, text) {
    e.insertAdjacentHTML('beforebegin', `<p id="ajax-message" class="alert alert-info">${text}</p>`);
    return document.getElementById('ajax-message');
}

function transformUrl(element, address, category_id) {
    let urlArr = element.value.split('/');
    urlArr[4] = address;
    urlArr[5] = category_id;
    element.value = urlArr.join('/');
    return element;
}

function responseHandler(response, e) {

    let messageElement;

    if (response.status !== 200) {

        response.json().then(function (value) {

            messageElement = showMessage(e, value.message);
            setTimeout(() => {

                messageElement.remove();

                e.removeAttribute("disabled");

            }, 2000);

        });

        return;

    }

    response.json().then(function (value) {

        messageElement = showMessage(e, value.message);
        setTimeout(() => {

            messageElement.remove();

            e.innerText = 'Unsubscribe';

            transformUrl(e, 'unsubscribe', value.category_id);

            e.setAttribute('onclick',`unsubscribe(this)`);

            e.removeAttribute("disabled");

        }, 2000);

    });
}
