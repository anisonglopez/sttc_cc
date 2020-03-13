<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Branch;
use App\Businessunit;
use App\Company;
use App\Department;
use App\DepInBranch;
use DB;
use Redirect,Response;
use App\Traits;
use DataTables;

class BranchController extends Controller
{   
    use Traits; // for Save logs
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $smtp =  DB::table('branches')
        // ->select('branches.*', 'companies.name_th as c_name', 'businessunits.name as b_name')
        // ->Join('companies', 'branches.com_id', '=', 'companies.id')
        // ->Join('businessunits', 'branches.bu_id', '=', 'businessunits.id')
        // ->where('branches.trash', 0)
        // ->get();

        $smtp2 = Company::all()->where('trash', 0);
        $smtp3 = Businessunit::all()->where('trash', 0);
        $smtp4 = Department::all()->where('trash', 0);
        return view('branch.index', [
            // 'data' => $smtp,
            'data2' => $smtp2,
            'data3' => $smtp3,
            'data4' => $smtp4,
            ]);
    }
    public function getdata(Request $request)
    {
        // dd($request);
        return Datatables::of(Branch::query()
        ->select('branches.*', 'companies.name_th as c_name', 'businessunits.name as b_name')
        ->Join('companies', 'branches.com_id', '=', 'companies.id')
        ->Join('businessunits', 'branches.bu_id', '=', 'businessunits.id')
        ->where('branches.trash', 0)
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
            $smtp = new Branch(
            [  
                'com_id' => $request->get('com_id'),
                'branch_no' => $request->get('branch_no'),
                'name_th' => $request->get('name_th'),
                'name_en' => $request->get('name_en'),
                'short_name' => $request->get('short_name'),
                'tel' => $request->get('tel'),
                'fax' => $request->get('fax'),
                'email' => $request->get('email'),
                'add_th' => $request->get('add_th'),
                'add_en' => $request->get('add_en'),
                'bu_id' => $request->get('bu_id'),
                'trash' => 0,
            ]);
            // dd($smtp);
            $smtp -> save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            $lastid = $smtp->id;
            if($request->get('dep_id')){
                foreach ($request->get('dep_id') as $item):
                    $smtp2 = new DepInBranch(
                        [
                            'branch_id' => $lastid,
                            'dep_id' => $item,
                        ]);
                    $smtp2->save();
                    $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp2, true));
            endforeach;
            }
            return redirect('/branch')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/branch')->with('error', $e->getMessage());
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
        $smtp  = Branch::where($where)->first();
        $matchThese = ['branch_id' =>$id,'trash'=>0];
        $smtp2 = DepInBranch::query()
        ->select('*')
        ->Join('departments', 'dep_in_branches.dep_id', '=', 'departments.id')
        ->where($matchThese)
        ->get();
        return Response::json
        (array(
            'data' => $smtp,
            'data2' => $smtp2,
        ));
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
            $smtp = Branch::findOrFail($id);
            $smtp->com_id = $request->get('com_id');
            $smtp->branch_no = $request->get('branch_no');
            $smtp->name_th = $request->get('name_th');
            $smtp->name_en = $request->get('name_en');
            $smtp->short_name = $request->get('short_name');
            $smtp->tel = $request->get('tel');
            $smtp->fax = $request->get('fax');
            $smtp->email = $request->get('email');
            $smtp->add_th = $request->get('add_th');
            $smtp->add_en = $request->get('add_en');
            $smtp->bu_id = $request->get('bu_id');

            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            // Save Dep in branch
            $smtpdelete = DepInBranch::where('branch_id',$id)->delete();
            if($request->get('dep_id')){
                
                foreach ($request->get('dep_id') as $item):
                    $smtp2 = new DepInBranch(
                        [
                            'branch_id' => $id,
                            'dep_id' => $item,
                        ]);
                    $smtp2->save();
                    $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp2, true));
            endforeach;
            }
             return redirect('/branch')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('name'));
                }catch (\Exception $e) {
                    $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                    return redirect('/branch')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
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
            $smtp = Branch::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/branch')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/branch')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
    }
}
