@extends('layout')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <h4>Author:</h4>
        <h5>{{ $post->date }}</h5>
        <p>{!! $post->body !!}</p>
    </article>

    <a href="/">Home</a>
@endsection
