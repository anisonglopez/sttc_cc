<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receive;
use App\Branch;
use App\Asset;
use App\Intype;
use App\Material;
use App\M_Stock;
use App\Receive_Detail;
use DB;
use Redirect,Response;
use App\Traits;
use DateTime;
use DataTables;

class ReceiveController extends Controller
{
    use Traits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('receive.index');
        //
    }
    public function getdata(Request $request)
    {
        $whereBranch = $this->getBranchId();
        return DataTables::of(Receive::query()
        ->select('receives.*','branches.short_name as b_name',
                            'intypes.name as in_name',
                            'materials.name as m_name','materials.m_no',
                            'receive__details.qty_in as q_in')
        ->leftJoin('materials', 'receives.id', '=', 'materials.id')
        ->leftJoin('receive__details', 'receives.id', '=', 'receive__details.id')
        ->Join('branches', 'receives.branch_id', '=', 'branches.id')
        ->Join('intypes', 'receives.type_id', '=', 'intypes.id')
        ->whereRaw('branches.id = '. $whereBranch)
        ->where('receives.trash', 0)
        ->whereBetween('receives.receive_date', [
            $request->get('startDate'),
            $request->get('endDate'),
        ])
        ->get())->make(true);
    
    }
    public function searchResult($querystring)
    {
        // dd($querystring);
        return view('receive.searchresult');
        //
    }
    public function getmaterial(Request $request)
    {
        $whereBranch = $this->getBranchId();
        $stmt = Material::query()
        ->select('materials.*', 'branches.short_name as branch_name','materialgroups.name as m_g_name','materials.id as material_id' , 'm__stocks.qty_balance')
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
                    <th>Asset Balance</th>
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
                    <td class="text-center">TEST</td>
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
        $smtp1 = Branch::query()
        ->select('*')
        -> where('trash', 0)
        ->whereRaw("branches.id = ". $whereBranch)
        ->get();
        $smtp2 = Intype::all()->where('trash', 0);
        return view('receive.create',[
            'data1' => $smtp1,
            'data2' => $smtp2,
        ]);
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
            
            $receive_date = DateTime::createFromFormat('d/m/Y', $request->get('receive_date'));
            // dd($receive_date)
            $receive_date = date("Y-m-d", strtotime($receive_date->format('Y-m-d') . '- 543 years'));
            $smtp = new Receive(
            [  
                'receive_no' => $request->get('receive_no'),
                'type_id' => $request->get('type_id'),
                'desc' => $request->get('desc'),
                'receive_date' => $receive_date,
                'receive_by' => $request->get('receive_by'),
                'branch_id' => $request->get('branch_id'),
                'receive_status' => 'new',
                'trash' => 0,
            ]);
            $smtp -> save();
            // dd($request);
            $lastid = $smtp->id;
            
            //  ----------- Stock Transaction ----------
            if($request->get('stock_transaction')):
                $i = 0;
                foreach ($request->get('m_id') as $row) :
                    $smtp_detail = new Receive_Detail(
                        [  
                            'receive_id' => $lastid,
                            'm_id' => $request->get('m_id')[$i],
                            'qty_in' => $request->get('qty_in')[$i],
                            'qty_balance_as' => $request->get('qty_balance_as')[$i],
                        ]);
                        // dd($smtp_detail);
                        $smtp_detail -> save();
                $i++;
                endforeach;
            endif;
            $lastids = $smtp->id;
            if($request->get('asset_transaction')):
                $i = 0;
                foreach ($request->get('a_id') as $row) :
                    $smtp_details = new receive_asset_detail(
                        [  
                            'receive_id' => $lastids,
                            'a_id' => $request->get('a_id')[$i],
                            'asset_status' => $request->get('asset_status')[$i],
                            'qty_balance_as' => $request->get('qty_balance_as')[$i],
                        ]);
                        dd($smtp_details);
                        $smtp_details -> save();
                $i++;
                endforeach;
            endif;
            //  ----------- Stock Transaction ----------
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/receive/'.$lastid.'/edit')->with('success', 'บันทึกข้อมูลสำเร็จ');
            }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/receive')->with('error', $e->getMessage());
                // dd($e->getMessage());
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
        $whereBranch = $this->getBranchId();
        $smtp = Receive::findOrFail($id);
        $smtp1 = Branch::query()
        ->select('*')
        -> where('trash', 0)
        ->whereRaw("branches.id = ". $whereBranch)
        ->get();
        $smtp2 = Intype::all()->where('trash', 0);
        $smtp3 = Receive_Detail::query()
        ->select('receive__details.*','materials.name as m_name','materials.m_no','materialgroups.name as mg_name')
        ->Join('materials','receive__details.m_id','=','materials.id')   
        ->Join('materialgroups','materials.m_g_id','=','materialgroups.id') 
        ->where('receive__details.receive_id',$id)
        ->get();
        // dd($smtp3);
        return view('receive.edit',[
            'data' => $smtp,
            'data1' => $smtp1,
            'data2' => $smtp2,
            'data3' => $smtp3,
        ]);
        try{
            $where = array('id' => $id);
            $smtp  = Receive::where($where)->first();
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
            $receive_status = $request->get('confirm') == 'confirm' ? 'confirm' : 'new';
            $receive_date = DateTime::createFromFormat('d/m/Y', $request->get('receive_date'));
            $receive_date = date("Y-m-d", strtotime($receive_date->format('Y-m-d') . '- 543 years'));
            $smtp = Receive::findOrFail($id);
            $smtp->receive_no = $request->get('receive_no');
            $smtp->type_id = $request->get('type_id');
            $smtp->desc = $request->get('desc');
            $smtp->receive_date = $receive_date;
            $smtp->receive_by = $request->get('receive_by');
            $smtp->branch_id =$request->get('branch_id') ;
            $smtp->receive_status = $receive_status;
            $smtp->save();
            //  ----------- Stock Transaction ----------
            if($request->get('stock_transaction')):
                $i = 0;
                $operator = '+';
                foreach ($request->get('m_id') as $row) :
                    $qty = $request->get('qty_in')[$i];
                    $m_id = $request->get('m_id')[$i];
                    $qty_balance_as = $request->get('qty_balance_as')[$i];
                        $smtp_detail = Receive_Detail::updateOrCreate(
                                ['id' => $request->get('_id')[$i]],
                                [
                                    'receive_id' => $id,
                                    'm_id' => $m_id,
                                    'qty_in' => $qty,
                                    'qty_balance_as' => $qty_balance_as,
                                ]);
                                // dd($smtp_detail);
                        $smtp_detail -> save();
                        if ($receive_status == 'confirm'):
                            $result = $this->StockTransaction($m_id, $qty, $operator);      
                        endif;
                        $i++;
                endforeach;    
            endif;
            //  ----------- Stock Transaction ----------
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
            return redirect('/receive/'.$id.'/edit')->with('success', 'ปรับปรุงข้อมูลสำเร็จ');
                }catch (\Exception $e) {
                    $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                    return redirect('/receive/'.$id.'/edit')->with('error', 'เกิดข้อผิดพลาดไม่สามารถบันทึกข้อมูลได้');
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
            $smtp = Receive::findOrFail($id);
            $smtp->trash = 1;
            $smtp->save();
            $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return redirect('/receive')->with('success', 'ลบข้อมูลสำเร็จ');
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return redirect('/receive')->with('error', 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้');
            }
    }
    public function deletedetail($id)
    {
        try{
            $smtp = Receive_Detail::findOrFail($id);
            $smtp->delete();
             $this->saveLog( 'OK', __FUNCTION__, app('request')->route()->getAction(), json_decode($smtp, true));
                return "OK";
             }catch (\Exception $e) {
                $this->saveLog( 'ERROR', __FUNCTION__, app('request')->route()->getAction(), $e->getMessage());
                return $e->getMessage();
            }
    }
}
