<div x-data="{show : false}" @click.away="show = false" class="w-full">
    <button @click="show = !show"
            class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left">
        {{ isset($currentCategory) ? $currentCategory->name : 'Category' }}
    </button>

    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display: none">

        <x-dropdown-item href="/" :active="request()->routeIs('home')">All Categories</x-dropdown-item>

        @foreach($categories as $category)
            {{--                        <x-dropdown-item href="/categories/{{ $category->slug }}"--}}
            <x-dropdown-item
                href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"
                :active='request()->is("categories/{$category->slug}")'>
                {{ $category->name }}
            </x-dropdown-item>
        @endforeach
    </div>
</div>

<x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
