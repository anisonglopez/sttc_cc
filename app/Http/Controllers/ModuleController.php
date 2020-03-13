<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use Redirect,Response;
use App\Traits;
use DataTables;

class ModuleController extends Controller
{
    use Traits; // for Save logs
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smtp = Module::all()->where('trash', 0);
       return view('module.index', ['data' => $smtp]);
        //
    }
    public function getdata(Request $request)
    {
        // dd($request);
        return Datatables::of(Module::query()->where('trash', 0)->get())->make(true);
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
            $smtp = new Module(
            [  
                'module_name' => $request->get('module_name'),
                'trash' => 0,
            ]);
            $smtp -> save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/module')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/module')->with('error', $e->getMessage());
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
        $smtp  = Module::where($where)->first();
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
        try{
            $smtp = Module::findOrFail($id);
            $smtp->module_name = $request->get('module_name');
            $smtp->save();
            // return $smtp;
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
             return redirect('/module')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('name'));
                }catch (\Exception $e) {
                    $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                    return redirect('/module')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');             
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
            $smtp = Module::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/module')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/module')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
        //
    }
}
