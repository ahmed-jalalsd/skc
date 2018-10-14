<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\ApplicationConfirmationEmail;
use App\Event;
use App\Dog;
use App\ShowEntry;


use Auth;
use Session;
use DB;
use Mail;

class ShowEntriesController extends Controller
{

    public function __construct()
    {
      $this->middleware('role:superadministrator|administrator|member');
    }

    /**
     * Display all upcoming events to the members so they can apply.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $upcomingEvents = Event::orderBy('id', 'asc')->with('users')->where('flag_application', '1')->paginate(10);
      return view('manage.entries.index')->withUpcomingEvents($upcomingEvents);
    }

    /**
     * Show the form so members can apply to a specific event (route name apply.event).
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
                      ->select('dogs.dog_name', 'dogs.age','dog_images', 'events.title', 'events.start_date')
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
          ->select('dogs.dog_name', 'events.title', 'users.name', 'users.email', 'users.phone_number')
          ->paginate(2);
          // dd($applications);
          // dd($applications);
          // foreach ($applications as $application) {
          //   dd($application->title);
          // }
          return view('manage.entries.allApplicants')->withApplications($applications);
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
        $userEmail = $request->user()->email;
        $userName = $request->user()->name;
        $eventName = $request->event_name;

        $showEntry = new ShowEntry();
        $showEntry->user_id = $userId;
        $showEntry->dog_id = $request->dog_id;
        $showEntry->class_id = $request->class_id;
        $showEntry->event_id = $request->event_id;

        // $showEntry->save();

        if ($showEntry->save())
       {
           Session::flash('success', 'Your application was successfully recived, please check your email');
           Mail::to($userEmail)->send(new ApplicationConfirmationEmail($userName, $eventName));
           return redirect()->back()->with('alert','You have successfully applied for our Newsletter');
       }else{
           return redirect()->back()->withErrors($validator);
       }


        // if ($showEntry->save())
        // {
        //     Mail::send('email.eventEntryEmail', ['email' => $userEmail, 'event' => $eventName], function ($message)
        //     {
        //         $message->from('ahmedjalalsd@gmail.com', 'Goodness Kayode');
        //         $message->to('gtkbrain@yahoo.com');
        //     });
        //     return redirect()->back()->with('alert','You have successfully applied for our Newsletter');
        // }else{
        //     return redirect()->back()->withErrors($validator);
        // }
        //
        // Session::flash('success', 'Successfully applied to the event ');
        // return redirect()->view('manage.entries.show');
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
