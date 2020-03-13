<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\M_Stock;
use App\Material;
use App\Materialgroup;
use App\Branch;
use DB;
use Redirect,Response;
use App\Traits;
use DataTables;

class M_StockController extends Controller
{
    use Traits;/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $whereBranch = $this->getBranchId();
        // $smtp = M_Stock::all()->where('trash', 0);
        // $smtp1 = Material::all()->where('trash', 0);
        // $smtp2 = Materialgroup::all()->where('trash', 0);
        // $smtp3 = Branch::query()
        // ->select('*')
        // -> where('trash', 0)
        // ->whereRaw("branches.id = ". $whereBranch)
        // ->get();
        return view('m_stock.index', [
            // 'data' => $smtp,
            // 'data1' => $smtp1,
            // 'data2' => $smtp2,
            // 'data3' => $smtp3,
            ]);
    }
    public function getdata(Request $request)
    {
        // dd($request);
        $whereBranch = $this->getBranchId();
        return Datatables::of (Material::query()
        ->select('materials.*', 
                'branches.short_name as b_name',
                'materialgroups.name as m_g_name',
                'm__stocks.qty_balance',
                'units.name_th as u_name')
        ->Join('branches', 'materials.branch_id', '=', 'branches.id')
        ->Join('materialgroups', 'materials.m_g_id', '=', 'materialgroups.id')
        ->Join('units', 'materials.unit_id', '=', 'units.id')
        ->leftJoin('m__stocks', 'materials.id', '=', 'm__stocks.m_id')
        ->whereRaw('branches.id = '. $whereBranch)
        ->where('materials.status', 1)
        ->where('materials.trash', 0)
        ->get())->make(true);
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
