@extends('layouts.app')

@section('content')
    {{--    showing a single post--}}
    <div class="flex justify-center items-center h-min-screen py-20">
        <div class="w-4/5 text-center text-white">
            <div class="py-8">
                <h1 class="text-6xl">
                   {{$post->title}}
                </h1>
            </div>
        </div>
    </div>


    <div class="w-4/5 m-auto pt-4">
        <span class="text-gray-300">
            By <span class="font-bold italic text-white"> {{ $post->user->name }}</span>
            , Created on {{ date('jS M Y', strtotime($post->created_at)) }}
            </span>
        </span>

        <p class="text-xl text-gray-200 pt-8 pb-10 leading-8 font-light mb-15">
            {{$post->description}}

        </p>
    </div>
@endsection
