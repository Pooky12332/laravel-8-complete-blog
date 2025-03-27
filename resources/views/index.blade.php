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

    <div class="w-4/5 m-auto text-left">
        <div class="py-3 border-b border-black">
            <h1 class="pl-2 text-2xl font-neovibe">
                Home
            </h1>
        </div>
    </div>

    <div class="bg-white m-auto pb-10">
        <div class="text-left m-auto grid grid-cols-2 w-4/5 gap-10 pr-4 pl-4">
            <div class="m-auto sm:m-auto block">
                <h1 class="text-black text-center font-neovibe py-4 text-xl">
                  Latest
                </h1>

                @foreach($latestPosts as $post)
                    <div class="no-underline transition duration-150 ease-in-out hover:text-red-600 pb-5">
                        <a class="grid-cols-2 grid" href="{{ route('blog.show', $post->slug) }}">
                            <div>
                                <img src="{{ asset('/images/' . $post->image_path) }}" width="300" alt="{{ $post->title }}">
                            </div>
                            <div>
                                <p class="pt-1 pl-3 text-lg text-medium">{{ $post->title }}</p>
                                <p class="pt-1 pl-3 italic text-gray-600">{{ date('jS M Y', strtotime($post->updated_at)) }}</p>
                                <p class="pt-1 pl-3 text-sm text-gray-400">{!! \Illuminate\Support\Str::limit($post->description, 300) !!}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="m-auto sm:m-auto block">
                <h1 class="text-black text-center font-neovibe py-4 text-xl">
                    Reccomended
                </h1>

                @foreach($recommendedPosts as $post)
                    <div class="no-underline transition duration-150 ease-in-out hover:text-red-600 pb-5">
                        <a class="grid-cols-2 grid" href="{{ route('blog.show', $post->slug) }}">
                            <div>
                                <img class="flex" src="{{ asset('/images/' . $post->image_path) }}" width="300" alt="{{ $post->title }}">
                            </div>
                            <div>
                                <p class="pt-1 pl-3 text-lg text-medium">{{ $post->title }}</p>
                                <p class="pt-1 pl-3 italic text-gray-600">{{ date('jS M Y', strtotime($post->updated_at)) }}</p>
                                <p class="pt-1 pl-3 text-sm text-gray-400">{!! \Illuminate\Support\Str::limit($post->description, 300) !!}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="text-center p-15 bg-black text-white">
        <div class="w-4/5 m-auto text-left py-3 mb-10 border-b border-white">
            <h1 class="text-2xl font-neovibe">
                Albums of the Week
            </h1>
        </div>
        <div class="m-auto grid grid-cols-2 px-10">
            <iframe style="border-radius:12px margin-top:30px; display:block; margin-left:auto; margin-right:auto;" src="https://open.spotify.com/embed/album/1DInr1e5tIB0WioPuWg4nl?utm_source=generator" width="80%" height="600" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            <iframe style="border-radius:12px margin-top:30px; display:block; margin-left:auto; margin-right:auto;" src="https://open.spotify.com/embed/album/6ZksrxRWlJ7ExylPyJwfLJ?utm_source=generator" width="80%" height="600" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
    </div>

    <div class="text-center p-15 text-black">
        <div class="w-4/5 m-auto text-left py-3 mb-10 border-b border-black">
            <h1 class="text-2xl font-neovibe">
                Newest Releases
            </h1>
        </div>
        
    </div>
@endsection