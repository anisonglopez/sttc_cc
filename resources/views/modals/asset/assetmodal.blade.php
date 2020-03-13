  <!-- Logout Modal-->
  <div class="modal fade" id="AssetModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">เพิ่มข้อมูลประเภทวัสดุอุปกรณ์</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
<form method="POST" id="modalCreateFrm">
<input type="hidden" name="_method" id="_method">
    <input type="hidden" name="id" id="id">
        <div class="modal-body">
            <div class="col-md-12">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('สาขา') }}</label><label class="text-danger">*</label>
                                <div class="col-md-6">
                                <select name="branch_id" id="branch" required class="form-control">
                                    <option value="">Select</option>
                                        @foreach($data2 as $row)
                                            <option value="{{$row['id']}}"> {{$row['short_name']}}</option>
                                        @endforeach
                                </select>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Asset No.') }}</label>
                                    <div class="col-md-6">
                                        <input id="asset_no" type="text" class="form-control" name="asset_no"  readonly>
                                    </div>
                                </div>
                                </div>

                        <div class="col-md-12">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Asset Model') }}</label><label class="text-danger">*</label>
                            <div class="col-md-9">
                            <select name="a_m_id" id="a_m_id" required class="form-control">
                                <option value="">Select</option>
                                    @foreach($data1 as $row)
                                        <option value="{{$row['id']}}"> {{$row['name_th']}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        </div>
                        
           
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Serial No.') }}</label>
                            <div class="col-md-9">
                                <input id="serial_no" type="text" class="form-control" name="serial_no" >
                            </div>
                        </div>
                        </div>

                        <div class="col-md-12">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('เลขที่เอกสารอ้างอิง') }}</label>
                            <div class="col-md-9">
                                <input id="refer_doc" type="text" class="form-control" name="refer_doc" >
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-right">{{ __('Acqu Date') }}</label>  
                            <div class="col-md-6 "> 
                                <input id="searchdate" type="text" class="form-control form-control-sm" name="acqu_date" autocomplete="off"  disabled>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-right">{{ __('Deac Date') }}</label>  
                            <div class="col-md-6 "> 
                                <input id="searchdate1" type="text" class="form-control form-control-sm" name="deac_date" autocomplete="off" disabled>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('แผนกเจ้าของทรัพย์สิน') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <select name="owner_dep" id="dep" class="form-control" required>  
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('มูลค่าทรัพย์สิน') }}</label>
                                <div class="col-md-6">
                                    <input id="asset_value" type="number" class="form-control" name="asset_value" min="0" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Asset Status') }}</label><label class="text-danger">*</label>
                                <div class="col-md-6">
                                <select name="asset_status" id="asset_status" required class="form-control">
                                    <option value="">Select</option>
                                        @foreach($data4 as $row)
                                            <option value="{{$row['id']}}"> {{$row['name']}}</option>
                                        @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>  
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <button type="submit" class="btn btn-success" id="btnsave">
                                    {{ __('บันทึก') }}
          </button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
    $('#searchdate').daterangepicker({
        singleDatePicker: true,
        locale: {
            format: 'DD/MM/YYYY',
        }
    });
    $('#searchdate1').daterangepicker({
        singleDatePicker: true,
        locale: {
            format: 'DD/MM/YYYY',
        }
    });
    
    $('#branch').change(function () {
                $("#dep").empty();
                $("#dep").append('<option  value="">Select</option>');
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
                                            $("#dep").append('<option  value="">Select</option>');
                                            $.each(res,function(key,value){
                                                $("#dep").append('<option value="'+value["id"]+'">'+value["name_th"]+'</option>');
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
                                            $("#dep").append('<option  value="">Select</option>');
                                            $.each(res,function(key,value){
                                                $("#dep").append('<option value="'+value["id"]+'">'+value["name_th"]+'</option>');
                                            });
                                            $('#dep').val(dep_id);
                                        }
                                }
                    });
                }
         };
</script>
