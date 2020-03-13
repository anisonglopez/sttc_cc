@extends('layout.template')
{{-- For  Content . Blade --}}
@section('content')
@include('components.alertbox')
       <!-- Default Card Example -->
<form method="POST" action="{{url('joborder')}}">
@csrf
    <div class="card mb-4">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6 font-weight-bold">
                <h3>สร้างใบงาน</h3> 
            </div>
            
            <div class="col-md-6 text-right">
                    <a href="{{url('joborder')}}"><button href="{{url('joborder')}}" class="btn btn-facebook" type="button" data-dismiss="modal"><span class="fa fa-undo"></span> กลับ</button></a>
                    <button type="submit" class="btn btn-success" id="btnsave"><span class="fa fa-save"></span> {{ __('Save') }} </button>
            </div>
          </div>        
        </div>
      
      <!-- end card header -->
        <div class="card-body">
                <div class="row" class="h-25 d-inline-block" >
                    <div class="col-sm-12">
                    <div class="form-group row">
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('หน่วยงาน') }}</label><label class="text-danger">*</label> 
                        <div class="col-md-3">
                        <select name="branch_id" id="branch" class="form-control form-control-sm" required>
                            <option value="">Select</option>
                                @foreach($data5 as $row)
                                    <option value="{{$row['id']}}"> {{$row['short_name']}}</option>
                                @endforeach
                        </select>
                        </div>
                        <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('รหัสใบงาน') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3"> 
                                <input id="job_no" type="text" class="form-control form-control-sm" name="job_no" required  disabled>
                            </div>
                    </div>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group row">
                    <label  class="col-md-2 col-form-label text-md-right">{{ __('ประเภทงาน') }}</label><label class="text-danger">*</label>
                    <div class="col-md-3">
                    <select name="job_type_id" id="job_type_id" required class="form-control form-control-sm">
                        <option value="">Select</option>
                            @foreach($data3 as $row)
                                <option value="{{$row['id']}}"> {{$row['name']}}</option>
                            @endforeach
                    </select>
                    </div>

                    <label  class="col-md-2 col-form-label text-md-right">{{ __('ระดับความสำคัญ') }}</label><label class="text-danger">*</label>
                    <div class="col-md-3">
                    <select name="priority_id" id="priority_id" required class="form-control form-control-sm">
                        <option value="">Select</option>
                            @foreach($data6 as $row)
                                <option value="{{$row['id']}}"> {{$row['name']}}</option>
                            @endforeach
                    </select>
                    </div>
                </div>
                </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('ชื่องาน') }}</label><label class="text-danger">*</label>
                            <div class="col-md-8"> 
                                <input id="job_title" type="text" class="form-control form-control-sm" name="job_title" required>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เลขใบแจ้งซ่อม') }}</label>
                            <div class="col-md-3"> 
                                <input id="ma_no" type="text" class="form-control form-control-sm" name="ma_no">
                            </div>
                        </div>
                    </div>     

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('วันที่แจ้ง') }}</label><label class="text-danger">*</label> 
                            <div class="col-md-3 "> 
                                <input id="request_date" type="text" class="form-control form-control-sm" name="request_date" autocomplete="off" required>
                            </div>
                            
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เวลาที่แจ้ง') }}</label> <label class="text-danger">*</label> 
                            <div class="form-group col-md-2">
                                <div class="input-group date" id="request_time" data-target-input="nearest">
                                    <input type="text" name="request_time" class="form-control form-control-sm datetimepicker-input" data-target="#request_time" required/>
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
                                <input id="schedule_start_date" type="text" class="form-control form-control-sm" name="schedule_start_date" autocomplete="off" >
                            </div>

                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เวลาที่เริ่มงาน') }}</label> 
                            <div class="form-group col-md-2">
                                <div class="input-group date" id="schedule_start_time" data-target-input="nearest">
                                    <input type="text" name="schedule_start_time" class="form-control form-control-sm datetimepicker-input" data-target="#schedule_start_time"/>
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
                                <input id="schedule_end_date" type="text" class="form-control form-control-sm" name="schedule_end_date" autocomplete="off" >
                            </div>

                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เวลาที่จบงาน') }}</label> 
                            <div class="form-group col-md-2">
                                <div class="input-group date" id="schedule_end_time" data-target-input="nearest">
                                    <input type="text" name="schedule_end_time" class="form-control form-control-sm datetimepicker-input" data-target="#schedule_end_time"/>
                                    <div class="input-group-append" data-target="#schedule_end_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                            <div class="form-group row">
                                <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('รายละเอียด') }}</label>  
                                <div class="col-md-8"> 
                                    <textarea name="desc" id="desc" cols="30" rows="3" class="form-control form-control-sm"></textarea>
                                </div>
                            </div>
                        </div>     

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('ฝ่ายงานเจ้าของทรัพย์สิน') }}</label><label class="text-danger">*</label> 
                            <div class="col-md-3 input-group">
                                {{-- <input id="asset_owner_dep_id" type="text" class="form-control" name="asset_owner_dep_id" > --}}
                                {{-- <div class="input-group-append">
                                    <a id="search_asset_owner_dep_id_btn" href="#" class="btn btn-outline-info"><span class="fa fa-search"></span></a>
                                </div> --}}
                                    <select name="asset_owner_dep_id" id="asset_owner_dep_id" required class="form-control form-control-sm" >  
                                        <option value="">Select</option>
                                    </select>
                            </div>
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('สถานที่') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3 input-group input-group-sm mb-3"> 
                                    <input id="location_name" type="text" class="form-control form-control-sm readonly" name="location_name" required>
                                    <div class="input-group-append">
                                        <a id="search_location_btn" href="#" class="btn btn-outline-info"><span class="fa fa-search"></span></a>
                                    </div>
                            </div>
                        </div>
                    </div>     

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('ผู้แจ้ง') }}</label></label><label class="text-danger">*</label> 
                            <div class="col-md-3 input-group input-group-sm mb-3"> 
                                    <input id="request_by" type="hidden" required class="form-control form-control-sm" name="request_by" >
                                    <input id="request_by_text" type="text" class="form-control form-control-sm readonly" name="request_by_text" required autocomplete="off">
                                    <div class="input-group-append">
                                        <a id="search_asset_owner_dep_id_btn" href="#" class="btn btn-outline-info"><span class="fa fa-search"></span></a>
                                    </div>
                            </div>
                            <label  class="col-md-2 col-form-label text-md-right">{{ __('ฝ่ายผู้แจ้ง') }}</label><label class="text-danger">*</label> 
                            <div class="col-md-3">
                                    <select name="request_dep_id" id="dep" required class="form-control form-control-sm"  >  
                                        <option value="">Select</option>
                                    </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                            <div class="form-group row">
                                <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เบอร์โทรติดต่อ') }}</label>  
                                <div class="col-md-3 input-group"> 
                                        <input id="tel" type="text" class="form-control form-control-sm" name="tel" >                                                   
                                </div>      
                            </div> 
                     </div>
                

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label  class="col-md-2 col-form-label text-md-right">{{ __('ผู้ได้รับมอบหมาย') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3 input-group input-group-sm mb-3">
                                <input id="assign_as" type="hidden" class="form-control form-control-sm" name="assign_as" >
                                <input id="assign_as_text" type="text" class="form-control form-control-sm readonly" name="assign_as_text"  required autocomplete="off">
                                <div class="input-group-append">
                                    <a id="search_assign_as_btn" href="#" class="btn btn-outline-info"><span class="fa fa-search"></span></a>
                                </div>
                                {{-- <select name="assign_as" id="assign_as" required class="form-control">
                                <option value="">Select</option>
                                    @foreach($data7 as $row)
                                        <option value="{{$row['id']}}"> {{$row['f_name']}}</option>
                                    @endforeach
                            </select> --}}
                            </div>
                            <label  class="col-md-2 col-form-label text-md-right">{{ __('ผู้มอบหมาย') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3 input-group input-group-sm mb-3">
                                <input id="assignee" type="hidden" class="form-control form-control-sm" name="assignee" >
                                <input id="assignee_text" type="text" class="form-control form-control-sm readonly" name="assignee_text" required autocomplete="off">
                                <div class="input-group-append ">
                                    <a id="search_assignee_btn" href="#" class="btn btn-outline-info btn-sm" ><span class="fa fa-search"></span></a>
                                </div>
                            {{-- <select name="" id=""  class="form-control">
                                <option value="">Select</option>
                                    
                                        <option value=""></option>
                                    
                            </select> --}}
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group row">
                          
                            <label  class="col-md-2 col-form-label text-md-right">{{ __('ประเภทสถานะงาน') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3">
                            <select name="job_status_id" id="job_status_id" required class="form-control form-control-sm">
                                <option value="">Select</option>
                                    @foreach($data2 as $row)
                                        <option value="{{$row['id']}}"> {{$row['name']}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                            <div class="form-group row">
                                <label for="remark" class="col-md-2 col-form-label text-md-right">{{ __('หมายเหตุ') }}</label>  
                                <div class="col-md-8 input-group"> 
                                        <textarea name="remark" id="remark" cols="30" rows="3" class="form-control form-control-sm"></textarea>                                         
                                </div>      
                        </div> 
                     </div>

                </div>
                {{-- <div class="modal-footer">
                    <a href="{{url('joborder')}}"><button href="{{url('joborder')}}" class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button></a>
                    <button type="submit" class="btn btn-success" id="btnsave"> {{ __('Save') }} </button>
                </div> --}}
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
                     <a id="add_material_btn" href="#" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">เพิ่มวัสดุอุปกรณ์</span>
                     </a>
            </div>
          </div>        
        </div>
      <!-- end card header -->
        <div class="card-body">
                <div class="col-md-12">
                        <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm small " id="MaterialdataTable">
                                    <thead class="text-center bg-gray-900 text-white">
                                        <tr>
                                            <th>รหัสวัสดุอุปกรณ์</th>
                                            <th>ประเภท</th>
                                            <th>ชื่อวัสดุอุปกรณ์</th>
                                            <th>จำนวนเบิกออกไปใช้</th>
                                            <th>คงเหลือ ณ ปัจจุบัน</th>
                                            <th>เหตุผล</th>
                                            <th>#</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                         
                                     </tbody>
                                </table>
                        </div>
                        </div>
                
          </div>
      </div>
      <div class="card mb-4">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6 font-weight-bold text-primary">
                รายการเครื่องมือ
            </div>
            <div class="col-md-6 text-right">
                     <a id="add_asset_btn" href="#" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">เพิ่มทรัพย์สิน</span>
                     </a>
            </div>
          </div>        
        </div>
      
      <!-- end card header -->
        <div class="card-body">
                <div class="col-md-12">
                        <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm small" id="AssetdataTable">
                                    <thead class="text-center bg-gray-900 text-white">
                                        <tr>
                                            <th>รหัสทรัพย์สิน</th>
                                            <th>รุ่นทรัพย์สิน</th>
                                            <th>สถานะทรัพย์สิน</th>
                                            <th>เลขซีเรียล</th>
                                            <th>#</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                         
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
{{-- <script src="{{asset('js/joborder/joborder.js')}}"></script> --}}
<script type="text/javascript">
 $(".readonly").on('keydown paste', function(e){
        e.preventDefault();
    });
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
</script>
@endsection
{{-- For  Modal --}}
@section('modal')
@include('modals.joborder.joborder_component_modal')
{{-- @include('modals.stock.material_modal') --}}
@endsection