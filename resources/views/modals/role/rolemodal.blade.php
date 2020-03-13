  <!-- Logout Modal-->
  <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog modal-w1200" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-title">จัดการกลุ่มผู้ใช้งานและสิทธิ์การใช้งานระบบ</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
    <form method="POST" id="modalCreateFrm">
    <input type="hidden" name="_method" id="_method">
        <input type="hidden" name="id" id="id">
            <div class="modal-body">
                @csrf 
                <div class="col-md-12">
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="role_name" class="col-md-4 col-form-label text-md-right">{{ __('Select Branch') }}</label>  <span class="text-danger">*</span>
                                    <div class="col-md-6"> 
                                        <select name="branch_id" id="branch_id" class="form-control" required>
                                            <option value="">Select</option>
                                            @foreach($data3 as $row)
                                            <option value="{{$row['id']}}"> {{$row['short_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="role_name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>  <span class="text-danger">*</span>
                            <div class="col-md-6"> 
                                <input id="role_name" type="text" class="form-control" name="role_name" required>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group row">
                              <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __(' Description') }}</label>  
                              <div class="col-md-8"> 
                                  <input id="desc" type="text" class="form-control" name="desc" >
                              </div>

                          </div>
                      </div>     
                  </div>

                  <div class="table-responsive">
                      <table class="table table-bordered table-hover table-sm " id="dataTable2">
                          <thead class="text-center bg-info text-white">
                              <tr>
                                      <th>Module</th>
                                      <th>Code</th>
                                      <th>Description</th>
                                      <th># Select All <input type="checkbox"  id="checkAll" class=""></th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach($data2 as $row)
                           <tr>              
                                      <td>{{$row->module_name}}</td>
                                      <td>{{$row->code}}</td>
                                      <td>{{$row->desc}}</td>
                                      <td class="text-center">
                                      <input type="checkbox" class="code" name="code[]" id="" value="{{$row->code}}">
                                      {{-- <a id="btn_edit" href="{{url('/role/edit')}}/{{$row['id']}}" class="btn btn-sm btn-outline-info btnedit"><span class="fas fa-search fa-fw"></a> --}}
                                          {{-- <a id="btn_delete" data-id="{{$row['id']}}" href="#" class="btn btn-outline-danger btn-sm btndelete"><span class="fas fa-trash fa-fw"></a> --}}
                                      </td>
                              </tr>
                              @endforeach
                           </tbody>
                      </table>
                  </div>
                            
                          
                </div> 
                {{-- End div colmd12 --}}
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
    
      <script>
     var table = $('#dataTable2').DataTable({
        // stateSave: true,
        "searching": false,
        "paging": false
     });
     $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
      </script>