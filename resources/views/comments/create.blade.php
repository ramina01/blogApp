@extends('layouts.app')

@section('content')
    <div class="container h-screen m-auto pt-10">
        <h2 class="text-center text-white text-3xl">Add a Comment</h2>
        @if(session()->has('message'))
            <div class="alert alert-success bg-green-400 py-3 px-4">{{ session()->get('message') }}</div>
        @endif
        <form action="{{ route('comment.store') }}" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="container m-auto flex items-center justify-between mt-10">
                <textarea name="content" id="content" class="form-control w-4/5 pl-5 pt-3 rounded-lg" rows="4" required placeholder="Comment.."></textarea>
                <button type="submit" class="btn btn-primary bg-blue-700 mt-8 py-3 px-5 rounded-lg text-white font-bold">Submit</button>
            </div>


        </form>
    </div>
@endsection
