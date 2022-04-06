@extends('layouts/admin')

@section('content-header')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">News</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('admin.news.create')}}">Add news</a>
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
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Excerpt</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news_list as $news)
                <tr>
                    <td>{{$news->id}}</td>
                    <td>{{$news->title}}</td>
                    <td>{{$news->user->name}}</td>
                    <td>{{$news->category->title}}</td>
                    <td>{{ Str::words($news->short_description, 10)}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('admin.news.edit', ['news' => $news])}}">Edit</a>
                        <button class="btn btn-danger" type="submit" onclick="ajax(this)" data-csrf="{{csrf_token()}}" value="{{route('admin.news.destroy', $news)}}">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan=6>Nothing here...</td>
                </tr>
            @endforelse

            </tbody>
        </table>
        {!! $news_list->links() !!}
    </div>

@endsection

@push('js')
    <script src="{{asset('js/ajax.js')}}"></script>
@endpush
