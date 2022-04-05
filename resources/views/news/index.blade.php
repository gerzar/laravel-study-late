@extends('layouts/main')
@section('content')
    <!-- Post preview-->


    @foreach($news_list as $news)


        <div class="post-preview">
            <a href="{{route('news.show', ['id' => $news->id])}}">
                <h2 class="post-title">{{$news->title}}</h2>
                <h3 class="post-subtitle">{{$news->short_description}}</h3>
            </a>
            <p class="post-meta">
                Category: <a href="{{route('news.category.show', ['category_id' => $news->category->id])}}">{{$news->category->title}}</a>
                <br>
                Author: <b>{{$news->user->name}}</b>
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4" />

    @endforeach



    <!-- Post preview-->

    {{$news_list->links()}}

@endsection
