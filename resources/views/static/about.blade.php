@extends('layouts/main')
@section('content')
    <h2>
        About
    </h2>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam assumenda cupiditate delectus dolore
        dolorum id, impedit magni nulla, obcaecati optio perferendis praesentium quidem quos reprehenderit repudiandae
        saepe sunt voluptates!
    </p>
    <p>
        Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Eligendi tenetur laborum ducimus, molestias, nisi
        eaque beatae, perspiciatis neque repudiandae dicta recusandae? Reiciendis, ullam iusto nobis labore modi, libero
        aut recusandae! Nesciunt molestiae, dolorum illo blanditiis earum nostrum obcaecati eveniet quos cupiditate ut.
        Omnis consectetur veniam sequi itaque ab explicabo hic at voluptates exercitationem, alias asperiores accusamus
        ipsam eius pariatur aspernatur ad necessitatibus laboriosam iure officia nam doloremque eveniet soluta, ut
        ratione. Omnis quia, eaque nihil? Doloribus nulla doloremque molestias. Magni odit expedita quod suscipit
        reprehenderit assumenda optio eos, incidunt praesentium, exercitationem autem deleniti, ad nesciunt earum beatae
        repellat iure omnis totam laboriosam. Atque, quos veritatis commodi, debitis voluptatibus quis ex labore nulla
        aliquid distinctio magni doloremque ipsum? Voluptatum quae, deserunt ad temporibus similique sapiente magnam
    </p>
    <form method="post" action="{{route('feedback.create')}}">
        @csrf

        <div class="form-group">
            <label for="title"></label>
            <input type="text" class="form-control" id="title" placeholder="Subject" name="title" input="{{@old('title')}}" required>
            <small id="title" class="form-text text-muted">Enter a Subject of your message</small>
        </div>
        <br>

        <div class="form-group">
            <label for="username"></label>
            <input type="text" class="form-control" id="username" placeholder="User name" name="username" input="{{@old('username')}}" required>
            <small id="title" class="form-text text-muted">Enter your Name</small>
        </div>
        <br>

        <div class="form-group">
            <label for="message">Description</label>
            <textarea class="form-control" name="message" id="message" rows="3" required>{!! @old('message') !!}</textarea>
            <small id="title" class="form-text text-muted">Enter your message here</small>
        </div>
        <br>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" input="{{@old('email')}}" required >
            <small id="title" class="form-text text-muted">Enter your e-mail here</small>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
    <br>
@endsection
