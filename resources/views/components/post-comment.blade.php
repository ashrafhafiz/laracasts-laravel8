<article class="flex bg-gray-100 border border-gray200 rounded-xl p-6 space-x-4">
    <div class="flex-shrink-0"><img src="https://i.pravatar.cc/60?u={{ $comment->user->id }}" width="60" height="60"
            class="rounded-xl" alt="user"></div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->user->username }}</h3>
            <p class="text-xs">Posted <time>{{ $comment->created_at->diffForHumans() }}</time></p>
        </header>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
