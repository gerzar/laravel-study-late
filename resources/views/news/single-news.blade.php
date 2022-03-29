@extends('layouts/main')
@section('content')

    <h2>{{$single_news->title}}</h2>
    <span>Author: {{$single_news->author}}</span>
    <hr>
    <img src="{{$single_news->image}}" alt="">
    <p>{{$single_news->description}}</p>

@endsection
