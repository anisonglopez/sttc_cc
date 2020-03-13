<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Module;
use App\Traits;
use DB;
use Redirect,Response;
use DataTables;

class MenuController extends Controller
{
    use Traits; // for Save logs
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // try{
        // $smtp =  DB::table('menus')
        // ->select('menus.*', 'modules.module_name')
        // ->Join('modules', 'menus.module_id', '=', 'modules.id')
        // ->where('menus.trash', 0)
        // ->get();
        $smtp2 = Module::all()->where('trash', 0);
        return view('menu.index', [
            // 'data' => $smtp,
            'data2' => $smtp2,
            ]);
        // }catch (\Exception $e) {
        //     $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
        // }
    }
    public function getdata(Request $request)
    {
        // dd($request);
        return Datatables::of(Menu::query()
        ->select('menus.*', 'modules.module_name')
        ->Join('modules', 'menus.module_id', '=', 'modules.id')
        ->where('menus.trash', 0)
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
            $smtp = new Menu(
            [  
                'module_id' => $request->get('module_id'),
                'code' => $request->get('code'),
                'desc' => $request->get('desc'),
                'trash' => 0,
            ]);
            $smtp -> save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/menu')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/menu')->with('error', $e->getMessage());
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
        //
        $where = array('id' => $id);
        $smtp  = Menu::where($where)->first();
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
            $smtp = Menu::findOrFail($id);
            $smtp->module_id = $request->get('module_id');
            $smtp->code = $request->get('code');
            $smtp->desc = $request->get('desc');
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/menu')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('name'));
                }catch (\Exception $e) {
                    $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                    return redirect('/menu')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
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
            $smtp = Menu::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/menu')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/menu')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
        //
    }
}
