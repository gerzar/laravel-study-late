@extends('layouts/admin')

@section('content-header')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('admin.categories.create')}}">Add category</a>
            </div>
        </div>
    </div>
@endsection


@section('content')


    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
{{--            {{dd($category_list)}}--}}
            @forelse($category_list as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('admin.categories.edit', ['category' => $category])}}">Edit</a>
                        <button class="btn btn-danger" type="submit" onclick="ajax(this)" data-csrf="{{csrf_token()}}" value="{{route('admin.categories.destroy', $category)}}">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nothing here...</td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>
    {{$category_list->links()}}
@endsection

@push('js')
    <script src="{{asset('js/ajax.js')}}"></script>
@endpush
