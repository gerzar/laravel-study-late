@extends('layouts/admin')

@section('content-header')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">

        <div class="row g-0">
            <div class="col-4 border fw-bold">ID</div>
            <div class="col-8 border">{{$feedback->id}}</div>
        </div>

        <div class="row g-0">
            <div class="col-4 border fw-bold">Subject</div>
            <div class="col-8 border">{{$feedback->title}}</div>
        </div>

        <div class="row g-0">
            <div class="col-4 border fw-bold">Message</div>
            <div class="col-8 border">{{$feedback->message}}</div>
        </div>

        <div class="row g-0">
            <div class="col-4 border fw-bold">Username</div>
            <div class="col-8 border">{{$feedback->username}}</div>
        </div>

        <div class="row g-0">
            <div class="col-4 border fw-bold">E-mail</div>
            <div class="col-8 border">{{$feedback->email}}</div>
        </div>

        <div class="row g-0">
            <div class="col-4 border fw-bold">Created At</div>
            <div class="col-8 border">{{$feedback->created_at}}</div>
        </div>

    </div>

@endsection
