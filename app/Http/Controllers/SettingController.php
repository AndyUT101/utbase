<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
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

}
