<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Setting;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getWeather()
    {
        $postdata = DB::table('settings')
        -> select('setting_value')
        -> where('setting_key', '=', 'timeweather')
        -> take(1)
        -> get();

        $setting_value = count($postdata) == 0 ? null : $postdata[0]->setting_value;
        $postdata = json_decode($setting_value, true);

        $data = array(
            'title' => '天氣及時間',
            'navtitle' => 'timeweather',
            'actionpath' => '/setting/timeweather/update',
            'postdata' => $postdata,
            'error' => null,
            'success' => null,
            );

        return view('settings/timeweather', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNewsfeed()
    {
        $postdata = DB::table('settings')
        -> select('setting_value')
        -> where('setting_key', '=', 'newsfeed')
        -> take(1)
        -> get();

        $setting_value = count($postdata) == 0 ? null : $postdata[0]->setting_value;
        $postdata = json_decode($setting_value, true);
        //return $postdata;

        $data = array(
            'title' => '新聞資訊',
            'navtitle' => 'newsfeed',
            'actionpath' => '/setting/newsfeed/update',
            'postdata' => $postdata,
            'error' => null,
            'success' => null,
            );

        return view('settings/newsfeed', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getJSON($updateitem)
    {
        switch ($updateitem) {
          case 'timeweather':
          case 'newsfeed':

            $rawdata = DB::table('settings')
            -> select('setting_value')
            -> where('setting_key', '=', $updateitem)
            -> get();

            $setting_value = count($rawdata) == 0 ? '{}' : $rawdata[0]->setting_value;
            $jsondata = json_decode($setting_value, true);

            return $jsondata;
            break;

          case 'meal':
            $rawdata = DB::table('meals') 
            -> where('availabledate', '=', Carbon::today()->toDateString()) 
            -> get();
            return $rawdata;
            break;

          default:
            return [];
            break;

        }

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
    public function update(Request $request, $updateitem)
    {
        // $available_updateKey = array('timeweather', 'newsfeed');
        $requestKeyValue = $request -> all();
        unset($requestKeyValue['_token']);
        switch ($updateitem) {
          case 'timeweather':
            $title = "天氣及時間";
            break;

          case 'newsfeed':
            $title = "新聞資訊";
            break;

          default:
            return ['error'];
            break;
        }

        $updatesetting = Setting::updateOrCreate(
          ['setting_key' => $updateitem],
          array(
            'setting_key' => $updateitem,
            'setting_value' => json_encode($requestKeyValue),
          ));
        

        $data = array(
            'title' => $title,
            'navtitle' => $updateitem,
            'actionpath' => '/setting/' . $updateitem .'/update',
            'postdata' => $requestKeyValue,
            'error' => null,
            'success' => true,
            );

        return view('settings/' . $updateitem, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDisplay($displayitem)
    {
        $data = null;

        switch ($displayitem) {
            case 'meal':
            case 'newsfeed':
                $data = array(
                    'displayitem' => '/api/' . $displayitem);
                break;

            case 'timeweather':
                $data = array(
                    'displayitem' => '');
                break;
            
            default:
                return [];
                break;
        }

        return view('display/' . $displayitem, $data);
    }
}
