@extends('layouts.layout')

@section('content')
    <section class="px-6 py-8">
        <div class="border border-gray-200 p-6 rounded-xl mx-auto max-w-2xl">
            <form action="/admin/posts/store" method="post">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Post Title</label>
                    <input type="text" name="title" id="title" required value="{{ old('title') }}"
                        class="border border-gray-400 p-2 w-full">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Post Body</label>
                    <textarea class="w-full text-sm focus:outline-none focus:ring bg-gray-50 p-3" cols="30" rows="15"
                        style="resize:none" type="text" name="body" id="body" placeholder="What do you want to publish!">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{--  --}}
                <div class="mt-6">
                    <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                    <select name="category_id" id="category_id" class="w-1/3 p-2 text-sm border border-gray-200 rounded">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp
                        <option value="" disabled selected>Select a category...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{--  --}}
                <div class="flex justify-end mt-10">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white text-sx font-semibold py-2 px-10 rounded-2xl">Publish</button>
                </div>
            </form>
        </div>
    </section>
@endsection
