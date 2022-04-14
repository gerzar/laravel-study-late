@extends('layouts/admin')

@section('content-header')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Feedback</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
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
                <th scope="col">Subject</th>
                <th scope="col">E-mail</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($feedbacks as $feedback)
                <tr>
                    <td>{{$feedback->id}}</td>
                    <td>{{$feedback->title}}</td>
                    <td>{{$feedback->email}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('admin.feedback.show',  $feedback)}}">View</a>

                        <button class="btn btn-danger" type="submit" onclick="ajax(this)" data-csrf="{{csrf_token()}}" value="{{route('admin.feedback.destroy', $feedback)}}">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nothing here...</td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>

@endsection

@push('js')
    <script src="{{asset('js/ajax.js')}}"></script>
@endpush
