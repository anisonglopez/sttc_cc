<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Branch;
use App\Department;
use Redirect,Response;
use App\Traits;
use DateTime;
use DataTables;

class EmployeeController extends Controller
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
        $smtp2 = Branch::query()
        ->select('*')
        -> where('trash', 0)
        ->whereRaw("branches.id = ". $whereBranch)
        ->get();
        $smtp3 = Department::all()->where('trash', 0);
        return view('employee.index', [
            'data2' => $smtp2,
            'data3' => $smtp3,
            ]);
    }
    public function getdata(Request $request)
    {
        // dd($request);
        $whereBranch = $this->getBranchId();
        return Datatables::of(Employee::query()
        ->select('employees.*', 'branches.short_name as b_name','departments.name_th as d_name')
        ->Join('branches', 'employees.branch_id', '=', 'branches.id')
        ->Join('departments', 'employees.dep_id', '=', 'departments.id')
        ->where('employees.trash', 0)
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
        $status = $request->get('status') ? $request->get('status') : 0;
        try{
            $smtp = new Employee(
            [  
                'dep_id' => $request->get('dep_id'),
                'branch_id' => $request->get('branch_id'),
                'emp_code' => $request->get('emp_code'),
                'title' => $request->get('title'),
                'f_name' => $request->get('f_name'),
                'l_name' => $request->get('l_name'),
                'nickname' => $request->get('nickname'),
                'remark' => $request->get('remark'),
                'assign_flg' => $status,
                'trash' => 0,
            ]);
            // dd($smtp);
            $smtp -> save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/employee')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/employee')->with('error', $e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $where = array('id' => $id);
            $smtp  = Employee::where($where)->first();
            return Response::json($smtp);
            }catch (\Exception $e) {
                return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $status = $request->get('status') ? $request->get('status') : 0;
        try{
            $smtp = Employee::findOrFail($id);
            $smtp->dep_id = $request->get('dep_id');
            $smtp->branch_id = $request->get('branch_id');
            $smtp->emp_code = $request->get('emp_code');
            $smtp->title = $request->get('title');
            $smtp->f_name = $request->get('f_name');
            $smtp->l_name = $request->get('l_name');
            $smtp->nickname = $request->get('nickname');
            $smtp->remark = $request->get('remark');
            $smtp->assign_flg = $status;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
             return redirect('/employee')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('name'));
                }catch (\Exception $e) {
                    $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                    return redirect('/employee')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $smtp = Employee::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/employee')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/employee')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
    }
}
