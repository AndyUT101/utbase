<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Meal;

use Excel;


class ImportController extends Controller
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
     * Display a listing of the resource.
     *
     * @param  string $doctype
     * @return \Illuminate\Http\Response
     */
    public function index($doctype = null)
    {
        $data = array('title' => 'webpage');
        switch ($doctype) {

            case 'timetable':
                $data = array(
                    'title' => '上傳餐單檔案',
                    'navtitle' => 'uploadmeal',
                    'success' => false,
                    );
                return view('upload', $data);

            case 'holiday':
                return view('upload', $data);

            default:
                return redirect()->action('HomeController@index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prepareimport($excelkey = null)
    {
        if ($excelkey == null || !Storage::exists('excel/'. $excelkey . '.xlsx'))
            return redirect()->action('HomeController@index');


        $excel_doc = Excel::load('storage/app/excel/' . $excelkey . '.xlsx', 
        function ($reader) {
            $reader->setDateFormat('Y-m-d');
        }) -> get();

        $data = array(
            'title' => '更新預覽',
            'navtitle' => 'uploadmeal',
            'menupreview' => $excel_doc,
            'excelkey' => $excelkey,
            );

        return view('list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function processxls(Request $request)
    {
        $basepath = 'storage/app/';
        $selectedfolder = 'excel/';

        $return_data = array(
            'response' => 0,
            'status' => 'No file',
            'redirect' => null,
            );

        if ($request -> hasFile ('uploaddoc') && $request -> file('uploaddoc') -> isValid()){

            $extension = $request -> uploaddoc -> extension();

            if ($extension != 'xlsx') {

                $return_data = array(
                'response' => 0,
                'status' => 'File format error',
                'redirect' => null,
                );

            } else {

                $autogencode = str_random(12);
                $autogen_name = $autogencode . '.' . $extension;
                $path = $request -> uploaddoc -> storeAs('excel', $autogen_name);

                $return_data = array(
                'response' => 1,
                'status' => 'OK',
                'redirect' => $autogencode,
                );

            }

        }

        return $return_data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importDB($excelkey = null)
    {
        if ($excelkey == null || !Storage::exists('excel/'. $excelkey . '.xlsx'))
            return redirect()->action('HomeController@index');


            $excel_doc = Excel::load('storage/app/excel/' . $excelkey . '.xlsx', 
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
                        'fruit1' => $row['fruit1'],
                        'fruit2' => $row['fruit2'],
                        'teatime1' => $row['teatime1'],
                        'teatime2' => $row['teatime2'],
                        'dinner1' => $row['dinner1'],
                        'dinner2' => $row['dinner2'],
                        'supper1' => $row['supper1'],
                        'supper2' => $row['supper2'],
                    ));
                //$meal->save();
            }

            $success = Storage::delete('excel/' . $excelkey . '.xlsx');

            $data = array(
                    'title' => '上傳餐單檔案',
                    'navtitle' => 'uploadmeal',
                    'success' => true,
                    );

            return view('upload', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadtemplate()
    {
        return response() -> download(public_path() . '/resource/template.xlsx' );
    }
    
}
