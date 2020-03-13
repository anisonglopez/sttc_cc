<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Assetgroup;
use App\Branch;
use Redirect,Response;
use App\Traits;
use DataTables;
use App\Log;

class AssetgroupController extends Controller
{
    use Traits; // for Save logs
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $smtp = Assetgroup::all()->where('trash', 0);
         //dd($mg);
        $whereBranch = $this->getBranchId();
        $smtp1 = Branch::query()
        ->select('*')
        -> where('trash', 0)
        ->whereRaw("branches.id = ". $whereBranch)
        ->get();
        return view('assetgroup.index', [
            // 'data' => $smtp,
            'data1' => $smtp1,
            ]);
    }

    public function getdata(Request $request)
    {
        // dd($request);
        $whereBranch = $this->getBranchId();
        return Datatables::of(Assetgroup::query()
        ->select('assetgroups.*','branches.short_name as b_name')
        ->Join('branches', 'assetgroups.branch_id', '=', 'branches.id')
        ->where('assetgroups.trash', 0)
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
        try{
            $smtp = new Assetgroup(
            [  
                'branch_id' => $request->get('branch_id'),
                'name' => $request->get('name'),
                'useful' => $request->get('useful'),
                'depreciation_rate' => $request->get('depreciation_rate'),
                'desc' => $request->get('desc'),
                'trash' => 0,
            ]);
            $smtp -> save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/assetgroup')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/assetgroup')->with('error', $e->getMessage());
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
        try{
            $where = array('id' => $id);
            $smtp  = Assetgroup::where($where)->first();
            // dd($smtp);
            return Response::json($smtp);
            }catch (\Exception $e) {
                return $e->getMessage();
        }
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
        try{
            $smtp = Assetgroup::findOrFail($id);
            $smtp->branch_id = $request->get('branch_id');
            $smtp->name = $request->get('name');
            $smtp->useful = $request->get('useful');
            $smtp->depreciation_rate = $request->get('depreciation_rate');
            $smtp->desc = $request->get('desc');
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
             return redirect('/assetgroup')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('id'));
                }catch (\Exception $e) {
                    $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                    return redirect('/assetgroup')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
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
            $smtp = Assetgroup::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/assetgroup')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/assetgroup')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
    }
}
