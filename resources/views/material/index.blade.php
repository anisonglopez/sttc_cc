@extends('layout.template')

@section('content')
@include('components.alertbox')
    <h3>ข้อมูลวัสดุอุปกรณ์</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
        @if (in_array( 'material.create', $Permissions))
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
                <thead class="text-center small">
                    <tr> 
                        <th>หน่วยงาน</th>
                        <th>เลขที่วัสดุอุปกรณ์</th>
                        <th>ชื่อวัสดุอุปกรณ์</th>
                        <th>คำอธิบาย</th>
                        <th>ประเภทวัสดุอุปกรณ์</th>
                        <th>Min</th>
                        <th>Max</th>
                        <th>หน่วยนับ</th>
                        <th>สถานะวัสดุอุปกณ์</th>
                        <th>#</th>
                    </tr>
                 </thead>
                 <tbody class="small">
                    
                 </tbody>
            </table>
    </div>
    </div>
    </div>
</div>

@endsection

@section('js')
<script>
  //  setTimeout(function() {$('.alert').slideUp("slow");}, 3000);
    //  var table = $('#dataTable').DataTable({
    //     stateSave: true,
    //  });
     $(document).ready(function() {
         $('#dataTable').DataTable({
            "order": [[ 0, "desc" ]],
            "pageLength": 10,
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "ajax": {
                "url" : "{{url('material_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"},
                "dataSrc":function(json) {
                    console.log(json)
                    try{
                        var return_data = new Array();        
                          var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'material.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'material.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){       
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                             
                          const status = json.data[i]["status"] == "" ? 
                              '<span class="badge badge-danger">Un-Active</span>' : 
                              '<span class="badge badge-success">Active</span>' ;       
                              return_data.push({
                                  'b_name'  : json.data[i]["b_name"],
                                  'm_no'  : json.data[i]["m_no"],
                                  'name'  : json.data[i]["name"],
                                  'm_g_name'   : json.data[i]["m_g_name"],
                                  'max'   : json.data[i]["max"],      
                                  'min'   : json.data[i]["min"],
                                  'unit_name'   : json.data[i]["unit_name"],
                                  'status'   : status,
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
                    { "data": "b_name" },
                    { "data": "m_no" },
                    { "data": "name" },
                    { "data": "desc" },
                    { "data": "m_g_name" },
                    { "data": "min" },
                    { "data": "max" },
                    { "data": "unit_name" },    
                    { "data": "status" }, 
                    { "data": "actions" },      
                ],
            'columnDefs': [
                    {
                      "targets": [0,1,2,4,5,6,7,8,9],
                      "className": "text-center",
                    },
                    { "orderable": false, "targets": 9 },
                ],
                
         });
        });

    $('#create').click(function () {
      document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลวัสดุอุปกรณ์';
        $('#_method').val("");
        $('#modalCreateFrm').trigger("reset");
        $('#materialModal').modal('show');
        document.getElementById("modalCreateFrm").action = "{{url('material')}}";
    });

     $('#dataTable tbody').on( 'click', '.btnedit', function () {
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('material/' + _id + '/edit', function (data) {
        console.log(data)
        document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลวัสดุอุปกรณ์';
          $('#materialModal').modal('show');
          $('#branch_id').val(data.branch_id);
          $('#m_no').val(data.m_no);
          $('#name').val(data.name);
          $('#desc').val(data.desc);
          $('#m_g_id').val(data.m_g_id);
          $('#max').val(data.max);
          $('#min').val(data.min);
          $('#unit_id').val(data.unit_id);
          document.getElementById("modalCreateFrm").action = "{{url('material')}}" + '/' + _id
          $('#_method').val("PATCH");
          if (data.status == 1){
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
        document.getElementById("daleteFrm").action = "{{url('material')}}" + '/' + _id
});
</script>
@endsection
@section('modal')
@include('modals.material.materialmodals')
@include('modals.component.delete')
@endsection