<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;
use App\User;
use DB;
use session;
use File;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function __construct()
    {
        $this->middleware('role:superadministrator|administrator');
    }


    public function index()
    {
      $posts = Post::all();
        return view('manage.posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('manage.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all()) ;
       $this->validate($request, [
           "title" => "required | max:255 ",
           "slug" => "required|max:80",
           'excerpt' => 'sometimes|max:255',
           'content' => 'required',
           'bk_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
           'ft_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
       ]);

       $post = new Post();
       $post->title = $request->title;
       $post->slug = $request->slug;
       $post->author_id = auth()->id();
       $post->content = $request->content;
       $post->excerpt = $request->excerpt;
       $post->status = true;
       $post->comment_count = 5;

      if($request->hasFile('main_image')) {
        $mainImage = Input::file('main_image');
        $mainImageFileName = time(). '-' .$mainImage->getClientOriginalName();
        $post->bk_image = $mainImageFileName;
        $mainImage->move(public_path().'/images/blog', $mainImageFileName);
      }

      if($request->hasFile('featured_image')) {
        $featuredImage = $request->file('featured_image');
        $featuredImageFileName = time(). '-' .$featuredImage->getClientOriginalName();
        $location = public_path('images/' .$featuredImageFileName);
        Image::make($featuredImage)->resize(400, 200)->save($location);
        $post->ft_image = $featuredImageFileName;
      }

      $post->save();
      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::findOrFail($id);
        return view('manage.posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function apiCheckUnique(Request $request)
    {
        return json_encode(!Post::where('slug', '=', $request->slug)->exists());
        // will return true if it doesnt exist and false if it is exist thats why we add the bang (!)to return the opposite
        // json_encode because you can not pass  true and false (boolen) randomly inside a payload it will cause a http error
    }
}
