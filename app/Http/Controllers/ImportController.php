<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  string $doctype
     * @return \Illuminate\Http\Response
     */
    public function index($doctype = null)
    {
        switch ($doctype) {

            case 'timetable':

                return view('upload');

            case 'holiday':
                return view('upload');

            default:
                return redirect()->action('HomeController@index');
        }
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadtemplate()
    {
        //return [public_path() . '/resource/template.xlsx'];
        //return [Storage::get('template.xlsx')];
        return response() -> download(public_path() . '/resource/template.xlsx');
        //return response() -> download(Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix(Storage::get('template.xlsx')));
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
