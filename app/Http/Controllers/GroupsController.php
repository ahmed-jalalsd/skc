<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Breed;

class GroupsController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadministrator|administrator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::orderBy('id', 'asc')->paginate(10);
        // dd($groups);
        // foreach ($groups as $group) {
        //   dd($group->breeds->count());
        // }
        return view('manage.groups.index')->withGroups($groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('manage.groups.create', compact('groups'));
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
          "breed_name" => "required | max:255 ",
          "breed_origin" => "required|max:255",
          "group_id" => "required",
          "varieties" => "sometimes",
      ]);

      $breed = new Breed();

      $breed->group_id = $request->group_id;
      $breed->breed = $request->breed_name;
      $breed->origin = $request->breed_origin;

      // create an array of breed varaition
      if ($request->varieties) {
        $varietiesArray = [];
        $varieties = $request->varieties;
        $varietiesArray = explode(',', $varieties);
      }
      // save as json in DB
      $breed->varieties = json_encode($varietiesArray);
      $breed->save();

      return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::where('id', $id)->with('breeds')->first();
        // dd($group->breeds);
        // dd($group->breeds->count());
        // foreach ($group->breeds as $value) {
        //   $varieties= json_decode($value->varieties);
        //   // dd($value->varieties);
        //   dd($varieties);
        // }
        return view('manage.groups.show')->withGroup($group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breed = Breed::findOrFail($id);
        // retrive the array of variaties
        $varieties = json_decode($breed->varieties);
        $groups = Group::all();
        return view('manage.groups.edit', compact('groups', 'breed', 'varieties'));
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
          "breed_name" => "required | max:255 ",
          "breed_origin" => "required|max:255",
          "group_id" => "required",
          "varieties" => "sometimes",
      ]);

      $breed = Breed::findOrFail($id);

      $breed->group_id = $request->group_id;
      $breed->breed = $request->breed_name;
      $breed->origin = $request->breed_origin;

      // create an array of breed varaition
      if ($request->varieties) {
        $varietiesArray = [];
        $varieties = $request->varieties;
        $varietiesArray = explode(',', $varieties);
      }
      // save as json in DB
      $breed->varieties = json_encode($varietiesArray);
      $breed->save();

      return redirect()->route('groups.index');
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
