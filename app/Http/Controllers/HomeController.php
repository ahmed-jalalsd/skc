<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaraFlash;

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
        return view('/home');
    }
}
