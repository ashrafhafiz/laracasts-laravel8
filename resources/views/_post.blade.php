@extends('layouts._layout')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <h5>Written by: <a href="/users/{{ $post->user->username }}">{{ $post->user->name }}</a> | Category: <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
        <h5>{{ $post->date }}</h5>
        <p>{!! $post->body !!}</p>
    </article>

    <a href="/">Home</a>
@endsection
