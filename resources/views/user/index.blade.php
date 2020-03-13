@extends('layout.template')
@section('content')
@include('components.alertbox')

    <h3>จัดการข้อมูลผู้ใช้งาน</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
        @if (in_array( 'user.create', $Permissions))
            <a href="#"  class="btn btn-facebook" id="create">Create</a>
        @endif
      </div>
    </div>        
  </div>

<!-- end card header -->
  <div class="card-body">
    <div class="col-md-12">
    <div class="table-responsive">
        {{-- {{Auth::user()->isAdmin()}} --}}
        {{-- @if($user->status =='waiting') @endif --}}
            <table class="table table-bordered table-hover table-sm " id="dataTable">
                <thead class="text-center">
                    <tr>
                            <th>หน่วยงาน</th>
                            <th>Username</th>
                            <th>ชื่อจริง</th>
                            <th>นามสกุล</th>
                            <th>แผนก</th>
                            <th>อีเมล</th>
                            <th>สิทธิ์การใช้งานระบบ</th>
                            <th>สถานะ</th>
                            <th>#</th>
                    </tr>
                 </thead>
                 <tbody class="small"></tbody>
            </table>
    </div>
    </div>
    </div>
</div>

@endsection

@section('js')
<script>
 $('.roletagdelete').click(function () {
                        event.preventDefault();
                        $(this).remove();
        })
     $(document).ready(function() {
      try{
         $('#dataTable').DataTable({
            "order": [[ 3, "desc" ]],
            "pageLength": 10,
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "ajax": {
                "url" : "{{url('user_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"},
                "dataSrc":function(json) {
                   console.log(json)
                    try{
                        var return_data = new Array();            
                          var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'user.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'user.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){       
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                          const status = json.data[i]["status"] == "" ? 
                                '<span class="badge badge-danger">Un-Active</span>' : 
                                '<span class="badge badge-success">Active</span>' ;   
                              const nulldesc = "-";
                              // console.log(json.data[i]["id"])
                               return_data.push({
                                'branch_name'  : json.data[i]["branch_name"],
                                  'name'  : json.data[i]["name"],
                                  'email'   : json.data[i]["email"],
                                  'email_real'   : json.data[i]["email_real"],
                                  'lname'   : json.data[i]["lname"],
                                  'lname'   : json.data[i]["lname"],
                                  'role_name'   : json.data[i]["role_name"],
                                  'status'   : status,
                                  'dep_name'   : json.data[i]["dep_name"],
                                  'tel'   : json.data[i]["tel"],
                                  'actions' : actions,
                                  'nulldesc'   : nulldesc,
                              })
                          }
                        console.log(return_data);
                        return return_data;
                    } catch(err) {
                            console.log(err.message)
                            console.log('error')
                        }
                  },
            },
            "columns":[
                    { "data": "branch_name" },
                    { "data": "email" },
                    { "data": "name" },
                    { "data": "lname" },
                    { "data": "dep_name" }, 
                    { "data": "email_real" },   
                    { "data": "role_name" },
                    { "data": "status" },  
                    { "data": "actions" },      
                ],
            'columnDefs': [
                    {
                      "targets": [2],
                      "className": "text-center",
                    },
                    // { "orderable": false, "targets": 6},
                ],
                
         });
        } catch(err) {
                            console.log(err.message)
                            console.log('error')
                        }
        });
    $('#create').click(function () {
        document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลผู้ใช้งาน';
        document.getElementById('addTagsResult').innerHTML = '';
        $('#modalCreateFrm').trigger("reset");
        $('#createUserModal').modal('show');
        $('#_method').val("");
        document.getElementById("modalCreateFrm").action = "{{url('user')}}";
        $('#password').attr("required", true);
        $('#password-confirm').attr("required", true);
        $('#email').attr("disabled", false);
    });

     $('#dataTable tbody').on( 'click', '.btnedit', function () {
      document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลผู้ใช้งาน';
       document.getElementById('lbl_checkEmail').innerHTML = '';
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('user/' + _id +'/edit', function (data) {
        console.log(data)
        $('#createUserModal').modal('show');
          $('#name').val(data['data'].name);
          $('#fname').val(data['data'].fname);
          $('#lname').val(data['data'].lname);
          $('#email').val(data['data'].email);
          $('#email_real').val(data['data'].email_real);
          $('#branch').val(data['data'].branch_id);
          branchSelected(data['data'].branch_id, data['data'].dep_id);
          $('#id').val(data['data'].id);
          $('#tel').val(data['data'].tel);
          document.getElementById("modalCreateFrm").action = "{{url('user')}}" + '/' + _id
          $('#_method').val("PATCH");
          $('#email').attr("disabled", true);
          $('#password').attr("required", false);
        $('#password-confirm').attr("required", false);
        $('#lbl_pass').text("");
        $('#lbl_passconfirm').text("");
        $('#validate_pass').text("");
        if (data['data'].status == 1){
          document.getElementById("status").checked = true;
        }else{
          document.getElementById("status").checked = false;
        }
        let data2 = data['data2'];
        let addTagsResult = document.getElementById('addTagsResult');
        addTagsResult.innerHTML = '';
        for (x in data2) {
            addTagsResult.innerHTML  += '<a href="#" id="roletag" class="roletagdelete"> ' +
            '<span class="badge badge-success mr-2">' +data2[x].role_name+' <span class="fa fa-w fa-times"></span></span>'+
            '<input type="hidden" name="roles[]" value="'+data2[x].role_id+'"></input>' +  '</a>';
          }
          $('.roletagdelete').click(function () {
                        event.preventDefault();
                        $(this).remove();
            })
        // data['data2'].forEach(function(entry) {
        //   document.getElementById('addTagsResult').innerHTML += entry.role_id;
        //     console.log(entry)
        // });
      })

  });

$('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('user')}}" + '/' + _id
});
</script>
@endsection

@section('modal')
@include('modals.user.usermodal')
@include('modals.component.delete')
@endsection