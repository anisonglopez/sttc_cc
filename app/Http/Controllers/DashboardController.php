<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_Stock;
use App\Material;
use App\Materialgroup;
use App\Branch;
use DB;
use Redirect,Response;
use App\Traits;
use DataTables;

class DashboardController extends Controller
{
    use Traits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            ]);
        //
    }
    public function getdataoutstock(Request $request)
    {
        // dd($request);
        $whereBranch = $this->getBranchId();
        return Datatables::of (Material::query()
        ->select('materials.*', 
                'branches.short_name as b_name',
                'materialgroups.name as m_g_name',
                'm__stocks.qty_balance')
        ->Join('branches', 'materials.branch_id', '=', 'branches.id')
        ->Join('materialgroups', 'materials.m_g_id', '=', 'materialgroups.id')
        ->leftJoin('m__stocks', 'materials.id', '=', 'm__stocks.m_id')
        ->whereRaw('m__stocks.qty_balance < materials.min')
        ->orWhere('m__stocks.qty_balance', null)
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
