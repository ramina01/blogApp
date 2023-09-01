@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-min-screen">
        <div class="w-4/5 text-center text-white">
            <div class="py-8">
                <h1 class="text-6xl">
                    New Post
                </h1>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-white bg-red-600 rounded-lg py-4 px-2">
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="w-4/5 m-auto pt-4">
        <form
            action="/blog"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <input
                type="text"
                name="title"
                placeholder="Title.."
                class="bg-white block border-b-2 w-full h-20 text-4xl outline-none mt-2 pl-8 rounded-lg">

            <textarea
                name="description"
                placeholder="Content.."
                class="py-10 pl-8 bg-white block border-b-2 w-full h-40 text-xl outline-none mt-2 rounded-lg"></textarea>

            <div class="pt-4">
                <label class="bg-white w-44 flex flex-col items-center px-2 py-3 rounded-lg shadow-lg tracking-wide uppercase border cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                    <input type="file" name="image" class="hidden">
                </label>
            </div>
            <button type="submit"
                    class="uppercase mt-10 mb-10 bg-blue-700 text-white text-lg font-extrabold py-4 rounded-3xl w-full"> <!-- Adjusted width to w-full -->
                Submit
            </button>
        </form>
    </div>
@endsection
