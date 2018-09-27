<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Dog;
use App\ShowEntry;
use Session;

class ShowEntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $events = Event::orderBy('id', 'asc')->with('users')->paginate(10);
      return view('manage.entries.index')->withEvents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applyToEvent(Request $request, Event $event)
    {
        // To find the user's dogs
        $userId = $request->user()->id;
        $dogs = Dog::where('id', $userId)->first();
        // dd($dogs);
        return view('manage.entries.create')->withEvent($event)->withDogs($dogs);
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
        // dd($request->all());
        $this->validate($request,[
            'event_id' => 'required',
            'dog_id' => 'required',
        ]);

        $showEntry = new ShowEntry();
        $showEntry->dog_id = $request->dog_id;
        $showEntry->event_id = $request->event_id;
        $showEntry->save();

        Session::flash('success', 'Successfully applied to the event ');
        return redirect()->route('entries.index');
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
