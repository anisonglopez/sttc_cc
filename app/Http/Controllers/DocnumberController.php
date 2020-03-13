<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Docnumber;
use App\Module;
use Redirect,Response;
use App\Traits;
use DataTables;

class DocnumberController extends Controller
{
    use Traits; // for Save logs
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $smtp =  DB::table('docnumbers')
        // ->select('docnumbers.*', 'modules.module_name as m_name')
        // ->Join('modules', 'docnumbers.module_id', '=', 'modules.id')
        // ->get();

        $smtp2 = Module::all()->where('trash', 0);
        return view('docnumber.index', [
            // 'data' => $smtp,
            'data2' => $smtp2,
            ]);
    }
    public function getdata(Request $request)
    {
        // dd($request);
        return Datatables::of(Docnumber::query()
        ->select('docnumbers.*', 'modules.module_name as m_name')
        ->Join('modules', 'docnumbers.module_id', '=', 'modules.id')
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
            $smtp = new Docnumber(
            [  
                'module_id' => $request->get('module_id'),
                'desc' => $request->get('desc'),
                'prefix' => $request->get('prefix'),
                'length_num' => $request->get('length_num'),
                'start_num' => $request->get('start_num'),
                'end_num' => $request->get('end_num'),
                
            ]);
            // dd($smtp);
            $smtp -> save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/docnumber')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/docnumber')->with('error', $e->getMessage());
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
        $smtp  = Docnumber::where($where)->first();
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
        $smtp = Docnumber::findOrFail($id);
        $smtp->module_id = $request->get('module_id');
        $smtp->desc = $request->get('desc');
        $smtp->prefix = $request->get('prefix');
        $smtp->length_num = $request->get('length_num');
        $smtp->start_num = $request->get('start_num');
        $smtp->end_num = $request->get('end_num');
        $smtp->save();
        $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
         return redirect('/docnumber')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('name'));
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/docnumber')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
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
            $smtp = Docnumber::where('id',$id)->delete();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/docnumber')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/docnumber')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
    }
}
