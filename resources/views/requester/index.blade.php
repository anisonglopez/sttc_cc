@extends('layout.template')
@section('content')
@include('components.alertbox')
    <h3>ผู้แจ้ง</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
        @if (in_array( 'requester.create', $Permissions))
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
                      <th>ชื่อผู้แจ้ง</th>
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
          "url" : "{{url('requester_getdata') }}",
          "type": "POST",
          "data":{ _token: "{{csrf_token()}}"},
          "dataSrc":function(json) {
              console.log(json)
              try{
                  var return_data = new Array();             
                          var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'requester.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'requester.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){       
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                             
                          return_data.push({
                            'b_name'  : json.data[i]["b_name"], 
                            'name'  : json.data[i]["name"],
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
              { "data": "name" },
              { "data": "actions" },      
          ],
      'columnDefs': [
              {
                "targets": [0,1,2],
                "className": "text-center",
              },
              
          ],
                
         });
        });

    $('#create').click(function () {
      document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลผู้แจ้ง';
      $('#_method').val("");
        $('#modalCreateFrm').trigger("reset");
        $('#RequesterModal').modal('show');
        document.getElementById("modalCreateFrm").action = "{{url('requester')}}";

    });

     $('#dataTable tbody').on( 'click', '.btnedit', function () {
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('requester/' + _id +'/edit', function (data) {
        console.log(data)
        document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลผู้แจ้ง';
        $('#RequesterModal').modal('show');
          $('#branch_id').val(data.branch_id);
          $('#name').val(data.name);
          document.getElementById("modalCreateFrm").action = "{{url('requester')}}" + '/' + _id
          $('#_method').val("PATCH");
      })
  });

$('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('requester')}}" + '/' + _id
});
</script>
@endsection

@section('modal')
@include('modals.requester.requestermodal')
@include('modals.component.delete')
@endsection