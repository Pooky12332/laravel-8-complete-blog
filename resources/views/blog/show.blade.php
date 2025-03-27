@extends('layouts.app')

@section('content')
<div class="relative pt-10 grid grid-cols-1 m-auto h-70 bg-cover bg-center overflow-hidden">
    <div class="absolute inset-0 w-full h-max"
       style="background-image: url('{{ asset('images/' . $post->image_path) }}'); 
              filter: blur(6px); 
              transform: scale(1.1);">
    </div>

    <div class="relative flex pt-10 h-full">
        <div class="m-auto pt-4 pb-14 sm:m-auto w-4/5 block text-center">
            <h1 class="text-white text-5xl font-neovibe text-shadow-md pb-14">
                {{ $post->title }}
            </h1>
        </div>
    </div>
</div>

<div class="w-4/5 m-auto pt-5 mt-10 border-t-2 border-black">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <div class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {!! str_replace("\n", "<br>", $post->description) !!}
    </div>
</div>

@endsection 