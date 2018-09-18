<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaraFlash;
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
        LaraFlash::add()->content('Hello World')->priority(6)->type('info');
        LaraFlash::success('Yay');
        LaraFlash::danger('Oops');
        $events = Event::orderBy('id', 'desc')->with('users')->limit(6)->get();

        // create fb developer user
        // add a new app
        // get app id, secert id and user id  https://developers.facebook.com/tools/explorer/
        $page_access_token = 'EAAeNpRdTHNMBACH42S6VrXuvdU8TxjaiyGhuszGzoZC3KkxEZBjoI83QZCsxoQO8YJ89vEuUbBvrE3hhfE1xCXaYZBxyPJjSwBtvBBEeq8Abejmf5SuMoyd15T5mqjZAQZCEZB23Lm55nhgKqlFQVSfaNH3qVFtOAXPWRb2rgCRgFxXwVGxb26DjSqO4ujzgbwZD';
        $fbAppId = '2126065037417683';
        $fbSecretKey = 'f059801e2667c78698d3acfc14d288e6';
        $userId = '10155864363047358'; // my user id in fb
        // only show 5 post maximum
        $fbData = fb_feed()->setAppId($fbAppId)->setSecretKey($fbSecretKey)->setPage($userId)
        ->feedLimit(3)
        ->fields("id, name, message, full_picture, permalink_url, created_time, picture, shares, link, description, object_id")
        ->fetch();
        // dd($fbData['data']);
        $fbPosts = $fbData['data'];
        return view('/home', compact('events', 'fbPosts'));
    }
}
