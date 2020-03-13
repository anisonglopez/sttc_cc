  <!-- Logout Modal-->
  <div class="modal fade" id="EmployeeModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">ประเภทวัสดุ/อุปกรณ์</h5>
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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('หน่วยงาน') }}</label><label class="text-danger">*</label>
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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('แผนก') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <select name="dep_id" id="dep" class="form-control" >  
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ') }}</label><label class="text-danger">*</label>
                                <div class="col-md-6">
                                    <input id="f_name" type="text" class="form-control" name="f_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อเล่น') }}</label><label class="text-danger">*</label>
                                <div class="col-md-6">
                                    <input id="nickname" type="text" class="form-control" name="nickname" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('นามสกุล') }}</label><label class="text-danger">*</label>
                                <div class="col-md-6">
                                    <input id="l_name" type="text" class="form-control" name="l_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('รหัสพนักงาน') }}</label><label class="text-danger">*</label>
                                <div class="col-md-6">
                                    <input id="emp_code" type="text" class="form-control" name="emp_code" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('รายละเอียด') }}</label>
                                <div class="col-md-9">
                                    <input id="title" type="text" class="form-control" name="title">
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('หมายเหตุ') }}</label>
                                <div class="col-md-9">
                                    <input id="remark" type="text" class="form-control" name="remark">
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="status" class="col-md-7 col-form-label text-md-right">{{ __('ผู้ได้รับมอบหมาย/ผู้มอบหมาย ') }}</label>
                                <div class="col-md-3">
                                    <div class="material-switch mt-2 ml-1">
                                        <input id="status" name="status" type="checkbox" value="1"/>
                                        <label for="status" class="label-success"></label>
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
    $('#branch').change(function () {
                $("#dep").empty();
                $("#dep").append('<option>Select</option>');
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
                                            $("#dep").append('<option>Select</option>');
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
                                            $("#dep").append('<option>Select</option>');
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