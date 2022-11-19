@extends('layouts.layout')

@section('content')
    <section class="px-6 py-8">
        <main class="max-w-xl mx-auto p-6 mt-10 bg-gray-100 border border-gray-200 rounded-xl">

            <h1 class="text-center font-extrabold text-3xl text-blue-600">Sign In</h1>

            <form method="POST" action="/login" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}"
                        class="border border-gray-400 p-2 w-full">
                    {{-- @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror --}}
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required value="{{ old('password') }}"
                        class="border border-gray-400 p-2 w-full">
                    {{-- @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror --}}
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-600 text-white font-bold rounded py-2 px-4 hover:bg-blue-500">Sign
                        In</button>
                </div>

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

            </form>

        </main>
    </section>
@endsection
