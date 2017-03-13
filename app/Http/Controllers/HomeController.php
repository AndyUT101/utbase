<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set("Asia/Hong_Kong");

        $recent_meal = DB::table('meals') -> where('availabledate', '>=', Carbon::today()->toDateString()) -> orderBy('availabledate', 'asc') -> take(10) -> get();;

        //return $recent_meal;
        $data = array(
            'title' => '主目錄',
            'navtitle' => 'index',
            'recently_meal' => $recent_meal,
            );
        return view('home', $data);
    }

    public function logout() {
        Auth::logout();
        return redirect()->action('HomeController@index');
    }
}
