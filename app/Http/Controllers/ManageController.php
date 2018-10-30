<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\ShowEntry;
use App\Result;

use DB;

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
			$oldEvents = Event::orderBy('start_date', 'asc')

									->where('flag_application', '=', 1 )
									->get();
    	return view('manage.results.showAll')->withOldEvents($oldEvents);
    }

		public function showBestAll($eventId)
		{
			$event = Event::where('id', $eventId)->first();
			$winners = DB::table('results')
        ->join('show_entries', 'results.show_entries_id', '=', 'show_entries.id')
        ->select('show_entries.id as id_show', 'show_entries.*' , 'results.*' )
        ->where([
          ['show_entries.event_id', '=', $eventId],
          ['results.first_round', '=', 1],
          ])
        ->get();

				$bestOfDogs = DB::table('results')
	        ->join('show_entries', 'results.show_entries_id', '=', 'show_entries.id')
	        ->select('show_entries.id as id_show', 'show_entries.*' , 'results.*' )
	        ->where([
	          ['show_entries.event_id', '=', $eventId],
	          ['show_entries.class_id', '!=', 2],
	          ['results.second_round', '=', 1],
	          ])
	        ->get();

				$bestOfBreeds = DB::table('results')
	        ->join('show_entries', 'results.show_entries_id', '=', 'show_entries.id')
	        ->select('show_entries.id as id_show', 'show_entries.*' , 'results.*' )
	        ->where([
	          ['show_entries.event_id', '=', $eventId],
	          ['show_entries.class_id', '!=', 2],
	          ['results.third_round', '=', 1],
	          ])
	        ->get();

				$bestOfShow = DB::table('results')
	        ->join('show_entries', 'results.show_entries_id', '=', 'show_entries.id')
	        ->select('show_entries.id as id_show', 'show_entries.*' , 'results.*' )
	        ->where([
	          ['show_entries.event_id', '=', $eventId],
	          ['show_entries.class_id', '!=', 2],
	          ['results.final_round', '=', 1],
	          ])
	        ->get();

				$winners = Result::hydrate($winners->toArray());
				$bestOfDogs = Result::hydrate($bestOfDogs->toArray());
				$bestOfBreeds = Result::hydrate($bestOfBreeds->toArray());
				$bestOfShow = Result::hydrate($bestOfShow->toArray());
									// dd($winners);
			return view('manage.results.showBestAll', compact('winners', 'event', 'bestOfDogs','bestOfBreeds','bestOfShow'));
		}
}
