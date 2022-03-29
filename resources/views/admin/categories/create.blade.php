@extends('layouts/admin')

@section('content-header')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>
        </div>
    </div>
@endsection

@section('content')
    <form method="post" action="{{route('admin.categories.store')}}">
        @csrf
        <br>
        <div class="form-group">
            <input type="text" class="form-control" id="title" placeholder="Category name" name="title" input="{{@old('title')}}" required>
            <small id="title" class="form-text text-muted">Enter Category name</small>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>

@endsection
