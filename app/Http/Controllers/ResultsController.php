<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Dog;
use App\ShowEntry;
use App\Classes;
use App\Result;
use App\Group;

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
    public function showClasses($eventId, $groupId)
    {
      // $dogInShow = $eventId;
      $event = Event::where('id', $eventId)->first();
      // Get distinct results
      $classesInShow = DB::table('show_entries')->groupBy('class_id')->where([
        ['event_id', '=', $eventId],
        ['group_id', '=', $groupId],
        ])->get();
      // *** To access relationship with  Query Builder method (convert Query Builder to elQuent) *** //
      $classesInShow = ShowEntry::hydrate($classesInShow->toArray());
      // dd($classesInShow);
      return view('manage.results.classes', compact('classesInShow', 'event'));
    }

    /**
     *  To display all particpated dogs in a class regarding an event for the judge
     *
     * @return \Illuminate\Http\Response
     */
    public function participate(Request $request)
    {
      // dd($request->sex);

      $dogsInShow = ShowEntry::orderBy('id', 'asc')
          ->where('event_id', '=', $request->show_id)
          ->where('group_id', '=', $request->group_id)
          ->where('class_id', '=', $request->class_id)
          ->where('sex', '=', $request->sex)
          ->get();

      // $dogsInShow = DB::table('show_entries')
      //   ->join('dogs', 'show_entries.dog_id', '=', 'dogs.id')
      //   ->select('*')
      //   ->where([
      //     ['show_entries.event_id', '=', $request->show_id],
      //     ['show_entries.class_id', '=', $request->class_id],
      //     ['dogs.sex', '=', $request->sex],
      //     ])
      //   ->get();
      // $dogsInShow = ShowEntry::hydrate($dogsInShow->toArray());
      // dd($dogsInShow);

      // foreach ($dogsInShow as $value) {
      //   // dd($value->results->isNotEmpty());
      //   foreach ($value->results as $result) {
      //     dd($result->status_first_round);
      //   }
      // }

      $event = Event::where('id', $request->show_id)->first();
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
        // $dogInfo = ShowEntry::findOrFail($dogInShowId)->results;
        // dd($dogInfo);
        // dd($dogInfo->classes->class);
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
        // dd( $request->classification);
        $this->validate($request, [
            "classification" => "required",
        ]);

        $result = new Result();

        $result->first_round = $request->order;
        $result->classification = $request->classification;
        $result->status_first_round = 1;
        $result->award = $request->award;
        $result->show_entries_id = $request->show_entries_id;

        $result->save();

        Session::flash('success', 'The result was successfully added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chooseSex($eventId, $groupId)
    {
        // dd($eventId);
        $eventId = $eventId;
        $groupId = $groupId;
        return view('manage.results.chooseSex', compact('eventId', 'groupId'));
    }


    /**
     *  To display all classes in a specific group in the event
     *
     * @return \Illuminate\Http\Response
     */
    public function showSecondRound(Request $request)
    {
      // dd($request->all());
      /***************************
      the id is  results table id and the id_show is  show_entries table id which is show_entries_id on results table
      **************/
      $firstDogs = DB::table('results')
        ->join('show_entries', 'results.show_entries_id', '=', 'show_entries.id')
        ->select('show_entries.id as id_show', 'show_entries.*' , 'results.*' )
        ->where([
          ['show_entries.event_id', '=', $request->event_id],
          ['show_entries.group_id', '=', $request->group_id],
          ['show_entries.class_id', '!=', 2],
          ['show_entries.sex', '=', $request->sex],
          ['results.first_round', '=', 1],
          ])
        ->get();
        // *** To access relationship with  Query Builder method (convert Query Builder to elQuent) *** //
        $firstDogs = Result::hydrate($firstDogs->toArray());
        // dd($firstDogs);
        // foreach ($firstDogs as $firstDog) {
        //   dd($firstDog->se);
        // }
      $event = Event::where('id', $request->event_id)->first();
      $group = Group::findOrFail($request->group_id);
      return view('manage.results.secondRound', compact('firstDogs', 'event', 'group'));
    }

    /**
     * Show the form for create a form of the dog information so the judge can rate the dog
     * also send the rsylt table id to find the record in the update method
     *
     * @return \Illuminate\Http\Response
     */
    public function createSecondRound($showEntriesId, $resultId)
    {
      // dd($dogInShowId);
        $dogInfo = ShowEntry::findOrFail($showEntriesId);
        // $dogInfo = ShowEntry::findOrFail($dogInShowId)->results;
        // dd($dogInfo->results);
        // dd( $dogInfo);
        // dd($dogInfo->classes->class);
        return view('manage.results.createSecond', compact('dogInfo', 'resultId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSecondRound(Request $request, $id)
    {
        // dd($id);
        $this->validate($request, [
            "classification" => "required",
        ]);

        $result = Result::findOrFail($id);
 // dd($request->all());
        $result->second_round = $request->second_round_order;
        $result->classification = $request->classification;
        $result->status_second_round = 1;
        $result->award = $request->award;


        $result->save();

        Session::flash('success', 'The result was successfully added');
        return back();
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
