@extends('layouts/main')
@section('content')
    <!-- Post preview-->



    @forelse($news_list as $news)


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
    @empty

        <div class="post-preview">
            <p class="post-meta">
                Subscribe on categories to see updates from your favorite categories
            </p>
        </div>

    @endforelse



    <!-- Post preview-->

    @if($news_list)
        {{$news_list->links()}}
    @endif
@endsection
