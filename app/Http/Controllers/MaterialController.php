<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Material;
use App\Unit;
use App\Branch;
use App\Materialgroup;
use DB;
use Redirect,Response;
use App\Traits;
use DataTables;

class MaterialController extends Controller
{
    use Traits; // for Save logs
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whereBranch = $this->getBranchId();
        $smtp2 = Materialgroup::all()->where('trash', 0);
        $smtp3 = unit::all()->where('trash', 0);
        $smtp4 = Branch::query()
        ->select('*')
        -> where('trash', 0)
        ->whereRaw("branches.id = ". $whereBranch)
        ->get();
        return view('material.index', [
            // 'data' => $smtp,
            'data2' => $smtp2,
            'data3' => $smtp3,
            'data4' => $smtp4,
            ]);
    }

    public function getdata(Request $request)
    {
        // dd($request);
        $whereBranch = $this->getBranchId();
        return Datatables::of(Material::query()
        ->select('materials.*', 'materialgroups.name as m_g_name', 'units.name_th as unit_name','branches.short_name as b_name')
        ->Join('materialgroups', 'materials.m_g_id', '=', 'materialgroups.id')
        ->Join('units', 'materials.unit_id', '=', 'units.id')
        ->Join('branches', 'materials.branch_id', '=', 'branches.id')
        ->where('materials.trash', 0)
        ->whereRaw("branches.id = ". $whereBranch)
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
        //dd($request->all());
        $status = $request->get('status') ? $request->get('status') : 0;
        try{
            //$this->validate($request,['m_g_id' => 'required','m_g_desc' => 'required']);
            $material_group =  Materialgroup::where('id', $request->get('m_g_id'))->first();
            $material_no =  Material::where('m_g_id', $request->get('m_g_id'))->count();
            $material_no += 1;
            $new_material_no = $material_group->material_code.'-'.sprintf("%05d", $material_no);
            $smtp = new Material(
            [  
                'm_no' => $new_material_no ,
                'name' => $request->get('name'),
                'desc' => $request->get('desc'),
                'm_g_id' => $request->get('m_g_id'),
                'max' => $request->get('max'),
                'min' => $request->get('min'),
                'branch_id' => $request->get('branch_id'),
                'status' => $status,
                'unit_id' => $request->get('unit_id'),
                'trash' => 0,
            ]);
            // dd($smtp);
            $smtp -> save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/material')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/material')->with('error', $e->getMessage());
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
        $where = array('id' => $id);
        $smtp  = Material::where($where)->first();
        return Response::json($smtp);
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
        $status = $request->get('status') ? $request->get('status') : 0;
        try{
        $smtp = Material::findOrFail($id);
        if($smtp->m_g_id != $request->get('m_g_id')){
            $material_group =  Materialgroup::where('id', $request->get('m_g_id'))->first();
            $material_no =  Material::where('m_g_id', $request->get('m_g_id'))->count();
            $material_no += 1;
            $new_material_no = $material_group->material_code.'-'.sprintf("%05d", $material_no);
            $smtp->m_no = $new_material_no;
        }
        $smtp->name = $request->get('name');
        $smtp->desc = $request->get('desc');
        $smtp->m_g_id = $request->get('m_g_id');
        $smtp->max = $request->get('max');
        $smtp->min = $request->get('min');
        $smtp->branch_id = $request->get('branch_id');
        $smtp->status = $status;
        $smtp->unit_id = $request->get('unit_id');
        $smtp->save();
        $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
         return redirect('/material')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('name'));
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/material')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $smtp = Material::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/material')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/material')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
    }
}
