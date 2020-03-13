@extends('layout.template')

{{-- For  Content . Blade --}}
@section('content')
    
       <!-- Default Card Example -->
<form method="POST" action="{{url('receive')}}">
@csrf 
<div class="card mb-4">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6 font-weight-bold ">
              <h3>สร้างรายการรับเข้าระบบ</h3>
            </div>
            <div class="col-md-6 text-right">
              <a href="{{url('receive')}}"><button  class="btn btn-facebook" type="button" data-dismiss="modal"><span class="fa fa-undo"></span> Back</button></a>
              <button type="submit" class="btn btn-success" id="btnsave"><span class="fa fa-w fa-save"></span> {{ __('Save') }} </button>
            </div>
          </div>        
        </div>
      
      <!-- end card header -->
        <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group row">
                          <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('หน่วยงาน') }}</label><label class="text-danger">*</label> 
                          <div class="col-md-3">
                          <select name="branch_id" id="branch" class="form-control form-control-sm" required>
                              <option value="">Select</option>
                                  @foreach($data1 as $row)
                                      <option value="{{$row['id']}}"> {{$row['short_name']}}</option>
                                  @endforeach
                          </select>
                          </div>

                          <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('เลือกประเภทการรับเข้า') }}</label><label class="text-danger">*</label> 
                          <div class="col-md-3">
                          <select name="type_id" id="intype" class="form-control form-control-sm" required>
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
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เลขที่รับเข้า') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3"> 
                                <input id="receive_no" type="text" class="form-control form-control-sm" name="receive_no" required readonly>
                            </div>
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('รับเข้าโดย') }}</label><label class="text-danger">*</label> 
                            <div class="col-md-3"> 
                            <input id="receive_by" type="text" class="form-control form-control-sm" name="receive_by" required value="{{Auth::user()->email}}" readonly>
                            </div>
                        </div>
                    </div>    

                    <div class="col-md-12">
                      <div class="form-group row">
                          <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('วันที่แจ้ง') }}</label><label class="text-danger">*</label>
                          <div class="col-md-3 "> 
                              <input id="receive_date" type="text" class="form-control form-control-sm" name="receive_date" autocomplete="off" required>
                          </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __(' รายละเอียด') }}</label>  
                            <div class="col-md-8"> 
                                <textarea name="desc" id="desc" cols="30" rows="2" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>
                    </div>                    
                </div>
              {{-- <div class="modal-footer">
                <a href="{{url('receive')}}"><button href="{{url('receive')}}" class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button></a>
                <button type="submit" class="btn btn-success" id="btnsave"> {{ __('Save') }} </button>
              </div> --}}
          </div>
      </div>

      <!-- Default Card Example -->
<div class="card mb-4">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6 font-weight-bold text-primary">
                    รายการรับวัสดุอุปกรณ์เข้าระบบ
            </div>
            <div class="col-md-6 text-right">
                     <a  id="add_material_btn" href="#" class="btn btn-outline-danger btn-icon-split">
                            <span class="icon text-black-50">
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
                                <table class="table table-bordered  table-sm " id="MaterialdataTable">
                                    <thead class="text-center bg-gradient-info text-white">
                                        <tr>
                                            <th>รหัสวัสดุอุปกรณ์</th>
                                            <th>ประเภทวัสดุอุปกรณ์</th>
                                            <th>ชื่อวัสดุอุปกรณ์</th>
                                            <th>จำนวนรับ</th>
                                            <th>คงเหลือ ณ ปัจจุบัน</th>
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
                รายการรับทรัพย์สิน
            </div>
            <div class="col-md-6 text-right">
                     <a id="add_asset_btn" href="#" class="btn btn-outline-danger btn-icon-split">
                            <span class="icon text-black-50">
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
                                <table class="table table-bordered table-hover table-sm " id="AssetdataTable">
                                    <thead class="text-center bg-gradient-info text-white">
                                        <tr>
                                            <th>สาขา</th>
                                            <th>เจ้าของทรัพย์สิน</th>
                                            <th>สถานะทรัพย์สิน</th>
                                            <th>รหัสทรัพย์สิน</th>
                                            <th>โมเดลทรพย์สิน</th>
                                            <th>เลขซีเรียล</th>
                                            <th>คงเหลือ</th>
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
@include('receive.js.js')
<script>
    $('#receive_date').daterangepicker(DRP_singleOptions);
    
</script>

@endsection

{{-- For  Modal --}}
@section('modal')
@include('modals.stock.material_modal')
@endsection