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

      // $currentEvents = ShowEntry::orderBy('id', 'asc')->get()->groupBy('event_id');
      // $currentEvents = ShowEntry::orderBy('id', 'asc')->get();
      $currentEvents = Event::orderBy('start_date', 'asc')->where('start_date', '>=', date('Y-m-d') )->get();
      // dd($currentEvents);

      // $currentEvents = DB::table('show_entries')->select('*', DB::raw('count(*) as total'))
      //           ->groupBy('class_id')
      //           ->get();
      // $grouped = $currentEvents->groupBy('class_id');

      // $currentEvents = DB::table('show_entries')
      //       ->select('*')
      //       ->groupBy('event_id')
      //       ->get();

      // dd($currentEvents);
      // foreach ($currentEvents as $value) {
      //   dd($value->featured_image);
      // }
      // dd($events);
      return view('manage.results.all')->withCurrentEvents($currentEvents);
    }

    /**
     *  To display all groups in the event
     *
     * @return \Illuminate\Http\Response
     */
    public function index($eventId)
    {
      // $dogInShow = $eventId;
      $event = Event::where('id', $eventId)->first();
      // Get distinct results
      // $classesInShow = DB::table('show_entries')->groupBy('class_id')->where([['event_id', '=', $eventId],
      //     ])->get();
      $groupsInShow = DB::table('show_entries')->groupBy('group_id')->where([['event_id', '=', $eventId],
          ])->get();

      // *** To access relationship with  Query Builder method (convert Query Builder to elQuent) *** //
      $groupsInShow = ShowEntry::hydrate($groupsInShow->toArray());
      return view('manage.results.index', compact('groupsInShow', 'event'));
    }

    /**
     *  To display all classes in a specific group in the event
     *
     * @return \Illuminate\Http\Response
     */
    public function showClasses($eventId)
    {
      // $dogInShow = $eventId;
      $event = Event::where('id', $eventId)->first();
      // Get distinct results
      $classesInShow = DB::table('show_entries')->groupBy('class_id')->where([['event_id', '=', $eventId],
          ])->get();
      // *** To access relationship with  Query Builder method (convert Query Builder to elQuent) *** //
      $classesInShow = ShowEntry::hydrate($classesInShow->toArray());

      return view('manage.results.classes', compact('classesInShow', 'event'));
    }

    /**
     *  To display all particpated dogs in a class regarding an event for the judge
     *
     * @return \Illuminate\Http\Response
     */
    public function participate($showId, $classId)
    {
      $dogsInShow = ShowEntry::orderBy('id', 'asc')->where([
        ['event_id', '=', $showId],
        ['class_id', '=', $classId]
        ])->get();
      // foreach ($dogsInShow as $value) {
      //   dd($value);
      // }
      // dd($dogsInShow);
      $event = Event::where('id', $showId)->first();
      return view('manage.results.participate', compact('dogsInShow', 'event'));
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
