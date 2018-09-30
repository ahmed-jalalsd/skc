<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Dog;
use Auth;

class EventsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // getting the events grouping by time,
        $events = Event::latest()->filter(request()->only(['year']))
                  ->get()->groupBy(function($item){
                    return $item->created_at->format('Y');
                  });

         $archives = Event::selectRaw('year(created_at)year, monthname(created_at) month, count(*) publish')
           ->groupBy('year', 'month')
           ->orderByRaw('min(created_at) desc')
           ->get()->toArray();

        return view('frontend.events.index')->withEvents($events)->withArchives($archives);
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
      $event = Event::findOrFail($id);
      $images= json_decode($event->images);
      $archives = Event::selectRaw('year(created_at)year, monthname(created_at) month, count(*) publish')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()->toArray();
      if (Auth::user()) {
        $userId = auth()->user()->id;
        $dogs = Dog::where('user_id', $userId)->get();
        return view('frontend.events.show')->withEvent($event)->withImages($images)->withArchives($archives)->withDogs($dogs);
      }else {
        return view('frontend.events.show')->withEvent($event)->withImages($images)->withArchives($archives);
      }

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
