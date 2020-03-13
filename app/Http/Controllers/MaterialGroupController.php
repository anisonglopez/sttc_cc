<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Materialgroup;
use Redirect,Response;
use App\Traits;
use DataTables;

class MaterialGroupController extends Controller
{
    use Traits; // for Save logs
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smtp = Materialgroup::all()->where('trash', 0);
         //dd($mg);
        return view('material_group.index', ['data' => $smtp]);
    }
    public function getdata(Request $request)
    {
        // dd($request);
        return Datatables::of(Materialgroup::query()->where('trash', 0)->get())->make(true);
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
        //$this->validate($request,['m_g_id' => 'required','m_g_desc' => 'required']);
        $smtp = new Materialgroup(
        [  
            'material_code' => $request->get('material_code'),
            'name' => $request->get('name'),
            'desc' => $request->get('desc'),
            'trash' => 0,
        ]);
        $smtp -> save();
        $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
        return redirect('/materialgroup')->with('success', 'บันทึกข้อมูลสำเร็จ');
        }catch (\Exception $e) {
            $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
            return redirect('/materialgroup')->with('error', $e->getMessage());
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
            $smtp  = Materialgroup::where($where)->first();
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
        // $status = $request->get('status') ? $request->get('status') : 0;
        try{
        $smtp = Materialgroup::findOrFail($id);
        $smtp->material_code = $request->get('material_code');
        $smtp->name = $request->get('name');
        $smtp->desc = $request->get('desc');
        $smtp->save();
        $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
         return redirect('/materialgroup')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('id'));
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/materialgroup')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
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
            $smtp = Materialgroup::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/materialgroup')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/materialgroup')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
    }
}
