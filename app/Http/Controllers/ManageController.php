<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class ManageController extends Controller
{

		public function __construct()
    {
			$this->middleware('role:superadministrator|administrator|member|judge');
    }

		public function index()
		{
			return redirect()->route('manage.dashboard');
		}

    public function dashboard()
    {
    	return view('manage.dashboard');
    }

		public function showAll()
    {
			$oldEvents = Event::orderBy('start_date', 'asc')->where('start_date', '<=', date('Y-m-d') )->get();
    	return view('manage.results.showAll')->withOldEvents($oldEvents);
    }
}
