<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Gallery;
use App\Photo;
use DB;
use session;
use File;
use Image;
use Storage;

class GalleriesController extends Controller
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
       $galleries = Gallery::orderBy('id', 'desc')->paginate(10);
       return view('manage.galleries.index')->withGalleries($galleries);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // var_dump($request->all());
        // dd($request->all()) ;
        $this->validate($request, [
            "title" => "required | max:255 ",
            "slug" => "required|max:80",
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->slug = $request->slug;

        if($request->hasFile('featured_image')) {
          $coverImage = $request->file('featured_image');
          $coverImageFileName = time() . '-' .$coverImage->getClientOriginalName();
          $location = public_path('/images/gallery/' . $coverImageFileName);
          Image::make($coverImage->getRealPath())->resize(600, 400)->save($location);
          $gallery->cover_image = $coverImageFileName;
        }
        $gallery->save();

        if($request->hasFile('images')) {
          $photos = Input::file('images');
          $file_count = count($photos);
          $uploadcount = 0;
          foreach($photos as $photo){
          $photoname = time(). '-' .$photo->getClientOriginalName();
          $photo->move(public_path().'/images/gallery/photos', $photoname);
          $uploadcount ++;
           $photo = new Photo();
           $photo->title = $photoname;
           $photo->images = $photoname;
           $photo->gallery_id = $gallery->id; // Save the photos to the newly created gallery
           $photo->galleries()->associate($gallery);
           $photo->save();
        }
      }

      if($uploadcount == $file_count){
        return redirect()->route('galleries.index', $gallery);
      }
      else{
          return view('manage.dashboard')->with('danger', 'Uploaded fail');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // to show the relationship in the uery we use the following sentence
      $gallery = Gallery::with('photos')->find($id);
        // $gallery1 = Photo::findOrFail($id);
        // dd($gallery);
      // $photos = $gallery->photos;
      // foreach ($photos as $photo) {
      //   dd($photo->title);
      // }

      return view('manage.galleries.show')->withGallery($gallery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $gallery = Gallery::findOrFail($id);
      return view('manage.galleries.edit')->withGallery($gallery);
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
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $gallery = Gallery::findOrFail($id);
        $gallery->title = $request->title;
        $gallery->slug = $request->slug;

        if($request->hasFile('featured_image')) {
          $coverImage = $request->file('featured_image');
          $coverImageFileName = time() . '-' .$coverImage->getClientOriginalName();
          $location = public_path('/images/gallery/' . $coverImageFileName);
          Image::make($coverImage->getRealPath())->resize(600, 400)->save($location);

          $oldCoverImage = $gallery->featuredImage;
          //update the  database
          $gallery->cover_image = $coverImageFileName;
          //delete the old images
          $oldfiledelete = File::delete(public_path().'/images/gallery/photos', $oldCoverImage);

        }
        $gallery->save();

          if($request->hasFile('images')) {
            $photos = Input::file('images');
            $file_count = count($photos);
            $uploadcount = 0;
            foreach($photos as $photo){
            $photoname = time(). '-' .$photo->getClientOriginalName();
            $photo->move(public_path().'/images/gallery/photos', $photoname);
            $uploadcount ++;
            $photo =  Photo::findOrFail($id);
            $photo->title = $photoname;

            //update the  database
            $photo->images = $photoname;
            $photo->gallery_id = $gallery->id; // Save the photos to the newly created gallery
            $photo->galleries()->associate($gallery);

            $photo->save();
          }
        }

        if($uploadcount == $file_count){
          return redirect()->route('galleries.index', $gallery);
        }else {
          return redirect()->route('manage.dashboard');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $gallery = Gallery::findOrFail($id);
      // dd($gallery);
      Storage::delete($gallery->images);
      Storage::delete($gallery->featured_image);
      $gallery->delete();

      return redirect()->route('galleries.index');
    }

    public function apiCheckUnique(Request $request)
    {
        return json_encode(!Gallery::where('slug', '=', $request->slug)->exists());
        // will return true if it doesnt exist and false if it is exist thats why we add the bang (!)to return the opposite
        // json_encode because you can not pass  true and false (boolen) randomly inside a payload it will cause a http error
    }
}
