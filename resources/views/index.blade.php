@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-white pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-blue-900 text-5xl uppercase font-bold text-shadow-md pb-14">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </h1>
                <a href="/blog" class="text-center bg-blue-900 text-white py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>
            </div>
        </div>
    </div>


    <div class="sm:grid grid-cols-2 gap-10 w-5/6 mx-auto py-15 border-b bprder-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2017/07/02/19/24/dumbbells-2465478_1280.jpg" width="400" alt="">
        </div>
        <div class="m-auto sm:m-auto text-left w-5/6 block">
            <h2 class="text-3xl font-extrabold text-white">
                Lorem ipsum dolor sit amet
            </h2>
            <p class="py-8 text-gray-200 text-s">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.Perferendis consequuntur cupiditate quisquam vitae quae! Cupiditate assumenda officia numquam voluptate aspernatur ut vero fuga omnis! Eos doloribus voluptatum dolore itaque dicta!
            </p>
            <a href="/blog" class="uppercase bg-white text-blue-900 text-s font-extrabold
                py-3 px-8 rounded-3xl ">
                Read More
            </a>
        </div>

    </div>



    <div class="text-center py-15">
            <span class="uppercase text-s text-white">
                Blog
            </span>
        <h2 class="text-4xl font-bold py-10 text-white">
            Latest posts
        </h2>
        <p class="m-auto w-4/5 text-gray-200">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis consequuntur cupiditate quisquam vitae quae! Cupiditate assumenda officia numquam voluptate aspernatur ut vero fuga omnis! Eos doloribus voluptatum dolore itaque dicta!
        </p>
    </div>


    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-gray-400 text-white pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                    <span class="uppercase text-xs">
                        php
                    </span>
                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </h3>

                <a href="" class="uppercase bg-transparent border-2 border-gray-200 text-white text-xs
                    font-extrabold py-3 px-5 rounded-3xl"> Read More</a>
            </div>
        </div>

        <div>
            <img src="https://cdn.pixabay.com/photo/2017/07/02/19/24/dumbbells-2465478_1280.jpg" width="500" alt="">
        </div>
    </div>
@endsection
