@extends('layout.template')

@section('content')
@include('components.alertbox')
    <h3>ประเภทการรับเข้า</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
        @if (in_array( 'intype.create', $Permissions))
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>#</th>
                    </tr>
                 </thead>
                 <tbody>
                    {{-- @foreach($data as $row)
                    <tr>       
                        <td>{{$row->name}}</td>  
                        <td>{{$row->desc}}</td>
                        <td class="text-center">
                            <a id="btn_edit" data-id="{{$row->id}}" href="#" class="btn btn-sm btn-outline-warning btnedit"><span class="fas fa-edit fa-fw"></a>
                            <a id="btn_delete" data-id="{{$row->id}}" href="#" class="btn btn-outline-danger btn-sm btndelete"><span class="fas fa-trash fa-fw"></a>
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
                "url" : "{{url('intype_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"},
                "dataSrc":function(json) {
                    console.log(json)
                    try{
                        var return_data = new Array();             
                          var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'intype.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'intype.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){       
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                             
                              return_data.push({
                                  'name'  : json.data[i]["name"],
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
                    { "data": "name" },
                    { "data": "desc" }, 
                    { "data": "actions" },      
                ],
            'columnDefs': [
                    {
                      "targets": [0,2],
                      "className": "text-center",
                    },
                    { "orderable": false, "targets": 2 },
                ],
                
         });
        });
    $('#create').click(function () {
      document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลประเภทการรับเข้า';
      $('#_method').val("");
        $('#modalCreateFrm').trigger("reset");
        $('#IntypeModal').modal('show');
        document.getElementById("modalCreateFrm").action = "{{url('intype')}}";
    });

     $('#dataTable tbody').on( 'click', '.btnedit', function () {
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('intype/' + _id + '/edit', function (data) {
        console.log(data)
        document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลประเภทการรับเข้า';
        $('#IntypeModal').modal('show');
          $('#name').val(data.name);
          $('#desc').val(data.desc);
          document.getElementById("modalCreateFrm").action = "{{url('intype')}}" + '/' + _id
          $('#_method').val("PATCH");
      })
     });

$('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('intype')}}" + '/' + _id
});
</script>
@endsection
@section('modal')
@include('modals.intype.intypemodal')
@include('modals.component.delete')
@endsection