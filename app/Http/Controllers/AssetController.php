<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Assetmodel;
use App\Branch;
use App\Checkinstatus;
use App\Department;
use App\Asset;
use Redirect,Response;
use App\Traits;
use DateTime;
use DataTables;


class AssetController extends Controller
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
        $smtp1 = Assetmodel::all()->where('trash', 0);
        $smtp2 = Branch::query()
        ->select('*')
        -> where('trash', 0)
        ->whereRaw("branches.id = ". $whereBranch)
        ->get();
        $smtp3 = Department::all()->where('trash', 0);
        $smtp4 = Checkinstatus::all()->where('trash', 0);
        return view('asset.index', [
            'data1' => $smtp1,
            'data2' => $smtp2,
            'data3' => $smtp3,
            'data4' => $smtp4,
            ]);
    }

    public function getdata(Request $request)
    {
        // dd($request);
        $whereBranch = $this->getBranchId();
        return Datatables::of(Asset::query()
        ->select('assets.*', 'assetmodels.name_th as a_name',
                             'branches.short_name as b_name',
                             'departments.name_th as d_name',
                             'checkinstatuses.name as c_name')
        ->Join('assetmodels', 'assets.a_m_id', '=', 'assetmodels.id')
        ->Join('branches', 'assets.branch_id', '=', 'branches.id')
        ->Join('departments', 'assets.owner_dep', '=', 'departments.id')
        ->Join('checkinstatuses', 'assets.asset_status', '=', 'checkinstatuses.id')
        ->where('assets.trash', 0)
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
        try{
            $acqu_date = DateTime::createFromFormat('d/m/Y', $request->get('acqu_date'));
            $deac_date = DateTime::createFromFormat('d/m/Y', $request->get('deac_date'));
            $asset_model =  AssetModel::where('id', $request->get('a_m_id'))->first();
            $asset_no =  Asset::where('a_m_id', $request->get('a_m_id'))->count();
            $asset_no += 1;
            $new_asset_no = $asset_model->asset_m_no.'-'.sprintf("%04d", $asset_no);
            $smtp = new Asset(
            [  
                'asset_status' => $request->get('asset_status'),
                'branch_id' => $request->get('branch_id'),
                'asset_no' => $new_asset_no,
                'a_m_id' => $request->get('a_m_id'),
                'serial_no' => $request->get('serial_no'),
                'refer_doc' => $request->get('refer_doc'),
                'acqu_date' => $acqu_date,
                'deac_date' => $deac_date,
                'asset_value' => $request->get('asset_value'),
                'owner_dep' => $request->get('owner_dep'),
                'trash' => 0,
            ]);
            $smtp -> save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/asset')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                dd($e);
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/asset')->with('error', $e->getMessage());
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
            $smtp  = Asset::where($where)->first();
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
        try{
            $acqu_date = DateTime::createFromFormat('d/m/Y', $request->get('acqu_date'));
            $deac_date = DateTime::createFromFormat('d/m/Y', $request->get('deac_date'));

            $smtp = Asset::findOrFail($id);
            if($smtp->a_m_id != $request->get('a_m_id')){
                $asset_model =  AssetModel::where('id', $request->get('a_m_id'))->first();
                $asset_no =  Asset::where('a_m_id', $request->get('a_m_id'))->count();
                $asset_no += 1;
                $new_asset_no = $asset_model->asset_m_no.'-'.sprintf("%04d", $asset_no);
                $smtp->asset_no = $new_asset_no;
            }
            $smtp->asset_status = $request->get('asset_status');
            $smtp->branch_id = $request->get('branch_id');
            $smtp->a_m_id = $request->get('a_m_id');
            $smtp->serial_no = $request->get('serial_no');
            $smtp->refer_doc = $request->get('refer_doc');
            $smtp->acqu_date = $acqu_date;
            $smtp->deac_date = $deac_date;
            $smtp->asset_value = $request->get('asset_value');
            $smtp->owner_dep = $request->get('owner_dep');
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
             return redirect('/asset')->with('success', 'ปรับปรุงข้อมูลสำเร็จ ' . $request->get('id'));
                }catch (\Exception $e) {
                    $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                    return redirect('/asset')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
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
            $smtp = Asset::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/asset')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/asset')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
    }
}
