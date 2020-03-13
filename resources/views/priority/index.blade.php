@extends('layout.template')
@section('content')
@include('components.alertbox')
    <h3>ลำดับความสำคัญ</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
        @if (in_array( 'priority.create', $Permissions))
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
                            <th>ชื่อ</th>
                            <th>Code</th>
                            <th>Color Code</th>
                            <th>หมายเหตุ</th>
                            <th>Expire Date</th>
                            <th>Noti flag</th>
                            
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
          "url" : "{{url('priority_getdata') }}",
          "type": "POST",
          "data":{ _token: "{{csrf_token()}}"},
          "dataSrc":function(json) {
              console.log(json)
              try{
                  var return_data = new Array();            
                          var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'priority.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'priority.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){       
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                             
                            const status = json.data[i]["noti_flag"] == "" ? 
                                '<span class="badge badge-info">Unactive</span>' : 
                                '<span class="badge badge-success">Active</span>' ; 
                        return_data.push({
                            'name'  : json.data[i]["name"],
                            'code'  : json.data[i]["code"],
                            'color_code'  : '<span class="badge badge-success" style="background-color:'+json.data[i]["color_code"]+'">  ' + json.data[i]["color_code"] + '</span>',
                            'remark'  : json.data[i]["remark"],
                            'expire_date'  : json.data[i]["expire_date"],
                            'noti_flag'  : status,
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
              { "data": "name" },
              { "data": "code" },
              { "data": "color_code" },
              { "data": "remark" },
              { "data": "expire_date" },
              { "data": "noti_flag" },
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
      document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลลำดับความสำคัญ';
      $('#_method').val("");
        $('#modalCreateFrm').trigger("reset");
        $('#PriorityModal').modal('show');
        document.getElementById("modalCreateFrm").action = "{{url('priority')}}";

    });

     $('#dataTable tbody').on( 'click', '.btnedit', function () {
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('priority/' + _id +'/edit', function (data) {
        console.log(data)
        document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลลำดับความสำคัญ';
        $('#PriorityModal').modal('show');
          $('#name').val(data.name);
          $('#code').val(data.code);
          $('#color_code').val(data.color_code);
          $('#remark').val(data.remark);
          $('#expire_date').val(data.expire_date);
          document.getElementById("modalCreateFrm").action = "{{url('priority')}}" + '/' + _id
          $('#_method').val("PATCH");
          if (data.noti_flag == 1){
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
        document.getElementById("daleteFrm").action = "{{url('priority')}}" + '/' + _id
});
</script>
@endsection

@section('modal')
@include('modals.priority.prioritymodal')
@include('modals.component.delete')
@endsection