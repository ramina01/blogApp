@extends('layouts.app')

@section('content')

    <div class="w=4/5 m-auto text-center  text-white">
        <div class="py-15 border-b border-white">
            <h1 class="text-6xl">
                Blog Posts
            </h1>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-2/6 mb-4 text-white bg-green-400 rounded py-4 px-3">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    @if(Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a href="/blog/create"
               class="bg-white uppercase bg-transparent text-blue-900 text-xs font-extrabold py-3 px-5 rounded-3xl">
                <span class="text-2xl font-extrabold">+</span> Create Post
            </a>
        </div>
    @endif

    @foreach($posts as $post)
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx:auto py-15 border-b border-white">
            <div class="pl-20">
                <img src="{{ asset('images/' . $post->img_path) }}" width="500" alt="">
{{--                dd({{ asset('images/' . $post->img_path) }});--}}
            </div>

            <div>
                <h2 class="text-white font-bold text-5xl pb-4">
                    {{ $post->title }}
                </h2>
                <span class="text-gray-300">
               By<span class="font-bold italic text-white"> {{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->created_at)) }}
            </span>

                <p class="text-xl text-gray-300 pt-8 pb-10 leading-8 font-light">
                    {{ $post->description }}
                </p>
                <a href="/blog/{{ $post->slug }}" class="uppercase bg-white text-blue-900 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Read more
                </a>

                @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                    <span class="float-right">
                        <a href="/blog/{{ $post->slug }}/edit" class="text-gray-300 hover:text-white text-2xl pb-1 no-underline">
                        <i class="fas fa-edit"></i>
                        </a>


                    </span>
                @endif

            </div>
        </div>
    @endforeach

@endsection
