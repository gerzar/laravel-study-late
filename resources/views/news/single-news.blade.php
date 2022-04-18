@extends('layouts/main')
@section('content')

    <h2>{{$single_news->title}}</h2>
    <span>Author: {{$single_news->user->name}}</span>
    <br>
    <span>Category: <a
            href="{{route('news.category.show', ['category_id' => $single_news->category->id])}}">{{$single_news->category->title}}</a></span>
    <hr>
    <img src="{{ Helpers::correctImageUrl($single_news->image) }}" alt="">
    <p>{!! $single_news->description !!}</p>

@endsection

