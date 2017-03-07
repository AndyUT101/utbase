<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Setting;

class DisplayController extends Controller
{
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
        date_default_timezone_set("Asia/Hong_Kong");
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
            $todaydata = DB::table('meals') 
            -> where('availabledate', '=', Carbon::today()->toDateString()) 
            -> get();

            $tmrdata = DB::table('meals') 
            -> where('availabledate', '=', Carbon::tomorrow()->toDateString()) 
            -> get();

            $exportdata = null;
            if (count($todaydata) == 1){
                $exportdata['availabledate'] = $todaydata[0] -> availabledate;
                $exportdata['breakfast1'] = $todaydata[0] -> breakfast1;
                $exportdata['breakfast2'] = $todaydata[0] -> breakfast2;
                $exportdata['lunch1'] = $todaydata[0] -> lunch1;
                $exportdata['lunch2'] = $todaydata[0] -> lunch2;
                $exportdata['soup1'] = $todaydata[0] -> soup1;
                $exportdata['soup2'] = $todaydata[0] -> soup2;
                $exportdata['fruit1'] = $todaydata[0] -> fruit1;
                $exportdata['fruit2'] = $todaydata[0] -> fruit2;
                $exportdata['teatime1'] = $todaydata[0] -> teatime1;
                $exportdata['teatime2'] = $todaydata[0] -> teatime2;
                $exportdata['dinner1'] = $todaydata[0] -> dinner1;
                $exportdata['dinner2'] = $todaydata[0] -> dinner2;
                $exportdata['supper1'] = $todaydata[0] -> supper1;
                $exportdata['supper2'] = $todaydata[0] -> supper2;
            }

            if (count($tmrdata) == 1){
                $exportdata['tmr1'] = $tmrdata[0] -> breakfast1;
                $exportdata['tmr2'] = $tmrdata[0] -> breakfast2;
            }

            return $exportdata;
            break;

          default:
            return [];
            break;

        }

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
