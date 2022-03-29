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
    <form method="post" action="{{route('admin.news.store')}}">
        @csrf
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="published" @if(@old('status') === 'published') selected @endif>Published</option>
                <option value="unpublished" @if(@old('status') === 'unpublished') selected @endif>Unpublished</option>
                <option value="draft" @if(@old('status') === 'draft') selected @endif>Draft</option>

                <option value="draft" <?php if(!empty($_POST['status'])){ echo "selected" ;} ?>>Draft</option>
            </select>
        </div>
        <br>

        <div class="form-group">
            <label for="title"></label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title" input="{{@old('title')}}" required>
            <small id="title" class="form-text text-muted">Enter a bright title for the article</small>
        </div>
        <br>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" required>{!! @old('description') !!}</textarea>
            <small id="title" class="form-text text-muted">Enter actual text for the article</small>
        </div>
        <br>

        <div class="form-group">
            <label for="short_description">Excerpt</label>
            <textarea class="form-control" name="short_description" id="short_description" rows="3" required>{!! @old('short_description') !!}</textarea>
            <small id="title" class="form-text text-muted">Enter short description what about your article</small>
        </div>
        <br>

        <div class="form-group">
            <label for="category">Categories</label>
            <select name="category" id="category" required>
                <option value="1" @if(@old('status') === '1') selected @endif>Domestic</option>
                <option value="2" @if(@old('status') === '2') selected @endif>Foreign</option>
            </select>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
