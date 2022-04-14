@extends('layouts/admin')

@section('content-header')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add article</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>
        </div>
    </div>
@endsection

@section('content')

    <form method="post" action="{{route('admin.news.store')}}" enctype="multipart/form-data">
        @csrf


        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" required>

                <option value="published">Published</option>
                <option value="unpublished">Unpublished</option>
                <option value="draft">Draft</option>

            </select>
        </div>
        <br>

        <div class="form-group">
            <label for="title"></label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title" >
            <small id="title" class="form-text text-muted">Enter a bright title for the article</small>
        </div>
        <br>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" ></textarea>
            <small id="title" class="form-text text-muted">Enter actual text for the article</small>
        </div>
        <br>

        <div class="form-group">
            <label for="short_description">Excerpt</label>
            <textarea class="form-control" name="short_description" id="short_description" rows="3" ></textarea>
            <small id="title" class="form-text text-muted">Enter short description what about your article</small>
        </div>
        <br>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <small id="title" class="form-text text-muted">Upload image</small>
        </div>
        <br>

        <div class="form-group">
            <label for="category_id">Categories</label>
            <select name="category_id" id="category_id">

                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach

            </select>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection

@push('js')

    <script src="{{asset('js/ckeditor.js')}}"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ))
            .catch( error => {
                console.error( error );
            } );
    </script>

@endpush
