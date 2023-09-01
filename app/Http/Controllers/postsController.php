<?php

namespace App\Http\Controllers;


use App\Models\post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;


class postsController extends Controller
{

    public function __construct()
    {
        // Restrict access from URL to unauthorized users for all methods except 'index' and 'show'
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index')
            ->with('posts', Post::orderBy('updated_at','DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImgName = uniqid(). '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'),$newImgName);

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);


        Post::create([
            'title'=> $request->input('title'),
            'description'=>$request->input('description'),
        'slug'=> SlugService::createSlug(Post::class, 'slug', $request->title),
        'img_path' => $newImgName,
        'user_id' =>auth()->user()->id
        ]);


        return redirect('/blog')->with('message','Your post has been uploaded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  String  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')
            ->with('post', Post::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  String  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)  //for showing the deatils of the post and editing it (GET Method)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug',$slug)->first());    //editing one post from Post model where its slug = passed slug
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)   //for actually updating the values of the post(PUT method)
    {
        $request->validate([
            'title' => 'required',
            'description'=>'required'
        ]);

        post::where('slug',$slug)
            ->update([
                'title'=> $request->input('title'),
                'description'=>$request->input('description'),
                'slug'=> SlugService::createSlug(Post::class, 'slug', $request->title),
                'user_id' =>auth()->user()->id
            ]);


        return redirect('/blog')->with('message','Your post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


