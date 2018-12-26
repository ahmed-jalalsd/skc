<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class HomeController extends Controller
{
    /**
     * Show the application Homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->with('users')->limit(6)->get();

        /*****************
         1- create fb developer user
         2- add a new app
         3- get app id, secert id and user id  https://developers.facebook.com/tools/explorer
         *************/
        $fbPosts = null;
        return view('/home', compact('events', 'fbPosts'));
    }
}
