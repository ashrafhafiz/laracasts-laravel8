@extends('layout')

@section('content')
    @foreach($posts as $post)
        <article class="@if($loop->even) even @else odd @endif">
            <h1><a href="{{'/posts/'. $post->slug}}">{{ $post->title }}</a></h1>
            <h5>Written by: <a href="/users/{{ $post->user->username }}">{{ $post->user->name }}</a> | Category: <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
            {!! $post->excerpt !!}
        </article>
    @endforeach
@endsection
