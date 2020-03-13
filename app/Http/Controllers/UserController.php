<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Branch;
use App\UserInRole;
use DB;
use Redirect,Response;
use App\Traits;
use DataTables;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use Traits; // for Save logs
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $smtp2 = Role::all();
        $smtp3 =  Branch::all()->where('trash', 0);        
        return view('user.index', [
            // 'data' => $smtp,
            'data2' => $smtp2,
            'data3' => $smtp3,
            ]);
    }
    public function getdata(Request $request)
    {
        $userQuery = DB::select('SELECT users.* , departments.name_th as dep_name, branches.short_name as branch_name,
        GROUP_CONCAT(roles.role_name) as role_name
        FROM users   
        JOIN departments ON departments.id = users.dep_id
        JOIN branches ON branches.id = users.branch_id 
        Left Join user_in_roles ON user_in_roles.user_id = users.id
        Left Join roles ON roles.id = user_in_roles.role_id
        GROUP BY users.id
        ');
       return Datatables::of($userQuery)->make(true);
    }

    public function resetPassword(Request $request)
    {
       return "resetPassword";
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
        // $this->validate($request,['fname' => 'required' , 'lname' => 'required']);
        try{
            $smtp = User::updateOrCreate(
            [
                ['id' => $request->user_id],
                'name' => $request->get('name'),
                'lname' => $request->get('lname'),
                'dep_id' => $request->get('dep'),
                'branch_id' => $request->get('branch'),
                'status' => $status,
                'email' => $request->get('email'),
                'email_real' => $request->get('email_real'),
                'tel' => $request->get('tel'),
                'password' => Hash::make($request->get('password')),
            ]
        );
            $smtp->save();
            $lastid = $smtp->id;
            if($request->get('roles')){
                foreach ($request->get('roles') as $item):
                    $smtp2 = new UserInRole(
                        [
                            'user_id' => $lastid,
                            'role_id' => $item,
                        ]);
                    $smtp2->save();
                    $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            endforeach;
        }
         
            // dd($request);
            return redirect('/user')->with('success', 'บันทึกข้อมูลสำเร็จ');
        }catch (\Exception $e) {
            $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
            // return redirect('/user')->with('error', 'เกิดข้อผิดพลาด ชื่ออีเมลซ้ำกันในระบบ');
            return redirect('/user')->with('error', $e->getMessage());
        }
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
        $where = array('id' => $id);
        $smtp  = User::where($where)->first();
        $matchThese = ['user_id' =>$id];
        $smtp2 = UserInRole::query()
        ->select('*')
        ->Join('roles', 'roles.id', '=', 'user_in_roles.role_id')
        ->where('roles.trash', 0)
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
        $status = $request->get('status') ? $request->get('status') : 0;
        try{
        $smtp = User::findOrFail($id);
        $smtp->name = $request->get('name');
        $smtp->lname = $request->get('lname');
        $smtp->dep_id = $request->get('dep');
        $smtp->branch_id = $request->get('branch');
        $smtp->email_real = $request->get('email_real');
        $smtp->tel = $request->get('tel');
        $smtp->status = $status;
        if($request->get('password')){
            $smtp->password =  Hash::make($request->get('password'));
        }
        $smtp->tel = $request->get('tel');
        $smtp->updated_at =  Carbon::now();
        $smtp->save();
        $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));

        $smtpdelete = UserInRole::where('user_id',$id)->delete();
        if($request->get('roles')){
            foreach ($request->get('roles') as $item):
                $smtp2 = new UserInRole(
                    [
                        'user_id' => $id,
                        'role_id' => $item,
                    ]);
                $smtp2->save();
                $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp2, true));
        endforeach;
        }
         return redirect('/user')->with('success', 'ปรับปรุงข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                return $e->getMessage();
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/user')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
            }
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
        try{
        $smtp = User::where('id',$id)->delete();
        $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/user')->with('success', 'ลบข้อมูลสำเร็จ');
         }catch (\Exception $e) {
            $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
            return redirect('/user')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
        }
    }

    public function checkEmail($email)
    {
        $where = array('email' => $email);
        $smtp  = User::where($where)->first();
        return Response::json($smtp);
    }
}

