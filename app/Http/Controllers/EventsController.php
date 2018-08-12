<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Event;
use DB;
use session;
use File;
use Image;
use Storage;

class EventsController extends Controller
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
      $events = Event::orderBy('id', 'desc')->with('users')->paginate(10);
      return view('manage.events.index')->withEvents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.events.create');
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
            'cta' => 'required|integer',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->slug = $request->slug;
        $event->user_id = auth()->id();
        $event->content = $request->content;
        $event->excerpt = $request->excerpt;
        $event->flag_application = $request->cta;

        if($request->hasFile('images')) {
          $images = Input::file('images');
          $file_count = count($images);
          $uploadcount = 0;
          foreach ($images as $image) {
            $imageFilename = time(). '-' .$image->getClientOriginalName();
            $event->images = $imageFilename;
            $image->move(public_path().'/images/events', $imageFilename);
            $uploadcount ++;
            $event->save();
          }
        }

        if($request->hasFile('featured_image')) {
          $featuredImage = $request->file('featured_image');
          $featuredImageFileName = time() . '-' .$featuredImage->getClientOriginalName();
          $location = public_path('/images/events/' . $featuredImageFileName);
          Image::make($featuredImage->getRealPath())->resize(600, 400)->save($location);
          $event->featured_image = $featuredImageFileName;
        }

          $event->save();

        return redirect()->route('events.show', $event->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        // dd($event);
        return view('manage.events.show')->withEvent($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $event = Event::findOrFail($id);
      return view('manage.events.edit')->withEvent($event);
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
      $this->validate($request, [
          "title" => "required | max:255 ",
          "slug" => "required|max:80",
          'excerpt' => 'sometimes|max:255',
          'content' => 'required',
          'cta' => 'required|integer',
          'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
          'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
      ]);

      $event = Event::findOrFail($id);
      $event->title = $request->title;
      $event->slug = $request->slug;
      $event->user_id = auth()->id();
      $event->content = $request->content;
      $event->excerpt = $request->excerpt;
      $event->flag_application = $request->cta;

      if($request->hasFile('images')) {
        $images = Input::file('images');
        $file_count = count($images);
        $uploadcount = 0;
        foreach ($images as $image) {
          $imageFilename = time(). '-' .$image->getClientOriginalName();
          // $event->images = $imageFilename;
          $image->move(public_path().'/images/events', $imageFilename);
          $uploadcount ++;
          $oldImageFileName = $event->image;
          //update the  database
          $event->images = $imageFilename;
          //delete the old images
          Storage::delete($oldImageFileName);
          $event->save();
        }
      }

      if($request->hasFile('featured_image')) {
        $featuredImage = $request->file('featured_image');
        $featuredImageFileName = time() . '-' .$featuredImage->getClientOriginalName();
        $location = public_path('/images/events/' . $featuredImageFileName);
        Image::make($featuredImage->getRealPath())->resize(600, 400)->save($location);

        $oldFeaturedImageFileName = $event->featuredImage;
        //update the  database
        $event->featured_image = $featuredImageFileName;
        //delete the old images
        Storage::delete($oldFeaturedImageFileName);
      }

        $event->save();

      return redirect()->route('events.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $event = Event::findOrFail($id);
      // dd($event);
      Storage::delete($event->images);
      Storage::delete($event->featured_image);


      $event->delete();

      return redirect()->route('events.index');
    }

    public function apiCheckUnique(Request $request)
    {
        return json_encode(!Post::where('slug', '=', $request->slug)->exists());
        // will return true if it doesnt exist and false if it is exist thats why we add the bang (!)to return the opposite
        // json_encode because you can not pass  true and false (boolen) randomly inside a payload it will cause a http error
    }
}
