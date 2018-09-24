<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class BlogPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::latest()->filter(request()->only(['year']))
                  ->get()->groupBy(function($item){
                    return $item->created_at->format('Y');
                  });
                // dd($posts);
         $archives = Post::selectRaw('year(created_at)year, monthname(created_at) month, count(*) publish')
                     ->groupBy('year', 'month')
                     ->orderByRaw('min(created_at) desc')
                     ->get()->toArray();

         return view('frontend.blog.index', compact('posts', 'archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      // $images= json_decode($event->images);
      $archives = Post::selectRaw('year(created_at)year, monthname(created_at) month, count(*) publish')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()->toArray();
        // dd($post->users->name);
      return view('frontend.blog.show', compact('post', 'archives'));
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
}
