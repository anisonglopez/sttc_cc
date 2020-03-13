@extends('layout.template')

{{-- For  Content . Blade --}}
@section('content')
@include('components.alertbox')
    
       <!-- Default Card Example -->
<form method="POST" id="receive_frm" action="{{url('receive')}}/{{$data->id}}">

@csrf
    <input type="hidden" name="_method" value="PATCH"> 
    <input type="hidden" name="confirm" class="confirm" value="">
    <div class="card mb-4">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6 font-weight-bold">
              <h3>แก้ไขรายการรับเข้าระบบ</h3>
            </div>
            <div class="col-md-6 text-right">
              <a href="{{url('receive')}}"><button href="{{url('receive')}}" class="btn btn-danger" type="button" data-dismiss="modal">กลับ</button></a>
              <button type="submit" class="btn btn-success" id="btnsave"> {{ __('ปรับปรุง') }} </button>
              <button href="#"  class="btn btn-facebook" id="btnconfirm">ยืนยัน</button>
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
                                      <option value="{{$row->id}}"{{ $data->branch_id == $row->id ? 'selected' : '' }}> {{$row->short_name}}</option>
                                  @endforeach
                          </select>
                          </div>

                          <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('เลือกประเภทการรับเข้า') }}</label><label class="text-danger">*</label> 
                          <div class="col-md-3">
                          <select name="type_id" id="intype" class="form-control form-control-sm" required>
                              <option value="">Select</option>
                                  @foreach($data2 as $row)
                                      <option value="{{$row->id}}" {{ $data->type_id == $row->id ? 'selected' : '' }} > {{$row->name}}</option>
                                  @endforeach
                          </select>
                          </div>
                        </div>
                    </div>   

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('เลขที่รับเข้า') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3"> 
                            <input id="receive_no" type="text" class="form-control form-control-sm" name="receive_no" required value="{{$data->receive_no}}" readonly>
                            </div>
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('รับเข้าโดย') }}</label><label class="text-danger">*</label> 
                            <div class="col-md-3"> 
                                <input id="receive_by" type="text" class="form-control form-control-sm" name="receive_by" required value="{{$data->receive_by}}" readonly>
                            </div>
                        </div>
                    </div>    

                    <div class="col-md-12">
                      <div class="form-group row">
                          <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __('วันที่แจ้ง') }}</label><label class="text-danger">*</label>
                          <div class="col-md-3 "> 
                              <input id="receive_date" type="text" class="form-control form-control-sm" name="receive_date" autocomplete="off" required value="{{date("d/m/Y",strtotime($data->receive_date))}}">
                          </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __(' รายละเอียด') }}</label>  
                            <div class="col-md-8"> 
                                <textarea name="desc" id="desc" cols="30" rows="2" class="form-control form-control-sm">{{$data->desc}}</textarea>
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
              <button id="add_material_btn" href="#" class="btn btn-success btn-icon-split">
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
                                <table class="table table-bordered table-hover table-sm " id="MaterialdataTable">
                                    <thead class="text-center bg-gradient-info text-white">
                                        <tr>
                                            <th>รหัสวัสดุอุปกรณ์</th>
                                            <th>ประเภทวัสดุอุปกรณ์</th>
                                            <th>ชื่อวัสดุอุปกรณ์</th>
                                            <th>จำนวนรับ</th>
                                            <th>คงเหลือ</th>
                                            <th>#</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                       @foreach ($data3 as $item)
                                          <tr>
                                            <input type="hidden" class="stock_transaction" name="stock_transaction[]" value="in"/>
                                            <input type="hidden" name="_id[]" value="{{$item->id}}"/>
                                            <input type="hidden" name="m_id[]" value="{{$item->m_id}}"/>
                                            <td class="text-center">{{$item->m_no}}</td>
                                            <td class="text-center">{{$item->mg_name}}</td>
                                            <td class="text-center">{{$item->m_name}}</td>
                                            
                                            <td class="text-center">
                                            <input type="number"  class="qty_in form-control form-control-sm border border-success" name="qty_in[]" value="{{$item->qty_in}}" min="1" step="1" style="text-align:right;"/>
                                            </td>
                                            <td class="text-center">{{$item->qty_balance_as}} <input type="hidden" name="qty_balance_as[]" value="{{$item->qty_balance_as}}"/></td>
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
@include('receive.js.js')
<script>
    $('#btnconfirm').click(function () {
     let stock_transaction = $('.stock_transaction').val()
     if (stock_transaction == null){
         alert('กรุณาเพิ่มรายการ')
        return false;
     }
    event.preventDefault(); 
    var r = confirm("ยืนยันการรับเข้าระบบ");
     if (r == true) {
        $('.confirm').val("confirm")
        $('#receive_frm').submit()
    }
});
    let receive_status = '{{$data->receive_status}}'
    if (receive_status == 'confirm'){
        $("input").prop('disabled', true);
        $("select").prop('disabled', true);
        $("textarea").prop('disabled', true);
        $('#btnsave').prop('disabled', true);
        $('#btnconfirm').prop('disabled', true);
        $('#add_material_btn').prop('disabled', true);
        $('.tempbtndelete').prop('disabled', true);
    }
    console.log(receive_status)

    $('#receive_date').daterangepicker(DRP_singleEditOptions);

</script>

@endsection

{{-- For  Modal --}}
@section('modal')
@include('modals.stock.material_modal')
@endsection