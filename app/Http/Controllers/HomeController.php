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
         // for sks-app
        $page_access_token = 'EAAeNpRdTHNMBACH42S6VrXuvdU8TxjaiyGhuszGzoZC3KkxEZBjoI83QZCsxoQO8YJ89vEuUbBvrE3hhfE1xCXaYZBxyPJjSwBtvBBEeq8Abejmf5SuMoyd15T5mqjZAQZCEZB23Lm55nhgKqlFQVSfaNH3qVFtOAXPWRb2rgCRgFxXwVGxb26DjSqO4ujzgbwZD';
        $fbAppId = '2126065037417683';
        $fbSecretKey = 'f059801e2667c78698d3acfc14d288e6';
        $userId = '10155864363047358'; // my user id in fb
        // **** for kennel club af app*****//
        // $page_access_token = 'EAAXOuIRZAVYUBAMYMsCwgZCFdqnmXQnoxaGZBo6xrcu4ZC1MZCqn5UPCiZAoZBuEZB3H6ZBdoBrKLTi1NdqVWXMODBAZBeeH38GWwRsn2RaWElhly4DtRmfHCPsPOzhVE1eDcZANtsqxS5gygYeTBWfZBGcyJJUrVzH7V1YZD';
        // $fbAppId = '1634666773304709';
        // $fbSecretKey = '09f8e92858ea19aba46097e75200a183';
        // $userId = '646720502202941';
        // // only show 3 post maximum
        $fbData = fb_feed()->setAppId($fbAppId)->setSecretKey($fbSecretKey)->setPage($userId)
        ->feedLimit(3)
        ->fields("id, name, message, full_picture, permalink_url, created_time, picture, shares, link, description, object_id")
        ->fetch();
        // dd($fbData);
        // dd($fbData['data']);
        $fbPosts = $fbData['data'];
        return view('/home', compact('events', 'fbPosts'));
    }
}
