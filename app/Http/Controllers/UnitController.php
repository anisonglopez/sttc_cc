<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
use Redirect,Response;
use App\Traits;
use DataTables;

class UnitController extends Controller
{
    use Traits; // for Save logs
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smtp = Unit::all()->where('trash', 0);
         //dd($mg);
        return view('unit.index', ['data' => $smtp]);
    }
    public function getdata(Request $request)
    {
        // dd($request);
        return Datatables::of(Unit::query()->where('trash', 0)->get())->make(true);
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
            $smtp = new Unit(
            [  
                'name_th' => $request->get('name_th'),
                'name_en' => $request->get('name_en'),
                'trash' => 0,
            ]);
            $smtp -> save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/unit')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/unit')->with('error', $e->getMessage());
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
            $smtp  = Unit::where($where)->first();
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
            $smtp = Unit::findOrFail($id);
            $smtp->name_th = $request->get('name_th');
            $smtp->name_en = $request->get('name_en');
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
             return redirect('/unit')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('id'));
                }catch (\Exception $e) {
                    $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                    return redirect('/unit')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
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
            $smtp = Unit::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/unit')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/unit')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
    }
}
