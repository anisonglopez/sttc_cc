@extends('layout.template')

@section('content')
@include('components.alertbox')
    <h3>พนักงาน</h3>
       <!-- Default Card Example -->
      
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
        @if (in_array( 'employee.create', $Permissions))
            <a href="#"  class="btn btn-facebook" id="create">Create</a>
        @endif
      </div>
    </div>        
  </div>
<!-- end card header -->
  <div class="card-body">
    <div class="col-md-12">
    <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm " id="dataTable">
                <thead class="text-center">
                    <tr>
                        <th>หน่วยงาน</th>
                        <th>แผนก</th>
                        <th>รหัสพนักงาน</th>
                        <th>ชื่อพนักงาน</th>
                        <th>ชื่อเล่นพนักงาน</th>
                        <th>ผู้ได้รับมอบหมาย/ผู้มอบหมาย</th>
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

@endsection

@section('js')
<script>
    $(document).ready(function() {
         $('#dataTable').DataTable({
            "order": [[ 0, "desc" ]],
            "pageLength": 10,
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "ajax": {
                "url" : "{{url('employee_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"},
                "dataSrc":function(json) {
                    console.log(json)
                    try{
                        var return_data = new Array();
                                
                          var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'employee.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'employee.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){    
                            const status = json.data[i]["assign_flg"] == "" ? 
                                '<span class="badge badge-info">ผู้ได้รับมอบหมาย</span>' : 
                                '<span class="badge badge-success">ผู้มอบหมาย</span>' ;     
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                          
                                          
                              return_data.push({
                                  'd_name'  : json.data[i]["d_name"],
                                  'b_name'   : json.data[i]["b_name"],
                                  'emp_code'   : json.data[i]["emp_code"],
                                  'title'   : json.data[i]["title"],
                                  'f_name'   : json.data[i]["f_name"],
                                  'l_name'   : json.data[i]["l_name"],
                                  'nickname'   : json.data[i]["nickname"],
                                  'remark'   : json.data[i]["remark"],
                                  'assign_flg'   : status,
                                  'actions' : actions,
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
                    { "data": "b_name" },
                    { "data": "d_name" },
                    { "data": "emp_code" },
                    { "data": "f_name" },
                    { "data": "nickname" },
                    { "data": "assign_flg" },
                    { "data": "actions" },      
                ],
            'columnDefs': [
                    {
                      "targets": [0,1,2,3,4,5,6],
                      "className": "text-center",
                    },
                    { "orderable": false, "targets": 6 },
                ],
                
         });
        });

    $('#create').click(function () {
      document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลพนักงาน';
      $('#_method').val("");
        $('#modalCreateFrm').trigger("reset");
        $('#EmployeeModal').modal('show');
        document.getElementById("modalCreateFrm").action = "{{url('employee')}}";
    });

     $('#dataTable tbody').on( 'click', '.btnedit', function () {
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('employee/' + _id + '/edit', function (data) {
        console.log(data)
        document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลพนักงาน';
        $('#EmployeeModal').modal('show');
          $('#emp_code').val(data.emp_code);
          $('#title').val(data.title);
          $('#f_name').val(data.f_name);
          $('#l_name').val(data.l_name);
          $('#nickname').val(data.nickname);
          $('#remark').val(data.remark);
          $('#branch').val(data.branch_id);
          branchSelected(data.branch_id, data.dep_id);
          document.getElementById("modalCreateFrm").action = "{{url('employee')}}" + '/' + _id
          $('#_method').val("PATCH");
          if (data.assign_flg == 1){
            console.log()
          document.getElementById("status").checked = true;
        }else{
          document.getElementById("status").checked = false;
        }
      })
     });

$('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('employee')}}" + '/' + _id
});
</script>
@endsection
@section('modal')
@include('modals.employee.employeemodal')
@include('modals.component.delete')
@endsection