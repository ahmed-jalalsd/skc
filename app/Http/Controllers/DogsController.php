<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\User;
use App\Dog;
use App\Breed;
use App\Group;
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

     public function __construct()
     {
         $this->middleware('role:superadministrator|administrator|member');
     }

    public function index()
    {

        $user = \Auth::user();
        if($user->hasRole('member')) {
          // $dogs = User::find('user_id')->dogs;
          $dogs = $user->dogs()->where('user_id', $user->id)->paginate(10);
        }else {
          $dogs = Dog::orderBy('id', 'desc')->with('users','breeds')->paginate(10);
        }
        return view('manage.dogs.index')->withDogs($dogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breeds = Breed::all();
        return view('manage.dogs.create')->withBreeds($breeds);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          "dog_name" => "required|max:255 ",
          "email" => "sometimes|email|unique:users",
          "phone_number" => "sometimes | max:100 ",
          "address" => "sometimes|max:255 ",
          "date_of_birth" => "required|date",
          'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
      ]);

      // dd($request->all());

      $dog = new Dog;

      $dog->age = $request->age;
      $dog->user_id = auth()->user()->id;
      $dog->breed_id = $request->breed; // add the breed id
      $dog->color = $request->color;
      $dog->dog_name = $request->dog_name;
      $dog->pedigree_no = $request->pedigree_no;
      $dog->hair_type = $request->hair_type;
      $dog->microchip_no = $request->microchip_no;
      $dog->tatto = $request->tattoo;
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
        $dog = Dog::findOrFail($id);
        $images= json_decode($dog->dog_images);
        // $breed = Breed::with('dogs')->where('id', $dog->breed_id)->get();
        // dd($dog->breeds->breed);
        // dd($dog->breeds->groups->group_name);
        return view('manage.dogs.show')->withDog($dog)->withImages($images);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dog = Dog::findOrFail($id);
        $breeds = Breed::all();
        $images= json_decode($dog->dog_images);
        return view('manage.dogs.edit')->withDog($dog)->withBreeds($breeds)->withImages($images);
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
            "breed" => "required|max:255 ",
            "dog_name" => "required|max:255 ",
            "email" => "sometimes|email|unique:users",
            "phone_number" => "sometimes | max:100 ",
            "address" => "sometimes|max:255 ",
            "date_of_birth" => "required|date",
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        // dd($request->all());

        $dog = Dog::findOrFail($id);

        $dog->age = $request->age;
        $dog->user_id = auth()->user()->id;
        $dog->breed = $request->breed;
        $dog->color = $request->color;
        $dog->dog_name = $request->dog_name;
        $dog->pedigree_no = $request->pedigree_no;
        $dog->hair_type = $request->hair_type;
        $dog->microchip_no = $request->microchip_no;
        $dog->tatto = $request->tattoo;
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
            $oldImages= json_decode($dog->dog_images);
            foreach ($oldImages as $oldImage) {
              Storage::delete($oldImage);
            }
            $data[] = $imageFilename;
            // dd($data);
          }
        }

        $dog->dog_images = json_encode($data);
        $dog->save();

        return redirect()->route('dogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $dog = Dog::findOrFail($id);
      Storage::delete($dog->dog_images);
      $dog->delete();

      return redirect()->route('dogs.index');
    }
}
