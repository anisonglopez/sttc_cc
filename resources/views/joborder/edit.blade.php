@extends('layout.template')

{{-- For  Content . Blade --}}
@section('content')
@include('components.alertbox')
<nav class="navbar  topbar mb-4 static-top shadow nav-bar-custom">
</nav>
       <!-- Default Card Example -->

<form method="POST" id="joborder_frm" action="{{url('joborder')}}/{{$data->id}}">
    @csrf   
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="job_flg" class="job_flg" value="">
<div class="card mb-4">
<div id="accordion">
    <div class="card">
        <div class="card-header bg-white" id="headingOne">
          <div class="row">
            <div class="col-md-6">
                <a href="#" class="d-block text-gray-900 py-1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseSettings">
                    <div class="d-inline-block">     <h1>{{$data->job_no}} </h1>ชื่องาน: {{$data->job_title}} </div>
                  </a>
                 
            </div> 
            <div class="col-md-6 text-right">
                <br>
                <a href="{{url('joborder')}}"><button href="{{url('joborder')}}" class="btn btn-danger" type="button" data-dismiss="modal"><span class="fa fa-undo"></span> กลับ</button></a>
                <button type="submit" class="btn btn-success" id="btnsave"> {{ __('ปรับปรุง') }} </button>
                <button href="#"  class="btn btn-facebook" id="btnconfirm">ยืนยันการเบิก</button>
            </div>
            <div class="col-md-12">
                    <label for="">สถานะใบงาน</label>
                    <div class="row">  
                              @if($data->joborder_status == 'new')
                              <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary  py-2">
                                      <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$data->created_at}}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">กำลังดำเนินการ</div>
                                          </div>
                                          <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              @endif
                              @if($data->joborder_status == 'confirmout')
                              <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary  py-2">
                                      <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$data->created_at}} สร้างโดย: {{$data->created_by}}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">บันทึกใบงานแล้ว</div>
                                          </div>
                                          <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-primary  py-2">
                                          <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                              <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$data->created_at}}</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">ยืนยันการเบิก รอรับเข้า</div>
                                              </div>
                                              <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                              @endif
                              @if($data->joborder_status == 'confirmin')
                              <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary  py-2">
                                      <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$data->created_at}} สร้างโดย: {{$data->created_by}}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">บันทึกใบงานแล้ว</div>
                                          </div>
                                          <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-primary  py-2">
                                          <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                              <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$data->created_at}}</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">ยืนยันการเบิกแล้ว</div>
                                              </div>
                                              <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card border-left-primary  py-2">
                                              <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                  <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$data->created_at}}</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">ยืนยันการรับเข้าแล้ว</div>
                                                  </div>
                                                  <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                              @endif
                              
                             
                    </div>
            </div>
         
    
          </div>        
        </div>
        
                
      <!-- end card header -->
      <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-black py-2 collapse-inner rounded">
        <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('หน่วยงาน') }}</label><label class="text-danger">*</label> 
                        <div class="col-md-3">
                            {{-- {{dd($data)}} --}}
                        <select name="branch_id" id="branch" class="form-control form-control-sm" required  disabled>
                            <option value="">Select</option>
                            
                                @foreach($data5 as $row)
                                    <option value="{{$row->id}}"  {{ $data->branch_id == $row->id ? 'selected' : '' }}> {{$row->short_name}}</option>
                                @endforeach
                        </select>
                        </div>
                        <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('รหัสใบงาน') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3"> 
                                 <input id="job_no" type="text" class="form-control form-control-sm" name="job_no" required value="{{$data->job_no}}" disabled>
                              
                            </div>
                    </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12">
                            <div class="form-group row">
                    <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('ประเภทงาน') }}</label><label class="text-danger">*</label>
                    <div class="col-md-3">
                    <select name="job_type_id" id="job_type_id" required class="form-control form-control-sm" disabled>
                        <option value="">Select</option>
                            @foreach($data3 as $row)
                                <option value="{{$row->id}}" {{ $data->job_type_id == $row->id ? 'selected' : '' }}> {{$row->name}}</option>
                            @endforeach
                    </select>
                    </div>
                    <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('ระดับความสำคัญ') }}</label><label class="text-danger">*</label>
                    <div class="col-md-3">
                    <select name="priority_id" id="priority_id" required class="form-control form-control-sm" >
                        <option value="">Select</option>
                            @foreach($data6 as $row)
                                <option value="{{$row->id}}" {{ $data->priority_id == $row->id ? 'selected' : '' }}> {{$row->name}}</option>
                            @endforeach
                    </select>
                    </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('ชื่องาน') }}</label><label class="text-danger">*</label>
                                    <div class="col-md-8"> 
                                        <input id="job_title" type="text" class="form-control form-control-sm" name="job_title" required value="{{$data["job_title"]}}">
                                    </div>
                                  
                                </div>
                            </div>  

                            <div class="col-md-12">
                                    <div class="form-group row">
                                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เลขใบแจ้งซ่อม') }}</label>
                                            <div class="col-md-3"> 
                                                    <input id="ma_no" type="text" class="form-control form-control-sm" name="ma_no"  value="{{$data->ma_no}}">
                                            </div>
                                    </div>
                            </div>


                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('วันที่แจ้ง') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3 "> 
                                <input id="request_date" type="text" class="form-control form-control-sm" name="request_date" autocomplete="off" required value="{{date("d/m/Y",strtotime($data->request_date))}}"> 
                            </div>

                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เวลาที่แจ้ง') }}</label><label class="text-danger">*</label>  
                            <div class="form-group col-md-2">
                                <div class="input-group date" id="request_time" data-target-input="nearest">
                                    <input type="text" name="request_time" class="form-control form-control-sm datetimepicker-input" required data-target="#request_time"/ value="{{$data->request_time}}">
                                    <div class="input-group-append" data-target="#request_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                                 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('วันที่เริ่มงาน') }}</label>
                            <div class="col-md-3 "> 
                                <input id="schedule_start_date" type="text" class="form-control form-control-sm" name="schedule_start_date" autocomplete="off" required value="{{date("d/m/Y",strtotime($data->schedule_start_date))}}">
                            </div>

                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เวลาที่เริ่มงาน') }}</label>  
                            <div class="form-group col-md-2">
                                <div class="input-group date" id="schedule_start_time" data-target-input="nearest">
                                    <input type="text" name="schedule_start_time" class="form-control form-control-sm datetimepicker-input"  data-target="#schedule_start_time"/ value="{{$data->schedule_start_time}}">
                                    <div class="input-group-append" data-target="#schedule_start_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>  
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('วันที่จบงาน') }}</label>
                            <div class="col-md-3 "> 
                                <input id="schedule_end_date" type="text" class="form-control form-control-sm" name="schedule_end_date" autocomplete="off" required value="{{date("d/m/Y",strtotime($data->schedule_end_date))}}">
                            </div>

                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เวลาที่จบงาน') }}</label>
                            <div class="form-group col-md-2">
                                <div class="input-group date" id="schedule_end_time" data-target-input="nearest">
                                    <input type="text"name="schedule_end_time" class="schedule_end_time form-control form-control-sm datetimepicker-input"  data-target="#schedule_end_time" value="{{$data->schedule_end_time}}">
                                    <div class="input-group-append" data-target="#schedule_end_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>  

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('รายละเอียด') }}</label>  
                                <div class="col-md-8"> 
                                    <textarea name="desc" id="desc" cols="30" rows="3" class="form-control form-control-sm">{{$data["desc"]}}</textarea>
                                </div>
                            </div>
                        </div>     

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('ฝ่ายงานเจ้าของทรัพย์สิน') }}</label><label class="text-danger">*</label> 
                            <div class="col-md-3 input-group"> 
                                    {{-- <input id="asset_owner" type="text" class="form-control" name="asset_owner" value="{{$data["asset_owner"]}}">
                                    <div class="input-group-append">
                                        <a href="#" class="btn btn-outline-info"><span class="fa fa-search"></span></a>
                                    </div> --}}
                            {{-- {{dd($data->asset_owner_dep_id)}} --}}
                                    <select name="asset_owner_dep_id" id="asset_owner_dep_id" required class="form-control form-control-sm">  
                                        <option value="">Select</option>
                                    </select>
                            </div>
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('สถานที่') }}</label>  
                            <div class="col-md-3 input-group input-group-sm mb-3"> 
                                    {{-- <input id="location_name" type="text" class="form-control" name="location_name" value="{{$data["location_name"]}}">
                                    <div class="input-group-append">
                                        <a href="#" class="btn btn-outline-info"><span class="fa fa-search"></span></a>
                                    </div> --}}
                                    <input id="location_name" type="text" class="form-control form-control-sm" name="location_name" readonly value="{{$data->location_name}}">
                                    <div class="input-group-append">
                                        <button id="search_location_btn" href="#" class="btn btn-outline-info"><span class="fa fa-search"></span></button>
                                    </div>
                            </div>
                        </div>
                    </div>     

                  

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('ผู้แจ้ง') }}</label></label><label class="text-danger">*</label> 
                            <div class="col-md-3 input-group input-group-sm mb-3"> 
                                <input id="request_by" type="hidden" required class="form-control form-control-sm" name="request_by" value="{{$data->request_by}}" >
                                <input id="request_by_text" type="text" class="form-control form-control-sm" name="request_by_text" readonly value="{{$data->requester_name}}">
                                <div class="input-group-append">
                                    <button id="search_asset_owner_dep_id_btn" href="#" class="btn btn-outline-info"><span class="fa fa-search"></span></button>
                                </div>
                            </div>
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('ฝ่ายผู้แจ้ง') }}</label><label class="text-danger">*</label> 
                            <div class="col-md-3">
                                    <select name="request_dep_id" id="dep" required class="form-control form-control-sm" >  
                                    <option value="" >Select</option>
                                    </select>
                            </div>
                                </div>
                                </div>
                    <div class="col-md-12">
                            <div class="form-group row"> 
                                    <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เบอร์โทรติดต่อ') }}</label>  
                                    <div class="col-md-3 input-group"> 
                                            <input id="tel" type="text" class="form-control form-control-sm" name="tel" value="{{$data->tel}}">                                                   
                                    </div>
                            </div>
                        </div> 

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('ผู้ได้รับมอบหมาย') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3 input-group input-group-sm mb-3">
                            {{-- <select name="assign_as" id="assign_as" required class="form-control">
                                <option value="">Select</option>
                                    @foreach($data7 as $row)
                                        <option value="{{$row->id}}" {{ $data->assign_as == $row->id ? 'selected' : '' }}> {{$row->f_name}}</option>
                                    @endforeach
                            </select> --}}
                                <input id="assign_as" type="hidden" class="form-control form-control-sm" name="assign_as" value="{{$data->assign_as}}">
                                <input id="assign_as_text" type="text" class="form-control form-control-sm" name="assign_as_text" readonly value="{{$data->assignAs_name}}">
                                <div class="input-group-append">
                                    <button id="search_assign_as_btn" class="btn btn-outline-info"><span class="fa fa-search"></span></button>
                                </div>
                            </div>
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('ผู้มอบหมาย') }}</label><label class="text-danger">*</label>
                            {{-- <div class="col-md-3">
                            <select name="" id=""  class="form-control">
                                <option value="">Select</option>
                                    
                                        <option value=""></option>
                                    
                            </select>
                            </div> --}}
                            <div class="col-md-3 input-group input-group-sm mb-3">
                                <input id="assignee" type="hidden" class="form-control form-control-sm" name="assignee" value="{{$data->assignee}}">
                                <input id="assignee_text" type="text" class="form-control form-control-sm" name="assignee_text" readonly value="{{$data->assignee_name}}">
                                <div class="input-group-append">
                                    <button id="search_assignee_btn"  class="btn btn-outline-info"><span class="fa fa-search"></span></button>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12" id="job_status_div">
                        <div class="form-group row">
                      
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('ประเภทสถานะงาน') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3">
                            <select name="job_status_id" id="job_status_id" required class="form-control form-control-sm">
                                <option value="">Select</option>
                                    @foreach($data2 as $row)
                                        <option value="{{$row->id}}" {{ $data->job_status_id == $row->id ? 'selected' : '' }}> {{$row->name}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                            <div class="form-group row">
                                <label for="remark" class="col-md-2 col-form-label text-md-right">{{ __('หมายเหตุ') }}</label>  
                                <div class="col-md-8 input-group"> 
                                        <textarea name="remark" id="remark" cols="30" rows="3" class="form-control form-control-sm">{{$data->remark}}</textarea>                                         
                                </div>      
                        </div> 
                     </div>
                </div>
          </div>
      </div>
    </div>
</div> 
</div> 
</div>
      <!-- Default Card Example -->
<div class="card mb-4">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6 font-weight-bold text-primary">
                รายการวัสดุอุปกรณ์
            </div>
            <div class="col-md-6 text-right">
                     <button id="add_material_btn" class="btn btn-success btn-icon-split" >
                            <span class="icon text-white-50">
                              <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">เพิ่มวัสดุอุปกรณ์</span>
                     </button>
            </div>
          </div>        
        </div>
      
      <!-- end card header -->
        <div class="card-body">
                <div class="col-md-12">
                        <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm small  " id="MaterialdataTable">
                                    <thead class="text-center bg-gray-900 text-white">
                                        <tr>
                                            <th>รหัสวัสดุอุปกรณ์</th>
                                            <th>ประเภท</th>
                                            <th>ชื่อวัสดุอุปกรณ์</th>                   
                                            <th>จำนวนเบิกออกไปใช้</th>       
                                            @if($data->joborder_status == 'confirmout' || $data->joborder_status == 'confirmin' )
                                            <th>จำนวนรับคืน</th>       
                                            @endif
                                            <th>คงเหลือ ณ ปัจจุบัน</th>
                                            <th>เหตุผล</th>
                                            <th>#</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                     @foreach ($data8 as $item)
                                        <tr>
                                          <input type="hidden" class="stock_transaction" name="stock_transaction[]" value="out"/>
                                          <input type="hidden" name="_id[]" value="{{$item->id}}"/>
                                          <input type="hidden" name="m_id[]" value="{{$item->m_id}}"/>
                                          <td class="text-center">{{$item->m_no}}</td>
                                          <td class="text-center">{{$item->mg_name}}</td>
                                          <td class="text-center">{{$item->m_name}}</td>              
                                          <td class="text-center">
                                            <input type="number"  class="qty_out form-control form-control-sm border border-success" name="qty_out[]" value="{{$item->qty_out}}" min="1" max="{{$item->stock_balance_as}}" step="1" style="text-align:right;" required/>
                                          </td>
                                          @if($data->joborder_status == 'confirmout' || $data->joborder_status == 'confirmin' )
                                          <td class="text-center">
                                                <input type="number"  class="qty_in form-control form-control-sm border border-success" name="qty_in[]" value="{{$item->qty_in}}" min="1" max="{{$item->qty_out}}" step="1" style="text-align:right;" required/>
                                              </td>
                                          @endif
          
                                          <td class="text-center">{{$item->qty_balance_as}} <input type="hidden" name="stock_balance_as[]" value="{{$item->qty_balance_as}}"/></td>
                                          <td class="text-center">
                                            <input type="text"  class="reason form-control form-control-sm border border-success" name="reason[]" value="{{$item->reason}}"/>
                                            </td>
                                          <td class="text-center">
                                            <button data-id="{{$item->id}}" class="btn btn-outline-danger btn-sm tempbtndelete"><span class="fas fa-trash fa-fw"></span></button>
                                          </td>
                                        </tr> 
                                     @endforeach
                                     </tbody>
                                </table>
                        </div>
                        </div>
                
          </div>
      </div>
    </form>
       <!-- Default Card Example -->


@endsection
{{-- For Script Javascript --}}
@section('js')
@include('joborder.js.js')

<script>
    $(function () {
        $('#request_time').datetimepicker({
            format: 'HH:mm'
        });
        $('#schedule_start_time').datetimepicker({
            format: 'HH:mm'
        });
        $('#schedule_end_time').datetimepicker({
            format: 'HH:mm'
        });
    });
    $('#request_date').daterangepicker(DRP_singleOptions);
    $('#schedule_start_date').daterangepicker(DRP_singleOptions);
    $('#schedule_end_date').daterangepicker(DRP_singleOptions);
    $('#branch').change(function () {
        $("#dep").empty();
        $("#dep").append('<option value="">Select</option>');
        var _id = $(this).val();
        console.log(_id)
        if(_id){
            $.ajax({
                type:"get",
                url:"{{url('/get_dep_from_branch')}}/"+_id,
                success:function(res)
                {       
                console.log(res)
                    if(res)
                    {
                        $("#dep").empty();
                        $("#dep").append('<option value="">Select</option>');
                        $.each(res,function(key,value){
                            $("#dep").append('<option value="'+value["id"]+'">'+value["name_th"]+'</option>');
                        });
                        $("#asset_owner_dep_id").empty();
                        $("#asset_owner_dep_id").append('<option value="">Select</option>');
                        $.each(res,function(key,value){
                            $("#asset_owner_dep_id").append('<option value="'+value["id"]+'">'+value["name_th"]+'</option>');
                        });
                    }
                }
            });
        }
    });
    
    function branchSelected(_id, dep_id){
            if(_id){
                    $.ajax({
                                type:"get",
                                url:"{{url('/get_dep_from_branch')}}/"+_id,
                                success:function(res)
                                {       
                                    console.log(res)
                                        if(res)
                                        {
                                            $("#dep").empty();
                                            $("#dep").append('<option value="">Select</option>');
                                            $.each(res,function(key,value){
                                                $("#dep").append('<option value="'+value["id"]+'">'+value["name_th"]+'</option>');
                                            });
                                            $('#dep').val(dep_id);
                                        }
                                }
                    });
                }
          };

$(document).ready(function (){
    $.ajax({
                type:"get",
                url:"{{url('/get_dep_from_branch')}}/"+ $('#branch').val(),
                success:function(res)
                {       
                console.log(res)
                    if(res)
                    {
                        $("#dep").empty();
                        $("#dep").append('<option value="">Select</option>');
                        $.each(res,function(key,value){
                            
                            $("#dep").append('<option value="'+value["id"]+'">'+value["name_th"]+'</option>');
                        });
                        $("#asset_owner_dep_id").empty();
                        $("#asset_owner_dep_id").append('<option>Select</option>');
                        $.each(res,function(key,value){
                            $("#asset_owner_dep_id").append('<option value="'+value["id"]+'">'+value["name_th"]+'</option>');
                        });
                        getjoborder( {!! json_encode($data->id) !!});
                    }
                }
            });

            function getjoborder(id){
            $.ajax({
                type:"get",
                url:"{{url('/get_job_order')}}/"+ id,
                success:function(res)
                {       
                console.log(res)
                    if(res)
                    {
                        $('#dep').val(res[0].request_dep_id);
                        $('#asset_owner_dep_id').val(res[0].asset_owner_dep_id);
                    }
                }
            });
            }
});
var confirm_flg = 0;
$('#btnconfirm').click(function () {
     let stock_transaction = $('.stock_transaction').val()
     if (stock_transaction == null){
         alert('กรุณาเพิ่มรายการ')
        return false;
     }
     event.preventDefault(); 
    if (confirm_flg == 0){
            var r = confirm("ยืนยันการเบิก");
            if (r == true) {
                $('.job_flg').val("confirmout")
                $('#joborder_frm').submit()
            } 
    }else if(confirm_flg == 1){
    // $('#joborder_component_Modal').modal('show'); 
    // $('#joborder_component_Modal-title').html("กรุณาเลือกสถานะใบงาน");
    // var joborder_status = document.getElementById('job_status_div')
    // var wrap = document.createElement('div');
    // wrap.appendChild(joborder_status.cloneNode(true));
    // console.log(joborder_status)
    // $('#joborder_component_Modal-detail').html(
    //     joborder_status
    // );
            var r = confirm("ยืนยันการรับเข้า");
            if (r == true) {
                $('.job_flg').val("confirmin")
                $('#joborder_frm').submit()
            } 
    }
   
});
    let joborder_status = '{{$data->joborder_status}}'
    if (joborder_status == 'confirmout'){
        $('.job_flg').val("saveconfirm")
        // $("input").prop('disabled', true);
        // $("select").prop('disabled', true);
        // $("textarea").prop('disabled', false);
        // $('#btnsave').prop('disabled', true);
        confirm_flg = 1;
        $('#btnconfirm').text('ยืนยันการรับเข้า');
        $('#add_material_btn').prop('disabled', true);
        $('#job_title').prop('readonly', true);
        $('#ma_no').prop('readonly', true);
        $('#request_date').prop('readonly', true);
        $('#request_time').prop('readonly', true);

        // $('#search_location_btn').prop('disabled', true);
        // $('#search_assignee_btn').prop('disabled', true);
        // $('#search_assign_as_btn').prop('disabled', true);
        // $('#schedule_end_date').prop('disabled', false);
        // $('#job_status_id').prop('disabled', false);
        // $('.schedule_end_time').prop('disabled', false);
        $('.qty_out').prop('readonly', true);
        // $('.reason').prop('disabled', false);
        $('.tempbtndelete').prop('disabled', true);
    }
    if (joborder_status == 'confirmin'){
        $('.job_flg').val("save_affter_in")
        $('#btnconfirm').hide();
        $('#add_material_btn').prop('disabled', true);
        $('#job_title').prop('readonly', true);
        $('#ma_no').prop('readonly', true);
        $('#request_date').prop('readonly', true);
        $('#request_time').prop('readonly', true);
        $('.qty_out').prop('readonly', true);
        $('.tempbtndelete').prop('disabled', true);
        $('.qty_in').prop('readonly', true);
    }
    console.log(joborder_status)

    // $('#receive_date').daterangepicker(DRP_singleEditOptions);

</script>

@endsection

{{-- For  Modal --}}
@section('modal')
@include('modals.joborder.joborder_component_modal')
{{-- @include('modals.stock.material_modal') --}}
@endsection