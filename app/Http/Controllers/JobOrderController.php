<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Joborder;
use App\Joborder_seq;
use App\Jobstatus;
use App\Jobtype;
use App\Department;
use App\Branch;
use App\Location;
use App\Priority;
use App\Employee;
use App\Requester;
use App\Material;
use App\Jobmateriallist;
use Auth;
use DB;
use Redirect,Response;
use App\Traits;
use DateTime;
use DataTables;

class JobOrderController extends Controller
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
        $smtp4 = Department::all()->where('trash', 0);
        $smtp5 = Branch::query()
        ->select('*')
        -> where('trash', 0)
        ->whereRaw("branches.id = ". $whereBranch)
        ->get();
        return view('joborder.index',[
            'data4' => $smtp4,
            'data5' => $smtp5,
            ]);
    }
    public function getdata(Request $request)
    {
        
        $whereBranch = $this->getBranchId();
        return Datatables::of(Joborder::query()
        ->select('joborders.*', 'jobstatuses.name as js_name',
                 'jobtypes.name as jt_name', 'departments.name_th as dep_name', 
                 'branches.short_name as b_name','priorities.name as p_name','priorities.color_code as color_name',
                 'employees.f_name as e_name','requesters.name as requester_name' )
        ->Join('jobstatuses', 'joborders.job_status_id', '=', 'jobstatuses.id')
        ->leftjoin('jobtypes', 'joborders.job_type_id', '=', 'jobtypes.id')
        ->Join('departments', 'joborders.request_dep_id', '=', 'departments.id')
        ->Join('branches', 'joborders.branch_id', '=', 'branches.id')
        ->Rightjoin('priorities', 'joborders.priority_id', '=', 'priorities.id')
        ->Join('employees', 'joborders.assignee','=', 'employees.id')
        ->Join('requesters', 'joborders.request_by','=', 'requesters.id')
        ->whereRaw('branches.id = '. $whereBranch)
        ->where('joborders.trash', 0)
        ->whereBetween('joborders.request_date', [
            $request->get('startDate'),
            $request->get('endDate'),
        ])
        ->get())->make(true);
            // dd();
    }

    public function searchResult($querystring)
    {
        // dd($querystring);
        
        return view('joborder.searchresult');
        
        //
    }

    public function getlocation(Request $request)
    {
        
        // $whereBranch = $this->getBranchId();
        $stmt = Location::all()
        // ->whereRaw('branches.id = '. $whereBranch)
        ->where('trash', 0);
        $table  = '<table id="component_datatable_modal" class="table table-sm table-hover table-bordered">
            <thead class="">
                <tr  class="text-center">
                    <th>ชื่อสถานที่</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($stmt as $row):
        $table  .='
                <tr>
                    <td class="text-center">'.$row->name.'</td>
                    <td class="text-center"><a  data-value="'.$row->name.'" href="#" class="btn btn-success btn-sm btnmodal_add"><span class="fa fa-plus"></span></button></td>
                </tr>
                ';
    endforeach;
    $table .= '</tbody>
    </table>';
        $frmAction =  'formLocation';
        return   [
            'table' => $table,
            'frmAction' => $frmAction,
            'title' => 'ข้อมูลสถานที่',
        ];
    }
    public function getrequest_by(Request $request)
    {
        $whereBranch = $this->getBranchId();
        $stmt = Employee::query()
        ->select('employees.*','employees.id as emp_id' , 'branches.short_name as branch_name','departments.name_th as dep_name')
        ->Join('branches', 'employees.branch_id', '=', 'branches.id')
        ->Join('departments', 'employees.dep_id', '=', 'departments.id')
        ->whereRaw('branches.id ='. $request->get('branch_id'))
        ->where('employees.trash', 0)
        ->get();
        $table  = '<table id="component_datatable_modal" class="table table-sm table-hover table-bordered">
            <thead class="">
                <tr  class="text-center">
                    <th>สาขา</th>
                    <th>ชื่อพนักงาน</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($stmt as $row):
        $table  .='
                <tr>
                    <td class="text-center">'.$row->branch_name.'</td>
                    <td>'.$row->f_name.'</td>
                    <td class="text-center"><a  data-id="'.$row->emp_id.'"data-value="'.$row->f_name.'" href="#" class="btn btn-success btn-sm btnmodal_add"><span class="fa fa-plus"></span></button></td>
                </tr>
                ';
    endforeach;
    $table .= '</tbody>
    </table>';
        $frmAction =  'formRequest_by';
        return   [
            'table' => $table,
            'frmAction' => $frmAction,
            'title' => 'ข้อมูลผู้แจ้ง',
        ];
    }
    public function getassign_as(Request $request)
    {
        $whereBranch = $this->getBranchId();
        $stmt = Employee::query()
        ->select('employees.*','employees.id as emp_id' , 'branches.short_name as branch_name','departments.name_th as dep_name')
        ->Join('branches', 'employees.branch_id', '=', 'branches.id')
        ->Join('departments', 'employees.dep_id', '=', 'departments.id')
        ->whereRaw('branches.id ='. $request->get('branch_id'))
        ->where('employees.trash', 0)
        ->get();
        $table  = '<table id="component_datatable_modal" class="table table-sm table-hover table-bordered">
            <thead class="">
                <tr  class="text-center">
                    <th>สาขา</th>
                    <th>แผนก</th>
                    <th>ชื่อผู้ได้รับมอบหมาย</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($stmt as $row):
        $table  .='
                <tr>
                    <td class="text-center">'.$row->branch_name.'</td>
                    <td>'.$row->dep_name.'</td>
                    <td>'.$row->f_name.'</td>
                    <td class="text-center"><a  data-id="'.$row->emp_id.'" data-value="'.$row->f_name.'" href="#" class="btn btn-success btn-sm btnmodal_add"><span class="fa fa-plus"></span></button></td>
                </tr>
                ';
    endforeach;
    $table .= '</tbody>
    </table>';
        $frmAction =  'formAssign_as';
        return   [
            'table' => $table,
            'frmAction' => $frmAction,
            'title' => 'ข้อมูลผู้ได้รับมอบหมาย',
        ];
    }
    public function getassignee(Request $request)
    {
        $whereBranch = $this->getBranchId();
        $stmt = Employee::query()
        ->select('employees.*','employees.id as emp_id','branches.short_name as branch_name','departments.name_th as dep_name')
        ->Join('branches', 'employees.branch_id', '=', 'branches.id')
        ->Join('departments', 'employees.dep_id', '=', 'departments.id')
        ->whereRaw('branches.id = '. $request->get('branch_id'))
        ->where('employees.assign_flg', 1)
        ->where('employees.trash', 0)
        ->get();
        $table  = '<table id="component_datatable_modal" class="table table-sm table-hover table-bordered">
            <thead class="">
                <tr  class="text-center">
                    <th>สาขา</th>
                    <th>แผนก</th>
                    <th>ชื่อผู้มอบหมาย</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($stmt as $row):
        $table  .='
                <tr>
                    <td class="text-center">'.$row->branch_name.'</td>
                    <td>'.$row->dep_name.'</td>
                    <td>'.$row->f_name.'</td>
                    <td class="text-center"><a  data-id="'.$row->emp_id.'" data-value="'.$row->f_name.'" href="#" class="btn btn-success btn-sm btnmodal_add"><span class="fa fa-plus"></span></button></td>
                </tr>
                ';
    endforeach;
    $table .= '</tbody>
    </table>';
        $frmAction =  'formAssignee';
        return   [
            'table' => $table,
            'frmAction' => $frmAction,
            'title' => 'ข้อมูลผู้มอบหมาย',
        ];
    }
    public function getmaterial(Request $request)
    {
        
        $whereBranch = $this->getBranchId();
        $stmt = Material::query()
        ->select('materials.*', 'branches.short_name as branch_name','materialgroups.name as m_g_name','materials.id as material_id','m__stocks.qty_balance')
        ->Join('branches', 'materials.branch_id', '=', 'branches.id')
        ->Join('materialgroups', 'materials.m_g_id', '=', 'materialgroups.id')
        ->leftJoin('m__stocks', 'materials.id', '=', 'm__stocks.m_id')
        ->whereRaw('branches.id = '. $request->get('branch_id'))
        ->where('materials.trash', 0)
        ->where('materials.status', 1)
        ->get();
        $table  = '<table id="component_datatable_modal" class="table table-sm table-hover table-bordered">
            <thead class="">
                <tr  class="text-center">
                    <th>สาขา</th>
                    <th>Material No</th>
                    <th>ประเภทวัสดุ</th>
                    <th>ชื่อวัสดุอุปกรณ์</th>
                    <th>Stock Balance</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($stmt as $row):
        $table  .='
                <tr>
                    <td class="text-center">'.$row->branch_name.'</td>
                    <td class="text-center">'.$row->m_no.'</td>
                    <td class="text-center">'.$row->m_g_name.'</td>
                    <td>'.$row->name.'</td>
                    <td class="text-center">'.$row->qty_balance.'</td>
                    <td class="text-center"><a data-id="'.$row->material_id.'" data-value="'.$row->name.'" href="#" class="btn btn-success btn-sm btnmodal_add"><span class="fa fa-plus"></span></button></td>
                </tr>
                ';
    endforeach;
    $table .= '</tbody>
    </table>';
        $frmAction =  'formMaterial';
        return   [
            'table' => $table,
            'frmAction' => $frmAction,
            'title' => 'ข้อมูลวัสดุอุปกรณ์',
        ];
    }
    public function getasset(Request $request)
    {
        
        $whereBranch = $this->getBranchId();
        $stmt = Asset::query()
        ->select('assets.*', 'branches.short_name as branch_name',
                             'assetmodels.name_th as a_name',
                             'departments.name_th as d_name',
                             'checkinstatuses.name as c_name',)
        ->Join('assetmodels', 'assets.a_m_id', '=', 'assetmodels.id')
        ->Join('departments', 'assets.owner_dep', '=', 'departments.id')
        ->Join('checkinstatuses', 'assets.asset_status', '=', 'checkinstatuses.id')
        ->Join('branches', 'assets.branch_id', '=', 'branches.id')
        ->whereRaw('branches.id = '. $request->get('branch_id'))
        ->where('assets.trash', 0)
        ->get();
        $table  = '<table id="component_datatable_modal" class="table table-sm table-hover table-bordered">
            <thead class="">
                <tr  class="text-center">
                    <th>สาขา</th>
                    <th>เจ้าของทรัพย์สิน</th>
                    <th>สถานะทรัพย์สิน</th>
                    <th>รหัสทรัพย์สิน</th>
                    <th>โมเดลทรัพย์สิน</th>
                    <th>เลขซีเรียล</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($stmt as $row):
        $table  .='
                <tr>
                    <td class="text-center">'.$row->branch_name.'</td>
                    <td class="text-center">'.$row->d_name.'</td>
                    <td>'.$row->c_name.'</td>
                    <td class="text-center">'.$row->asset_no.'</td>
                    <td class="text-center">'.$row->a_name.'</td>
                    <td class="text-center">'.$row->serial_no.'</td>
                    <td class="text-center"><button data-id="'.$row->asset_no.'" data-value="'.$row->name.'" href="#" class="btn btn-success btn-sm btnmodal_add"><span class="fa fa-plus"></span></button></td>
                </tr>
                ';
    endforeach;
    $table .= '</tbody>
    </table>';
        $frmAction =  'formAsset';
        return   [
            'table' => $table,
            'frmAction' => $frmAction,
            'title' => 'ข้อมูลทรัพย์สิน',
        ];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $whereBranch = $this->getBranchId();
        $smtp2 = Jobstatus::all()->where('trash', 0);
        $smtp3 = Jobtype::all()->where('trash', 0);
        $smtp4 = Department::all()->where('trash', 0);
        $smtp5 = Branch::query()
        ->select('*')
        -> where('trash', 0)
        ->whereRaw("branches.id = ". $whereBranch)
        ->get();
        $smtp6 = Priority::all()->where('trash', 0);
        $smtp7 = Employee::all()->where('trash', 0);
        return view('joborder.create',[
            // 'data' => $smtp,
            'data2' => $smtp2,
            'data3' => $smtp3,
            'data4' => $smtp4,
            'data5' => $smtp5,
            'data6' => $smtp6,
            'data7' => $smtp7,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_joborder_head(Request $request)
    {
        $email = Auth::user() ? Auth::user()->email : 'USER_NULL';
        try{
            $request_date = DateTime::createFromFormat('d/m/Y', $request->get('request_date'));
            $request_date = date("Y-m-d", strtotime($request_date->format('Y-m-d') . '- 543 years'));
            $schedule_start_date = DateTime::createFromFormat('d/m/Y', $request->get('schedule_start_date'));
            $schedule_start_date = date("Y-m-d", strtotime($schedule_start_date->format('Y-m-d') . '- 543 years'));
            $schedule_end_date = DateTime::createFromFormat('d/m/Y', $request->get('schedule_end_date'));
            $schedule_end_date = date("Y-m-d", strtotime($schedule_end_date->format('Y-m-d') . '- 543 years'));
            $jobtype_no = Jobtype::where('id', $request->get('job_type_id'))->first();
            $as_is =   Joborder_seq::where('job_type', $jobtype_no->job_no)->count();
            $as_is +=1;
            $stmt1 = new Joborder_seq([
                'job_type' => $jobtype_no->job_no,
                'as_is' => $as_is,
            ]);
            $stmt -> save();
            $prefix_date =  date("Ym", strtotime(date('Y-m-d') . '+ 543 years'));
            $new_job_no = $jobtype_no->job_no.$prefix_date.'-'.sprintf("%04d", $as_is);
            $smtp1 = new Joborder(
            [  
                'job_no' => $new_job_no,
                'job_title' => $request->get('job_title'),
                'ma_no' => $request->get('ma_no'),
                'request_date' => $request_date,
                'request_time' => $request->get('request_time'),
                'request_by' => $request->get('request_by'),
                'desc' => $request->get('desc'),
                'tel' => $request->get('tel'),
                'branch_id' => $request->get('branch_id'),
                'created_by' => $email,
                'joborder_status' => 'new',
                'trash' => 0,
            ]);
            //  
            $smtp1 -> save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/joborder/'.$lastid.'/edit')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                dd($e);
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/jobordercreate')->with('error', $e->getMessage());
            }
    }
    public function store(Request $request)
    {
        
        // dd($request);
        $email = Auth::user() ? Auth::user()->email : 'USER_NULL';
        try{
            $request_date = DateTime::createFromFormat('d/m/Y', $request->get('request_date'));
            $request_date = date("Y-m-d", strtotime($request_date->format('Y-m-d') . '- 543 years'));
            $schedule_start_date = DateTime::createFromFormat('d/m/Y', $request->get('schedule_start_date'));
            $schedule_start_date = date("Y-m-d", strtotime($schedule_start_date->format('Y-m-d') . '- 543 years'));
            $schedule_end_date = DateTime::createFromFormat('d/m/Y', $request->get('schedule_end_date'));
            $schedule_end_date = date("Y-m-d", strtotime($schedule_end_date->format('Y-m-d') . '- 543 years'));
            $jobtype_no = Jobtype::where('id', $request->get('job_type_id'))->first();
            $as_is =   Joborder_seq::where('job_type', $jobtype_no->job_no)->count();
            $as_is +=1;
            $stmt = new Joborder_seq([
                'job_type' => $jobtype_no->job_no,
                'as_is' => $as_is,
            ]);
            $stmt -> save();
            $prefix_date =  date("Ym", strtotime(date('Y-m-d') . '+ 543 years'));
            $new_job_no = $jobtype_no->job_no.$prefix_date.'-'.sprintf("%04d", $as_is);
            $smtp = new Joborder(
            [  
                'job_no' => $new_job_no,
                'job_title' => $request->get('job_title'),
                'ma_no' => $request->get('ma_no'),
                'request_date' => $request_date,
                'request_time' => $request->get('request_time'),
                'request_by' => $request->get('request_by'),
                'desc' => $request->get('desc'),
                'asset_owner_dep_id' => $request->get('asset_owner_dep_id'),
                'location_name' => $request->get('location_name'),
                'request_dep_id' => $request->get('request_dep_id'),
                'tel' => $request->get('tel'),
                'assign_as' => $request->get('assign_as'),
                'assignee' => $request->get('assignee'),
                'job_type_id' => $request->get('job_type_id'),
                'remark' => $request->get('remark'),
                'branch_id' => $request->get('branch_id'),
                'job_status_id' => $request->get('job_status_id'),
                'priority_id' => $request->get('priority_id'),
                'schedule_start_date' => $schedule_start_date,
                'schedule_start_time' => $request->get('schedule_start_time'),
                'schedule_end_date' => $schedule_end_date,
                'schedule_end_time' => $request->get('schedule_end_time'),
                'created_by' => $email,
                'joborder_status' => 'new',
                'trash' => 0,
            ]);
            //  
            $smtp -> save();
            $lastid = $smtp->id;
            //  ----------- Stock Transaction ----------
            if($request->get('stock_transaction')):
                $i = 0;
                foreach ($request->get('m_id') as $row) :
                    $smtp_detail = new Jobmateriallist(
                        [  
                            'job_id' => $lastid,
                            'm_id' => $request->get('m_id')[$i],
                            'reason' => $request->get('reason')[$i],
                            'qty_out' => $request->get('qty_out')[$i],
                            'qty_in' => $request->get('qty_in')[$i],
                            'stock_balance_as' => $request->get('stock_balance_as')[$i],
                        ]);
                        // dd($smtp_detail);
                        $smtp_detail -> save();
                $i++;
                endforeach;
            endif;
            //  ----------- Stock Transaction ----------
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/joborder/'.$lastid.'/edit')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                dd($e);
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/jobordercreate')->with('error', $e->getMessage());
                // $e->getMessage();
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
        // $smtp = Joborder::query()
        // ->select('joborders.*', 'jobstatuses.name as js_name',
        // 'jobtypes.name as jt_name', 'departments.name_th as dep_name', 
        // 'branches.short_name as b_name','priorities.name as p_name',
        // 'employees.f_name as e_name','requesters.name as requester_name' )
        // ->Join('jobstatuses', 'joborders.job_status_id', '=', 'jobstatuses.id')
        // ->leftjoin('jobtypes', 'joborders.job_type_id', '=', 'jobtypes.id')
        // ->Join('departments', 'joborders.request_dep_id', '=', 'departments.id')
        // ->Join('branches', 'joborders.branch_id', '=', 'branches.id')
        // ->Join('priorities', 'joborders.priority_id', '=', 'priorities.id')
        // ->Join('employees', 'joborders.assignee','=', 'employees.id')
        // ->Join('requesters', 'joborders.request_by','=', 'requesters.id')
        // ->where('joborders.trash', 0)
        // ->where('joborders.id', $id)
        // ->get()->first();
        $whereBranch = $this->getBranchId();
        $smtp = Joborder::query()
        ->select('joborders.*', 'jobstatuses.name as js_name',
        'jobtypes.name as jt_name', 'departments.name_th as dep_name', 
        'branches.short_name as b_name','priorities.color_code as p_name',
        'employees.f_name as e_name','requesters.name as requester_name',

        DB::Raw("(SELECT employees.f_name as assignee_name FROM joborders
        JOIN employees ON joborders.assignee = employees.id
        WHERE joborders.id =  ".$id.") AS assignee_name,
        (SELECT f_name as assignAs_name FROM joborders 
        JOIN employees ON joborders.assign_as = employees.id
        WHERE joborders.id = ".$id.") AS assignAs_name
        ")
    
        )

        ->Join('jobstatuses', 'joborders.job_status_id', '=', 'jobstatuses.id')
        ->leftjoin('jobtypes', 'joborders.job_type_id', '=', 'jobtypes.id')
        ->Join('departments', 'joborders.request_dep_id', '=', 'departments.id')
        ->Join('branches', 'joborders.branch_id', '=', 'branches.id')
        ->Join('priorities', 'joborders.priority_id', '=', 'priorities.id')
        ->Join('employees', 'joborders.assignee','=', 'employees.id')
        ->Join('requesters', 'joborders.request_by','=', 'requesters.id')
        ->where('joborders.trash', 0)
        ->where('joborders.id', $id)
        ->get()->first();
        // dd($smtp);
        $smtp2 = Jobstatus::all()->where('trash', 0);
        $smtp3 = Jobtype::all()->where('trash', 0);
        $smtp4 = Department::all()->where('trash', 0);
        $smtp5 = Branch::query()
        ->select('*')
        -> where('trash', 0)
        ->whereRaw("branches.id = ". $whereBranch)
        ->get();
        $smtp6 = Priority::all()->where('trash', 0);
        $smtp7 = Employee::all()->where('trash', 0);
        $smtp8 = Jobmateriallist::query()
        ->select('jobmateriallists.*','materials.name as m_name','materials.m_no','materialgroups.name as mg_name', 'm__stocks.qty_balance as qty_balance_as')
        ->Join('materials','jobmateriallists.m_id','=','materials.id')   
        ->Join('materialgroups','materials.m_g_id','=','materialgroups.id') 
        ->leftJoin('m__stocks','materials.id','=','m__stocks.m_id') 
        ->where('jobmateriallists.job_id',$id)
        ->get();

        // dd($smtp4);  
        return view('joborder.edit',[
            'data' => $smtp,
            'data2' => $smtp2,
            'data3' => $smtp3,
            'data4' => $smtp4,
            'data5' => $smtp5,
            'data6' => $smtp6,
            'data7' => $smtp7,
            'data8' => $smtp8,
            ]);
    //  dd($smtp);
        try{
            $where = array('id' => $id);
            $smtp  = Joborder::where($where)->first();
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
        $email = Auth::user() ? Auth::user()->email : 'USER_NULL';
        try{
            $request_date = DateTime::createFromFormat('d/m/Y', $request->get('request_date'));
            $request_date = date("Y-m-d", strtotime($request_date->format('Y-m-d') . '- 543 years'));
            $schedule_start_date = DateTime::createFromFormat('d/m/Y', $request->get('schedule_start_date'));
            $schedule_start_date = date("Y-m-d", strtotime($schedule_start_date->format('Y-m-d') . '- 543 years'));
            $schedule_end_date = DateTime::createFromFormat('d/m/Y', $request->get('schedule_end_date'));
            $schedule_end_date = date("Y-m-d", strtotime($schedule_end_date->format('Y-m-d') . '- 543 years'));
            $smtp = Joborder::findOrFail($id);
            $flg = "";
            if ($request->get('job_flg') == 'confirmout'){
                $joborder_status = 'confirmout';
            }elseif ($request->get('job_flg') == 'saveconfirm'){
                $joborder_status = 'confirmout';
                $flg = "update";
            }elseif ($request->get('job_flg') == 'confirmin'){
                $joborder_status = 'confirmin';
            }elseif ($request->get('job_flg') == 'save_affter_in'){
                $joborder_status = 'confirmin';
                $flg = "update";
            }else{
                $joborder_status = "new";
            }
            $smtp->job_title = $request->get('job_title');
            $smtp->ma_no = $request->get('ma_no');
            $smtp->request_date = $request_date;
            $smtp->request_time = $request->get('request_time');
            $smtp->request_by = $request->get('request_by');
            $smtp->desc = $request->get('desc');
            $smtp->asset_owner_dep_id = $request->get('asset_owner_dep_id');
            $smtp->location_name = $request->get('location_name');
            $smtp->request_dep_id = $request->get('request_dep_id');
            $smtp->tel = $request->get('tel');
            $smtp->assign_as = $request->get('assign_as');
            $smtp->assignee = $request->get('assignee');
            // $smtp->job_type_id = $request->get('job_type_id');
            $smtp->remark = $request->get('remark');
            // $smtp->branch_id = $request->get('branch_id');
            $smtp->job_status_id = $request->get('job_status_id');
            $smtp->created_by = $email;
            $smtp->priority_id = $request->get('priority_id');
            $smtp->schedule_start_date = $schedule_start_date;
            $smtp->schedule_start_time = $request->get('schedule_start_time');
            $smtp->schedule_end_date = $schedule_end_date;
            $smtp->schedule_end_time = $request->get('schedule_end_time');
            $smtp->joborder_status = $joborder_status;
            
            $smtp->save();
            //  ----------- Stock Transaction ----------
            if($request->get('stock_transaction')):
                $i = 0;
          
                foreach ($request->get('m_id') as $row) :
                    $qty_in = $request->get('qty_in')[$i];
                    $qty_out = $request->get('qty_out')[$i];
                    $m_id = $request->get('m_id')[$i];
                    $reason = $request->get('reason')[$i];
                    $stock_balance_as = $request->get('stock_balance_as')[$i];
                        $smtp_detail = Jobmateriallist::updateOrCreate(
                                ['id' => $request->get('_id')[$i]],
                                [
                                    'job_id' => $id,
                                    'm_id' => $m_id,
                                    'qty_out' => $qty_out,
                                    'qty_in' => $qty_in,
                                    'reason' => $reason,
                                    'stock_balance_as' => $stock_balance_as,
                                ]);
                                // dd($smtp_detail);
                        $smtp_detail -> save();
                        if ($joborder_status == 'confirmout' && $flg != "update"):
                            $operator = '-';
                            $result = $this->StockTransaction($m_id, $qty_out , $operator);                
                        endif;
                        if ($joborder_status == 'confirmin' && $flg != "update"):
                            $operator = "+";
                            $result = $this->StockTransaction($m_id, $qty_in , $operator);      
                        endif;
                        $i++;
                        
                endforeach;    
            endif;
            //  ----------- Stock Transaction ----------
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
             return redirect('/joborder/'.$id.'/edit')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('id'));
                }catch (\Exception $e) {
                    $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                    return redirect('/joborder/'.$id.'/edit')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
                    // dd($e);
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
            $smtp = Joborder::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/joborder')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/joborder')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
    }
    public function deletedetail($id)
    {
        try{
            $smtp = Jobmateriallist::findOrFail($id);
            $smtp->delete();
             $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return "OK";
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return $e->getMessage();
            }
    }
}
