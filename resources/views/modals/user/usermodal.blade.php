  <!-- Logout Modal-->
  <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-w1200" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title"> </h5>
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
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('ชื่อผู้ใช้งานระบบ') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3">
                                <input id="email" type="text" class="form-control " name="email" value="" required autocomplete="email">
                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                                <span id="lbl_checkEmail"></span>
                            </div>
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3">
                                <input id="email_real" type="email" class="form-control @error('email') is-invalid @enderror" name="email_real" value="{{ old('email_real') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span id="lbl_checkEmail"></span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label><label class="text-danger" id="lbl_pass"></label>
                            <div class="col-md-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่านอีกครั้ง') }}</label><label class="text-danger" id="lbl_passconfirm"></label>
                            <div class="col-md-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                <div id="validate_pass" class="text-danger"></div>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                                {{-- <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('เลือกบริษัท') }}</label><label class="text-danger">*</label>
                                <div class="col-md-3">
                                        <select name="company" id="company" class="form-control" >  
                                                <option value="">Select</option>
                                                @foreach($data3 as $row)
                                                    <option value="{{$row['id']}}"> {{$row['name_th']}}</option>
                                                @endforeach
                                            </select>
                                </div> --}}
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('เลือกสาขา') }}</label><label class="text-danger">*</label>
                                <div class="col-md-3">
                                        <select name="branch" id="branch" class="form-control" required>  
                                                <option value="">Select</option>
                                                @foreach($data3 as $row)
                                                <option value="{{$row->id}}"> {{$row->short_name}}</option>
                                            @endforeach
                                            </select>
                                </div>
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('แผนก') }}</label><label class="text-danger">*</label>
                                <div class="col-md-3">
                                        <select name="dep" id="dep" class="form-control" required>  
                                                <option value="">Select</option>
                                            </select>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('ชื่อจริง') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"  >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('นามสกุล') }}</label><label class="text-danger">*</label>
                            <div class="col-md-3">
                                <input id="lname" type="text" class="form-control" name="lname" value=""  required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('เบอร์โทรติดต่อ') }}</label>
                            <div class="col-md-3">
                                <input id="tel" type="text" class="form-control" name="tel">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="status" class="col-md-2 col-form-label text-md-right">{{ __('สถานะ') }}</label>
                            <div class="col-md-3">
                                <div class="material-switch mt-2 ml-1">
                                    <input id="status" name="status" type="checkbox" value="1"/>
                                    <label for="status" class="label-success"></label>
                                </div>
                            </div>
                        </div> 

                    

                            <div class="form-group row">
                                    <label for="user_type" class="col-md-2 col-form-label text-md-right">{{ __('เลือกกลุ่มผู้ใช้งานระบบ') }}</label>
                                    <div class="col-md-3 input-group">
                                    <select name="user_type" id="user_type" class="form-control"  >  
                                        <option value="">Select</option>
                                        @foreach($data2 as $row)
                                            <option value="{{$row['id']}}"> {{$row['role_name']}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                            <a href="#" class="btn btn-success" id="addrole"><span class="fa fa-plus"></span></a>
                                    </div>
                                    </div>
                            </div> 

                            <div class="form-group row">
                                    <label for="status" class="col-md-2 col-form-label text-md-right">{{ __('กลุ่มผู้ใช้งานระบบ') }}</label>
                                    <div class="col-md-8">
                                            <label id="addTagsResult" class="addTagsResult"></label>
                                        {{-- <input type="text" name="" id="addTagsResult"> --}}
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
          //  Check Password map
$( "#modalCreateFrm" ).submit(function( event ) {
   var password =  document.getElementById('password').value;
   console.log(password)
   var passwordconfirm =   document.getElementById('password-confirm').value;
   if (password != null){
       if(password != passwordconfirm ){
        $('#validate_pass').text('รหัสผ่านไม่เข้ากัน กรุณาระบุใหม่อีกครั้ง');
        return false;
        event.preventDefault();
       }
   }

});

$('#email').change(function( event ) {
    var email = document.getElementById('email').value;
    $.ajax({
    type: "POST",
    url: '/checkemail/' + email, // This is what I have updated
    data: { email: email ,
        _token: "<?php echo csrf_token(); ?>"}
}).done(function( data ) {
    if(data.id != null){
        console.log(data)
        document.getElementById('lbl_checkEmail').innerHTML = '<span class="text-danger">ไม่สามารถใช้งาน Username นี้ได้ เนื่องจากมีข้อมูลอยู่แล้วในระบบ</span>';
        document.getElementById('btnsave').disabled = true;
    }else{
        document.getElementById('lbl_checkEmail').innerHTML = '<span class="text-success">สามารถใช้งาน Username นี้ได้</span>';
        document.getElementById('btnsave').disabled = false;
    }
});
});

    $('#addrole').click(function () {
        event.preventDefault();
            var e = document.getElementById("user_type");
            var indexRole = e.options[e.selectedIndex].value;
            var strRole = e.options[e.selectedIndex].text;
            if(indexRole != ''){
            document.getElementById('addTagsResult').innerHTML += '<a href="#" id="roletag" class="roletagdelete"> ' +
            '<span class="badge badge-success mr-2">' +strRole+' <span class="fa fa-w fa-times"></span></span>'+
            '<input type="hidden" name="roles[]" value="'+indexRole+'"></input>' +  '</a>';
                $('.roletagdelete').click(function () {
                        event.preventDefault();
                        $(this).remove();
                })
            }
     });

        //  $('#company').change(function () {
        //         var _id = $(this).val();
        //         $("#dep").empty();
        //         $("#branch").empty();
        //         $("#branch").append('<option>Select</option>');
        //         $("#dep").append('<option>Select</option>');
        //         if(_id){
        //             $.ajax({
        //                         type:"get",
        //                         url:"{{url('/get_branch_from_com')}}/"+_id,
        //                         success:function(res)
        //                         {       
        //                             console.log(res)
        //                                 if(res)
        //                                 {
        //                                     $("#branch").empty();
        //                                     $("#branch").append('<option>Select</option>');
        //                                     $.each(res,function(key,value){
        //                                         $("#branch").append('<option value="'+value["id"]+'">'+value["name_th"]+'</option>');
        //                                     });
        //                                 }
        //                         }
        //             });
        //         }
        //  });

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
</script>