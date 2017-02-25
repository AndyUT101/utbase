<?php

namespace App\Http\Controllers;

use App\Meal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Excel;



class DBTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excel_doc = Excel::load('storage/app/' . 'test.xlsx', 
            function ($reader) {
                $reader->setDateFormat('Y-m-d');
            }) -> get();

        foreach ($excel_doc as $row) {
            if (empty($row['date']))
                continue;
            
            $meal = Meal::updateOrCreate(
                ['availabledate' => $row['date']],
                array(
                    'availabledate' => $row['date'],
                    'breakfast1' => $row['breakfast1'],
                    'breakfast2' => $row['breakfast2'],
                    'lunch1' => $row['lunch1'],
                    'lunch2' => $row['lunch2'],
                    'soup1' => $row['soup1'],
                    'soup2' => $row['soup2'],
                    'teatime1' => $row['teatime1'],
                    'teatime2' => $row['teatime2'],
                    'dinner1' => $row['dinner1'],
                    'dinner2' => $row['dinner2'],
                    'supper1' => $row['supper1'],
                    'supper2' => $row['supper2'],
                ));
            //$meal->save();
        }

        return $excel_doc;

        date_default_timezone_set("Asia/Hong_Kong");
        $d = mktime(0, 0, 0, 2, 21, 2017);

        return [(string)$excel_doc[0]['date'] == date("Y-m-d 00:00:00", $d)];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
