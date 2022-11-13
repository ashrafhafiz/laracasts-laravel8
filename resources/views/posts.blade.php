@extends('layout')

@section('content')
    @foreach($posts as $post)
        <article class="@if($loop->even) even @else odd @endif">
            <h1><a href="{{'posts/'. $post->slug}}">{{ $post->title }}</a></h1>
            {!! $post->excerpt !!}
        </article>
    @endforeach
@endsection
