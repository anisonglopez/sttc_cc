@extends('layout.template')

@section('content')
@include('components.alertbox')
    <h3>แผนก</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
        @if (in_array( 'department.create', $Permissions))
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
                        <th>Dep code</th>
                        <th>Name TH</th>
                        <th>Name EN</th>
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
                "url" : "{{url('department_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"},
                "dataSrc":function(json) {
                    console.log(json)
                    try{
                        var return_data = new Array();             
                            var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'department.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'department.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){       
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                             
                              return_data.push({ 
                                  'dep_code'  : json.data[i]["dep_code"],
                                  'name_th'   : json.data[i]["name_th"],
                                  'name_en'   : json.data[i]["name_en"],
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
                    { "data": "dep_code" },
                    { "data": "name_th" },
                    { "data": "name_en" },
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
      document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลแผนก';
      $('#_method').val("");
        $('#modalCreateFrm').trigger("reset");
        $('#DepartmentModal').modal('show');
        document.getElementById("modalCreateFrm").action = "{{url('department')}}";
    });

     $('#dataTable tbody').on( 'click', '.btnedit', function () {
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('department/' + _id + '/edit', function (data) {
        console.log(data)
        document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลแผนก';
        $('#DepartmentModal').modal('show');
          $('#dep_code').val(data.dep_code);
          $('#name_th').val(data.name_th);
          $('#name_en').val(data.name_en);
          document.getElementById("modalCreateFrm").action = "{{url('department')}}" + '/' + _id
          $('#_method').val("PATCH");
      })
     });

$('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('department')}}" + '/' + _id
});
</script>
@endsection
@section('modal')
@include('modals.department.departmentmodal')
@include('modals.component.delete')
@endsection