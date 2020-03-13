<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report.index');
    }
    public function reportSearch(Request $request)
    {
        $report_filter = $request->report_filter;
        if ($report_filter == "R01"){
            return $this->R01view();
        }elseif ($report_filter == "R02"){
            return $this->R02view();
        }elseif ($report_filter == "R03"){
            return $this->R03view();
        }elseif ($report_filter == "R04"){
            return $this->R04view();
        }
    }
    public function R01view()
    {
        return view('report.R01');
    }
    public function R02view()
    {
        return view('report.R02');
    }
    public function R03view()
    {
        return view('report.R03_receive');
    }

    public function R04view()
    {
        return view('report.R04_retire');
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
