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
            , Updated at <span class="font-bold italic text-white">{{ date('jS M Y', strtotime($post->created_at)) }}</span>
            </span>
        </span>

        <p class="text-xl text-gray-200 pt-8 pb-10 leading-8 font-light mb-15">
            {{$post->description}}
        </p>


        <div class="py-5 border border-white flex justify-between items-center">
            <h3 class="font-bold text-2xl text-white ml-5">Comments</h3>
            <a href="{{ route('comment.create', ['post_id' => $post->id]) }}" class="text-blue-900 bg-white text-lg rounded-lg p-3 mr-5">
                Add a Comment
            </a>
        </div>

        <div class=" border border-white mb-5 pb-5">
        @forelse($post->comments ?? [] as $comment) <!-- Use the null coalescing operator to provide an empty array if comments is null -->
        <div>
            @if ($comment->user)
                <p class="text-white ml-5 text-lg mt-5">{{ $comment->user->name }}:  {{ $comment->content }}</p>
            @else
                <p class="text-white ml-5 text-lg mt-5">Anonymous User: {{ $comment->content }}</p>
            @endif
        </div>
        @empty
            <p class="text-white ml-5 text-lg mt-5">No comments yet.</p>
        @endforelse

    </div>
    </div>
@endsection
