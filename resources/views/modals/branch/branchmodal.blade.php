  <!-- Logout Modal-->
  <div class="modal fade" id="BranchModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-w1200" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">เพิ่มข้อมูลสาขา</h5>
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
                    {{-- START DATA 2 3 --}}
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Company No.') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                            <select name="com_id" id="com_id" required class="form-control">
                                <option value="">Select</option>
                                    @foreach($data2 as $row)
                                        <option value="{{$row['id']}}"> {{$row['name_th']}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Business No.') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                            <select name="bu_id" id="bu_id" required class="form-control">
                                <option value="">Select</option>
                                    @foreach($data3 as $row)
                                        <option value="{{$row['id']}}"> {{$row['name']}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Branch No.') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="branch_no" type="text" class="form-control" name="branch_no" required>
                            </div>
                        </div>
                        </div>    
                        
                        <div class="col-md-6">  
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Short Name') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="short_name" type="text" class="form-control" name="short_name" required>
                            </div>
                        </div>
                        </div>  
                    </div>
                    {{-- END DATA --}}

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Name TH') }}</label><label class="text-danger">*</label>
                            <div class="col-md-9">
                                <input id="name_th" type="text" class="form-control" name="name_th" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Name EN') }}</label><label class="text-danger">*</label>
                            <div class="col-md-9">
                                <input id="name_en" type="text" class="form-control" name="name_en" required>
                            </div>
                        </div>
                    
                    <div class="row">
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Fax') }}</label>
                                <div class="col-md-6">
                                    <input id="fax" type="text" class="form-control" name="fax">
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-8">
                                    <input id="email" type="text" class="form-control" name="email">
                                </div>
                            </div>
                            </div>
                        
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Tel.') }}</label>
                                <div class="col-md-6">
                                    <input id="tel" type="text" class="form-control" name="tel">
                                </div>
                            </div>
                            </div>
                    </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Addess TH') }}</label>
                                <div class="col-md-9">
                                    <input id="add_th" type="text" class="form-control" name="add_th">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Addess EN') }}</label>
                                <div class="col-md-9">
                                    <input id="add_en" type="text" class="form-control" name="add_en">
                                </div>
                            </div>
                            {{-- Department in Branch --}}
                            <div class="form-group row">
                                    <label for="user_type" class="col-md-2 col-form-label text-md-right">{{ __('Select Department') }}</label>
                                    <div class="col-md-3 input-group">
                                    <select name="selectTag" id="selectTag" class="form-control" >  
                                        <option value="">Select</option>
                                        @foreach($data4 as $row)
                                            <option value="{{$row['id']}}"> {{$row['name_th']}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                            <a href="#" class="btn btn-success" id="addrole"><span class="fa fa-plus"></span></a>
                                    </div>                            
                                    </div>
                            </div> 

                            <div class="form-group row">
                                    <label for="status" class="col-md-2 col-form-label text-md-right">{{ __('Department List') }}</label>
                                    <div class="col-md-8">
                                            <label id="addTagsResult" class="addTagsResult"></label>
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

  <script>
      $('#addrole').click(function () {
        event.preventDefault();
            var e = document.getElementById("selectTag");
            var indexRole = e.options[e.selectedIndex].value;
            var strRole = e.options[e.selectedIndex].text;
            if(indexRole != ''){
            document.getElementById('addTagsResult').innerHTML += '<a href="#" id="roletag" class="roletagdelete"> ' +
            '<span class="badge badge-success mr-2">' +strRole+' <span class="fa fa-w fa-times"></span></span>'+
            '<input type="hidden" name="dep_id[]" value="'+indexRole+'"></input>' +  '</a>';
                $('.roletagdelete').click(function () {
                        event.preventDefault();
                        $(this).remove();
                })
            }
     });
  </script>