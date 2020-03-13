@extends('layout.template')

{{-- For  Content . Blade --}}
@section('content')
@include('components.alertbox')
    <h3>เมนู/สิทธิ์การใช้งาน</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
        @if (in_array( 'menupermission.create', $Permissions))
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
                        <th>Module</th>
                        <th>Permission Code</th>
                        <th>Description</th>
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
                "url" : "{{url('menu_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"},
                "dataSrc":function(json) {
                    console.log(json)
                    try{
                        var return_data = new Array();             
                          var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'menupermission.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'menupermission.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){       
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                             
                              return_data.push({
                                  'module_name'  : json.data[i]["module_name"],
                                  'code'  : json.data[i]["code"],
                                  'desc'   : json.data[i]["desc"],
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
                    { "data": "module_name" },
                    { "data": "code" },
                    { "data": "desc" },
                    { "data": "actions" },      
                ],
            'columnDefs': [
                    {
                      "targets": [0,3],
                      "className": "text-center",
                    },
                    { "orderable": false, "targets": 3 },
                ], 
         });
        });
       $('#create').click(function () {
        $('#modalCreateFrm').trigger("reset");
           var role_id = $(this).data('id');
           document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลเมนู/สิทธิ์การใช้งาน';
           $('#_method').val("");
             $('#permissionModal').modal('show');
             document.getElementById("modalCreateFrm").action = "{{url('menu')}}";
             $('#role_id').val(role_id);
         });
    
        $('#dataTable tbody').on( 'click', '.btnedit', function () {
          event.preventDefault();
          var _id = $(this).data('id');
          $.get('menu/' + _id +'/edit', function (data) {
            console.log(data)
            document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลเมนู/สิทธิ์การใช้งาน';
            $('#permissionModal').modal('show');
              $('#module_id').val(data.module_id);
              $('#code').val(data.code);
              $('#desc').val(data.desc);
              var module_id = document.getElementById("module_id");
              module_id.value = data.module_id;
              document.getElementById("modalCreateFrm").action = "{{url('menu')}}" + '/' + _id
              $('#_method').val("PATCH");
          })
      });
      $('#dataTable tbody').on( 'click', '.btndelete', function () {
            event.preventDefault();
            var _id = $(this).data('id');
            $('#deleteModal').modal('show');
            document.getElementById("daleteFrm").action = "{{url('menu')}}" + '/' + _id
    });
    </script>
@endsection

{{-- For  Modal --}}
@section('modal')
@include('modals.permission.permissionmodal')
@include('modals.component.delete')
@endsection