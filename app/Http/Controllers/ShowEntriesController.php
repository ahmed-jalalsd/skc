<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Dog;
use App\ShowEntry;

use Auth;
use Session;
use DB;

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
        $dogs = Dog::where('user_id', $userId)->get();
        // dd($dogs);
        return view('manage.entries.create')->withEvent($event)->withDogs($dogs);
    }

    /**
     * Display the the user's applications.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showApplications()
    {
        $userId = Auth::id();

        // $dogs = ShowEntry::join('dogs', function($q) use ($userId)
        // {
        //     $q->on('show_entries.dog_id', '=', 'dogs.id')
        //       ->where('show_entries.user_id', '=', "$userId");
        // })
        //   ->get(['dogs.dog_name']);
        //
        // $events = ShowEntry::join('events', function($q) use ($userId)
        // {
        //     $q->on('show_entries.event_id', '=', 'events.id')
        //       ->where('show_entries.user_id', '=', "$userId");
        // })
        //   ->get(['events.title']);
        // dd($events);

        $applications = DB::table('show_entries')
        ->join('dogs', 'dogs.id', '=', 'show_entries.dog_id')
                      ->join('events', 'events.id', '=', 'show_entries.event_id')
                      ->where('show_entries.user_id', '=', $userId)
                      ->select('dogs.dog_name', 'events.title')
                      ->get();
                      // dd($applications);
        return view('manage.entries.show', compact('applications'));
    }

      /**
       * Display the the all applications mad by users.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */

      public function showAllApplications()
      {
          $applications = DB::table('show_entries')
          ->join('dogs', 'show_entries.dog_id', '=', 'dogs.id')
          ->join('events', 'show_entries.event_id', '=', 'events.id')
          ->join('users', 'show_entries.user_id', '=', 'users.id')
          ->select('dogs.dog_name', 'events.title', 'users.name', 'users.email')
          ->get();
          dd($applications);
          // dd($applications);
          // foreach ($applications as $application) {
          //   dd($application->title);
          // }
          return view('manage.entries.show')->withApplications($applications);
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

        $userId = $request->user()->id;

        $showEntry = new ShowEntry();
        $showEntry->user_id = $userId;
        $showEntry->dog_id = $request->dog_id;
        $showEntry->event_id = $request->event_id;
        $showEntry->save();

        Session::flash('success', 'Successfully applied to the event ');
        return redirect()->view('manage.entries.show');
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
