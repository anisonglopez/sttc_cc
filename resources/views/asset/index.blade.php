@extends('layout.template')

@section('content')
@include('components.alertbox')
    <h3>ทรัพย์สิน</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
            <a href="#"  class="btn btn-facebook" id="create">Create</a>
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
                        <th>Branch</th>
                        <th>แผนกเจ้าของทรัพย์สิน</th>
                        <th>Asset Status</th>
                        <th>Asset No.</th>
                        <th>Asset Model</th>
                        <th>Seriral No.</th>
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
                "url" : "{{url('asset_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"},
                "dataSrc":function(json) {
                    console.log(json)
                    try{
                        var return_data = new Array();
                          for(var i=0;i< json.data.length; i++){               
                              const actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-sm btn-outline-warning btnedit"><span class="fas fa-edit fa-fw"></a>' +
                                              '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete"><span class="fas fa-trash fa-fw"></a>'
                              return_data.push({
                                  'b_name'  : json.data[i]["b_name"],
                                  'asset_no'  : json.data[i]["asset_no"],
                                  'a_name'   : json.data[i]["a_name"],
                                  'serial_no'   : json.data[i]["serial_no"],      
                                  'refer_doc'   : json.data[i]["refer_doc"],
                                  'acqu_date'   : json.data[i]["acqu_date"],
                                  'deac_date'   : json.data[i]["deac_date"],
                                  'asset_value'   : json.data[i]["asset_value"],
                                  'd_name'   : json.data[i]["d_name"],
                                  'c_name'   : json.data[i]["c_name"],
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
                    { "data": "c_name" },
                    { "data": "asset_no" },
                    { "data": "a_name" },
                    { "data": "serial_no" },
                    { "data": "actions" },      
                ],
            "columnDefs": [
                    {
                      "targets": [0,2,3,6],
                      "className": "text-center",
                    },
                    { "orderable": false, "targets": 6 },
                ],  
         });
        });

    $('#create').click(function () {
      document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลทรัพย์สิน';
        $('#_method').val("");
        $('#modalCreateFrm').trigger("reset");
        $('#AssetModal').modal('show');
        document.getElementById("modalCreateFrm").action = "{{url('asset')}}";
    });

     $('#dataTable tbody').on( 'click', '.btnedit', function () {
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('asset/' + _id + '/edit', function (data) {
        console.log(data)
        document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลทรัพย์สิน';
          $('#AssetModal').modal('show');
          $('#asset_no').val(data.asset_no);
          $('#a_m_id').val(data.a_m_id);
          $('#serial_no').val(data.serial_no);
          $('#refer_doc').val(data.refer_doc);
          $('#acqu_date').val(data.acqu_date);
          $('#deac_date').val(data.deac_date);
          $('#asset_value').val(data.asset_value);
          $('#asset_status').val(data.asset_status);
          $('#branch').val(data.branch_id);
          branchSelected(data.branch_id, data.owner_dep);
          document.getElementById("modalCreateFrm").action = "{{url('asset')}}" + '/' + _id
          $('#_method').val("PATCH");

      })
     });

$('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('asset')}}" + '/' + _id
});
</script>
@endsection
@section('modal')
@include('modals.asset.assetmodal')
@include('modals.component.delete')
@endsection