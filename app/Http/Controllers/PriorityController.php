<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Priority;
use Redirect,Response;
use App\Traits;
use DataTables;

class PriorityController extends Controller
{
    use Traits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smtp = Priority::all()->where('trash', 0);
         //dd($mg);
        return view('priority.index', ['data' => $smtp]);
    }
    public function getdata(Request $request)
    {
        // dd($request);
        return Datatables::of(Priority::query()->where('trash', 0)->get())->make(true);
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
            $smtp = new Priority(
            [  
                'name' => $request->get('name'),
                'code' => $request->get('code'),
                'color_code' => $request->get('color_code'),
                'noti_flag' => $status,
                'expire_date' => $request->get('expire_date'),
                'remark' => $request->get('remark'),
                'trash' => 0,
            ]);
            $smtp -> save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/priority')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/priority')->with('error', $e->getMessage());
            }//
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
            $smtp  = Priority::where($where)->first();
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
        $status = $request->get('status') ? $request->get('status') : 0;
        try{
            $smtp = Priority::findOrFail($id);
            $smtp->name = $request->get('name');
            $smtp->code = $request->get('code');
            $smtp->color_code = $request->get('color_code');
            $smtp->remark = $request->get('remark');
            $smtp->noti_flag = $status;
            $smtp->expire_date = $request->get('expire_date');
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
             return redirect('/priority')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('id'));
            }
            catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                    return redirect('/priority')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
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
            $smtp = Priority::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/priority')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/priority')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
    }
}
