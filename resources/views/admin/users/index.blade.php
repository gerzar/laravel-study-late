@extends('layouts/admin')

@section('content-header')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('admin.users.create')}}">Add user</a>
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
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Password</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('admin.users.edit', $user)}}">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nothing here...</td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>

@endsection

