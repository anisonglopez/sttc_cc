@extends('layout.template')

@section('content')
@include('components.alertbox')
    <h3>เลขเอกสาร</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
        @if (in_array( 'docnumber.create', $Permissions))
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
                        <th>ชื่อโมดูล</th>
                        <th>คำอธิบาย</th>
                        <th>prefix</th>
                        <th>lengthnum</th>
                        <th>startnum</th>
                        <th>endnum</th>
                        <th>#</th>
                    </tr>
                 </thead>
                 <tbody>
                    {{-- @foreach($data as $row)
                    <tr>       
                        <td>{{$row->m_name}}</td>
                        <td>{{$row->desc}}</td>
                        <td>{{$row->prefix}}</td>
                        <td class="text-center">{{$row->length_num}}</td>
                        <td class="text-center">{{$row->start_num}}</td>
                        <td class="text-center">{{$row->end_num}}</td>
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
                "url" : "{{url('docnumber_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"},
                "dataSrc":function(json) {
                    console.log(json)
                    try{
                        var return_data = new Array();        
                            var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'docnumber.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'docnumber.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){       
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                             
                              return_data.push({
                                  'm_name'  : json.data[i]["m_name"],
                                  'desc'   : json.data[i]["desc"],
                                  'prefix'   : json.data[i]["prefix"],
                                  'length_num'   : json.data[i]["length_num"],
                                  'start_num'   : json.data[i]["start_num"],
                                  'end_num'   : json.data[i]["end_num"],
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
                    { "data": "m_name" },
                    { "data": "desc" },
                    { "data": "prefix" },
                    { "data": "length_num" },   
                    { "data": "start_num" },   
                    { "data": "end_num" }, 
                    { "data": "actions" },      
                ],
            'columnDefs': [
                    {
                      "targets": [0,3,4],
                      "className": "text-center",
                    },
                    { "orderable": false, "targets": 4 },
                ],
                
         });
        });

    $('#create').click(function () {
      document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลเลขเอกสาร';
      $('#_method').val("");
        $('#modalCreateFrm').trigger("reset");
        $('#docnumberModal').modal('show');
        document.getElementById("modalCreateFrm").action = "{{url('docnumber')}}";
    });

     $('#dataTable tbody').on( 'click', '.btnedit', function () {
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('docnumber/' + _id + '/edit', function (data) {
        console.log(data)
        document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลเลขเอกสาร';
        $('#docnumberModal').modal('show');
          $('#module_id').val(data.module_id);
          $('#desc').val(data.desc);
          $('#prefix').val(data.prefix);
          $('#length_num').val(data.length_num);
          $('#start_num').val(data.start_num);
          $('#end_num').val(data.end_num);
          document.getElementById("modalCreateFrm").action = "{{url('docnumber')}}" + '/' + _id
          $('#_method').val("PATCH");
      })
     });

$('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('docnumber')}}" + '/' + _id
});
</script>
@endsection
@section('modal')
@include('modals.docnumber.docnumbermodal')
@include('modals.component.delete')
@endsection