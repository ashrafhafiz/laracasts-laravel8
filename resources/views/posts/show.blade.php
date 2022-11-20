@extends('layouts.layout')

@section('content')
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/images/illustration-1.png" alt="" class="rounded-xl">
                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>
                <a href="/?user={{ $post->user->username }}">
                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">{{ $post->user->name }}</h5>
                            <h6>Mascot at Laracasts</h6>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-8">
                <div class="flex justify-between mb-6">
                    <a href="{{ url()->previous() }}"
                        class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Previous Posts
                    </a>

                    <div class="space-x-2">
                        <x-category-button :category="$post->category" />
                        <x-update-button />
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>{{ $post->body }}</p>
                </div>
            </div>
            {{-- Comments Section --}}

            <section class="col-start-5 col-span-8 mt-10 space-y-6">
                <form method="POST" action="#" class="border border-gray-200 p-6 rounded-xl">
                    @csrf
                    <header class="flex items-center">
                        <img src="https://i.pravatar.cc/60?u={{ auth()->user() }}" width="40" height="40"
                            class="rounded-full" alt="avatar">
                        <h2 class="ml-4">Want to participate?</h2>
                    </header>
                    <div class="mt-6">
                        <textarea class="w-full text-sm focus:outline-none focus:ring bg-gray-50 p-3" cols="30" rows="10"
                            style="resize:none" type="text" name="body" id="body" placeholder="Quick, think of something to say!"></textarea>
                    </div>
                    <div class="flex justify-end mt-10">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white text-sx font-semibold py-2 px-10 rounded-2xl">Add
                            Comment</button>
                    </div>
                </form>
                @foreach ($post->comments as $comment)
                    <x-post-comment :comment="$comment" />
                @endforeach
            </section>

        </article>
    </main>
@endsection
