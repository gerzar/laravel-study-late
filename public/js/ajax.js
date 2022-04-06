
function ajax(e) {
    let url = e.value;
    let csrf = e.dataset.csrf;
    e.setAttribute("disabled", "disabled");

    if (confirm("Are you sure? You are can't restore this.")) {
        fetch(url, {
            method: "DELETE",
            headers: {"X-CSRF-TOKEN": csrf}
        })
            .then((response) => {
                if (response.statusText === 'OK')
                    deleteElements(e)
            })
            .catch(() => {
                console.log('Error')
                e.removeAttribute("disabled")
            });
    }
    e.removeAttribute("disabled")
}

function deleteElements(e) {
    e.parentNode.parentNode.remove();
}


