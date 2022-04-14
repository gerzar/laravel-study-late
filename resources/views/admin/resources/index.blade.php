@extends('layouts/admin')

@section('content-header')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Resources</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('admin.resources.create')}}">Add resource</a>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <a href="/admin/parse" target="_blank">Add more news!</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Resource link</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            {{--            {{dd($category_list)}}--}}
            @forelse($resources as $resource)
                <tr>
                    <td>{{$resource->id}}</td>
                    <td>{{$resource->site_url}}</td>
                    <td>
                        <button class="btn btn-danger" type="submit" onclick="ajax(this)" data-csrf="{{csrf_token()}}" value="{{route('admin.resources.destroy', $resource)}}">Delete</button>
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
    {{$resources->links()}}
@endsection

@push('js')
    <script src="{{asset('js/ajax.js')}}"></script>
@endpush
