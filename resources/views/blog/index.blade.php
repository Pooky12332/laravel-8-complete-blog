@extends('layouts.app')

@section('content')
    <div class="bg-white pt-10 grid grid-cols-1 m-auto ">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-14 sm:m-auto w-4/5 block text-center border-b-2 border-black">
                <h1 class="sm:text-black text-6xl uppercase font-neovibe text-shadow-md pb-14">
                    SpinList
                </h1>
            </div>
        </div>
    </div>

    <div class="w-4/5 pb-5 m-auto text-left">
        <div class="py-3 border-b border-black">
            <h1 class="pl-2 text-3xl font-bold">
                All Posts
            </h1>
        </div>
    </div>

@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="text-gray-50">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if (Auth::check())
    <div class="w-4/5 m-auto pb-4">
        <a 
            href="/blog/create"
            class="hover:text-red-500">
            [Create post]
        </a>
    </div>
@endif

@foreach ($posts as $post)
    <div class="m-auto w-4/5 gap-10 no-underline transition duration-150 ease-in-out hover:text-red-600 pb-5">
        <a class="flex" href="{{ route('blog.show', $post->slug) }}">
            <div class="w-2\/6">
                <img class="max-w-[300px]" src="{{ asset('images/' . $post->image_path) }}" width="300" alt="{{ $post->title }}">
            </div>
            <div class="w-4\/6">
                <p class="pt-1 pl-3 text-lg font-medium">{{ $post->title }}</p>
                <p class="pt-1 pl-3 italic text-gray-600">{{ date('jS M Y', strtotime($post->updated_at)) }}</p>
                <p class="pt-1 pl-3 text-sm text-gray-400">{!! \Illuminate\Support\Str::limit($post->description, 300) !!}</p>
            </div>
        </a>
        
        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
            <div class="flex justify-end space-x-4">
                <span>
                    <a href="/blog/{{ $post->slug }}/edit" class="">
                        [Edit]
                    </a>
                </span>

                <span>
                    <form action="/blog/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="" type="submit">[Delete]</button>
                    </form>
                </span>
            </div>
        @endif
    </div>
@endforeach

@endsection