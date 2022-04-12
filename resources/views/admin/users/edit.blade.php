@extends('layouts/admin')

@section('content-header')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit user</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>
        </div>
    </div>
@endsection
@section('content')
    <form method="post" action="{{route('admin.users.update', $user)}}">
        @csrf
        @method('put')
        <br>
        <div class="form-group">
            <input type="text" class="form-control" id="title" placeholder="Name" name="name" value="{{$user->name}}" required>
            <small id="title" class="form-text text-muted">Enter User name</small>
        </div>
        <br>


        <br>
        <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$user->email}}" required>
            <small id="email" class="form-text text-muted">Enter User email</small>
        </div>
        <br>

        <br>
        <div class="form-group">
            <input type="chat_id" class="form-control" id="chat_id" placeholder="Telegram chat ID" name="chat_id" value="@if(isset($user->telegramUserInfo->chat_id)){{$user->telegramUserInfo->chat_id}}@endif">
            <small id="chat_id" class="form-text text-muted">Enter Telegram chat</small>
        </div>
        <br>

        <br>
        <div class="form-group">
            <select name="is_admin" id="is_admin" required>
                <option value="0" @if($user->is_admin == 0) selected @endif>User</option>
                <option value="1" @if($user->is_admin == 1) selected @endif>Admin</option>
            </select>
        </div>
        <br>



        <button type="submit" class="btn btn-primary">Save</button>

    </form>

@endsection
