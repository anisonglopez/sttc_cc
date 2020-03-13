@extends('layout.template')

{{-- For  Content . Blade --}}
@section('content')
@include('components.alertbox')
<h3>โมดูล</h3>
<!-- Default Card Example -->
<div class="card mb-4">
        <div class="card-header">
        <div class="row">
        <div class="col-md-6 font-weight-bold text-primary">
        
        </div>
        <div class="col-md-6 text-right">
            @if (in_array( 'module.create', $Permissions))
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
                            <th>Module</th>
                             <th>#</th>
                     </tr>
                  </thead>
                  <tbody>
                  {{-- @foreach($data as $row)
                  <tr>              
                             <td>{{$row['module_name']}}</td>
                             <td class="text-center">
                                <a id="btn_edit" data-id="{{$row['id']}}" href="{{url('/module/edit')}}/{{$row['id']}}" class="btn btn-sm btn-outline-warning btnedit"><span class="fas fa-edit fa-fw"></a>
                                 <a id="btn_delete" data-id="{{$row['id']}}" href="#" class="btn btn-outline-danger btn-sm btndelete"><span class="fas fa-trash fa-fw"></a>
                             </td>
                     </tr>
                     @endforeach --}}
                  </tbody>
             </table>
        </div>
        </div>
        </div>
        </div>
        
@endsection
{{-- For Script Javascript --}}
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
                "url" : "{{url('module_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"},
                "dataSrc":function(json) {
                    console.log(json)
                    try{
                        var return_data = new Array();            
                          var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'module.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'module.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){       
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                        return_data.push({
                                  'module_name'  : json.data[i]["module_name"],
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
                    { "data": "actions" },      
                ],
            'columnDefs': [
                    {
                      "targets": [0,1],
                      "className": "text-center",
                    },
                    { "orderable": false, "targets": 1 },
                ],
                
         });
        });

   $('#create').click(function () {
       var role_id = $(this).data('id');
       document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลโมดูล';
       $('#_method').val("");
         $('#permissionModal').modal('show');
         document.getElementById("modalCreateFrm").action = "{{url('module')}}";
         $('#role_id').val(role_id);
     });

    $('#dataTable tbody').on( 'click', '.btnedit', function () {
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('module/' + _id +'/edit', function (data) {
        console.log(data)
        document.getElementById('modal-title').innerHTML = 'แก้ไขโมดูล';
        $('#permissionModal').modal('show');
          $('#module_name').val(data.module_name);
          document.getElementById("modalCreateFrm").action = "{{url('module')}}" + '/' + _id
          $('#_method').val("PATCH");
      })
  });

  $('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('module')}}" + '/' + _id
});
</script>
@endsection

{{-- For  Modal --}}
@section('modal')
@include('modals.module.modulemodal')
@include('modals.component.delete')
@endsection