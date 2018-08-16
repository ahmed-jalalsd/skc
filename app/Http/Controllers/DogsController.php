<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\User;
use App\Dog;
use DB;
use session;
use File;
use Image;
use Storage;


class DogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.dogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.dogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $this->validate($request, [
      //     "breed" => "required|max:255 ",
      //     "dog_name" => "required|max:255 ",
      //     "email" => "sometimes|email|unique:users",
      //     "phone_number" => "sometimes | max:100 ",
      //     "address" => "sometimes|max:255 ",
      //     "date_of_birth" => "required|date",
      //     'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
      // ]);

      // // dd($request->dog_images);

      $dog = new Dog;

      $dog->age = $request->age;
      $dog->user_id = auth()->user()->id;
      $dog->breed = $request->breed;
      $dog->color = $request->color;
      $dog->dog_name = $request->dog_name;
      $dog->pedigree_no = $request->pedigree_no;
      $dog->hair_type = $request->hair_type;
      $dog->microchip_no = $request->microchip_no;
      $dog->tatto = $request->tatto;
      $dog->sex = $request->sex;
      $dog->sir = $request->sir;
      $dog->dam = $request->dam;
      $dog->sir_pedigree_no = $request->sir_pedigree_no;
      $dog->dam_pedigree_no = $request->dam_pedigree_no;
      $dog->breeder = $request->breeder;
      $dog->owner = $request->owner;
      $dog->owner_address = $request->owner_address;
      $dog->phone_number = $request->phone_number;
      $dog->email = $request->email;
      $dog->date_of_birth = $request->date_of_birth;

      if($request->hasFile('images')) {
        $images = Input::file('images');
        // dd($images);
        foreach ($images as $image) {
          $imageFilename = time(). '-' .$image->getClientOriginalName();
          $image->move(public_path().'/images/dogs', $imageFilename);
          $data[] = $imageFilename;
          // dd($data);
        }
      }

      $dog->dog_images = json_encode($data);
      $dog->save();
      return redirect()->route('dogs.index');
      // dd($user);
      // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
