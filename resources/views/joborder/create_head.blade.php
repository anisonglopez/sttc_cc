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
                <h3>สร้างใบงาน - Basic Information</h3> 
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
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('สาขา') }}</label><label class="text-danger">*</label> 
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
                    {{-- <div class="col-md-12">
                    <div class="form-group row">
                    

                    
                </div> --}}
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
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เลขใบแจ้งซ่อม') }}</label><label class="text-danger">*</label> 
                            <div class="col-md-3"> 
                                <input id="ma_no" type="text" class="form-control form-control-sm" name="ma_no" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เบอร์โทรติดต่อ') }}</label>  
                            <div class="col-md-3 input-group"> 
                                    <input id="tel" type="text" class="form-control form-control-sm" name="tel" >                                                   
                            </div>      
                        </div> 
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
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('รายละเอียด') }}</label>  
                            <div class="col-md-8"> 
                                <textarea name="desc" id="desc" cols="30" rows="3" class="form-control form-control-sm"></textarea>
                            </div>
                        </div> 
                    </div>  
                    
                   
                {{-- <div class="modal-footer">
                    <a href="{{url('joborder')}}"><button href="{{url('joborder')}}" class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button></a>
                    <button type="submit" class="btn btn-success" id="btnsave"> {{ __('Save') }} </button>
                </div> --}}
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