<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Dog;
use App\ShowEntry;
use App\Classes;

use Auth;
use Session;
use DB;

class ResultsController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:judge');
    }

    /**
     * Display a list of all the current event
     * @return \Illuminate\Http\Response
     */
    public function showAllEvents()
    {
      // $events = Event::orderBy('id', 'asc')->where('flag_application', 1)->paginate(2);
      $currentEvents = ShowEntry::orderBy('id', 'asc')->paginate(2);
      // foreach ($events as $value) {
      //   dd($value->events->title);
      // }
      // dd($events);
      return view('manage.results.all')->withCurrentEvents($currentEvents);
    }

    /**
     *  To display all application regarding an event for the judge
     *
     * @return \Illuminate\Http\Response
     */
    public function index($showEntryId)
    {
      // dd($showEntry);
      $classes = Classes::orderBy('id', 'asc')->get();
      $dogsInShow = ShowEntry::orderBy('id', 'asc')->where('event_id', '=', $showEntryId)->get();
      // foreach ($dogsInShow as $value) {
      //   dd($value->dogs->classes->class);
      // }
      $dogInShow = $showEntryId;
      $event = Event::where('id', $showEntryId)->first();
      // dd($event);
      // dd($dogsInShow);
      return view('manage.results.index', compact('dogsInShow', 'event', 'classes', 'dogInShow'));
    }

    /**
     * Show the form for create a form of the dog information so the judge can rate the dog
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dogInShowId)
    {
        //show a list of the participate dogs
        $dogInfo = ShowEntry::findOrFail($dogInShowId);
        // dd($dogInfo->dogs->dog_name);
        return view('manage.results.create', compact('dogInfo'));
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
