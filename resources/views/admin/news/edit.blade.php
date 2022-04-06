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
    <form method="post" action="{{route('admin.news.update', ['news' => $news])}}">
        @csrf
        @method('put')

        <input type="hidden" name="image" value="123">
        <input type="hidden" name="author" value="1">

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" required>

                <option value="published" @if($news->status === 'published') selected @endif>Published</option>
                <option value="unpublished" @if($news->status === 'unpublished') selected @endif>Unpublished</option>
                <option value="draft" @if($news->status === 'draft') selected @endif>Draft</option>

            </select>
        </div>
        <br>

        <div class="form-group">
            <label for="title"></label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$news->title}}" required>
            <small id="title" class="form-text text-muted">Enter a bright title for the article</small>
        </div>
        <br>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" required>{!! $news->description !!}</textarea>
            <small id="title" class="form-text text-muted">Enter actual text for the article</small>
        </div>
        <br>

        <div class="form-group">
            <label for="short_description">Excerpt</label>
            <textarea class="form-control" name="short_description" id="short_description" rows="3" required>{!! $news->short_description !!}</textarea>
            <small id="title" class="form-text text-muted">Enter short description what about your article</small>
        </div>
        <br>

        <div class="form-group">
            <label for="category_id">Categories</label>
            <select name="category_id" id="category_id">

                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($news->category_id === $category->id) selected @endif>{{$category->title}}</option>
                @endforeach

            </select>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
