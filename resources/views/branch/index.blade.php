@extends('layout.template')

@section('content')
@include('components.alertbox')
    <h3>สาขา</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
        @if (in_array( 'branch.create', $Permissions))
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
                        <th>Companies Name</th>
                        <th>Branch No.</th>
                        <th>Name TH</th>
                        <th>Name EN</th>
                        <th>Short Name</th>                        
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
  $(document).ready(function() {
         $('#dataTable').DataTable({
            "order": [[ 0, "desc" ]],
            "pageLength": 10,
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "ajax": {
                "url" : "{{url('branch_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"},
                "dataSrc":function(json) {
                    console.log(json)
                    try{
                        var return_data = new Array();
                          var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'branch.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'branch.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){       
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                              //  '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-sm btn-outline-warning btnedit"><span class="fas fa-edit fa-fw"></a>' +
                                
                                // '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete"><span class="fas fa-trash fa-fw"></a>'
                              return_data.push({
                                  'c_name'  : json.data[i]["c_name"],
                                  'branch_no'   : json.data[i]["branch_no"],
                                  'name_th'   : json.data[i]["name_th"],
                                  'name_en'   : json.data[i]["name_en"],
                                  'short_name'   : json.data[i]["short_name"],
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
                    { "data": "c_name" },
                    { "data": "branch_no" },
                    { "data": "name_th" },   
                    { "data": "name_en" }, 
                    { "data": "short_name" }, 
                    { "data": "actions" },      
                ],
            'columnDefs': [
                    {
                      "targets": [0,1,4,5],
                      "className": "text-center",
                    },
                    { "orderable": false, "targets": 5 },
                ],
                
         });
        });

    $('#create').click(function () {
      document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลสาขา';
      document.getElementById('addTagsResult').innerHTML = "";
      $('#_method').val("");
        $('#modalCreateFrm').trigger("reset");
        $('#BranchModal').modal('show');
        document.getElementById("modalCreateFrm").action = "{{url('branch')}}";
    });

     $('#dataTable tbody').on( 'click', '.btnedit', function () {
      document.getElementById('addTagsResult').innerHTML = "";
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('branch/' + _id + '/edit', function (data) {
        console.log(data)
        document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลสาขา';
        $('#BranchModal').modal('show');
          $('#com_id').val(data['data'].com_id);
          $('#branch_no').val(data['data'].branch_no);
          $('#name_th').val(data['data'].name_th);
          $('#name_en').val(data['data'].name_en);
          $('#short_name').val(data['data'].short_name);
          $('#tel').val(data['data'].tel);
          $('#fax').val(data['data'].fax);
          $('#email').val(data['data'].email);
          $('#add_th').val(data['data'].add_th);
          $('#add_en').val(data['data'].add_en);
          $('#bu_id').val(data['data'].bu_id);
          document.getElementById("modalCreateFrm").action = "{{url('branch')}}" + '/' + _id
          $('#_method').val("PATCH");
          let data2 = data['data2'];
          let addTagsResult = document.getElementById('addTagsResult');
          addTagsResult.innerHTML = '';
          for (x in data2) {
            addTagsResult.innerHTML  += '<a href="#" id="roletag" class="roletagdelete"> ' +
            '<span class="badge badge-success mr-2">' +data2[x].name_th+' <span class="fa fa-w fa-times"></span></span>'+
            '<input type="hidden" name="dep_id[]" value="'+data2[x].dep_id+'"></input>' +  '</a>';
          }
          $('.roletagdelete').click(function () {
                        event.preventDefault();
                        $(this).remove();
            })
      }) // end ajax get
 });

$('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('branch')}}" + '/' + _id
});
</script>
@endsection
@section('modal')
@include('modals.branch.branchmodal')
@include('modals.component.delete')
@endsection