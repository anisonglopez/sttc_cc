@extends('layout.template')

@section('content')
@include('components.alertbox')
    <h3>บริษัท</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
  {{-- <div class="card-header">
    <div class="row">
      <div class="col-md-6 font-weight-bold text-primary">

      </div>
      <div class="col-md-6 text-right">
            <a href="#"  class="btn btn-facebook" id="create">Create</a>
      </div>
    </div>        
  </div> --}}
<!-- end card header -->
  <div class="card-body">
    <div class="col-md-12">
    <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm " id="dataTable">
                <thead class="text-center">
                    <tr>
                        <th>Companies No.</th>
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
  $(document).ready(function() {
         $('#dataTable').DataTable({
            "order": [[ 0, "desc" ]],
            "pageLength": 10,
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "ajax": {
                "url" : "{{url('company_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"},
                "dataSrc":function(json) {
                    console.log(json)
                    try{
                        var return_data = new Array();
                          for(var i=0;i< json.data.length; i++){                
                            var actions = ""         
                                actions =
                                @if (in_array( 'company.edit', $Permissions))
                                '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-sm btn-outline-warning btnedit"><span class="fas fa-edit fa-fw"></a>'
                                @endif
                                 
                            return_data.push({
                                  'com_no'  : json.data[i]["com_no"],
                                  'name_th'   : json.data[i]["name_th"],
                                  'name_en'   : json.data[i]["name_en"],
                                  'short_name'   : json.data[i]["short_name"],
                                  'tax_id'   : json.data[i]["tax_id"],
                                  'email'   : json.data[i]["email"],
                                  'add_th'   : json.data[i]["add_th"],
                                  'add_en'   : json.data[i]["add_en"],
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
                    { "data": "com_no" },
                    { "data": "name_th" },
                    { "data": "name_en" },
                    { "data": "short_name" },    
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
      document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลบริษัท';
      $('#_method').val("");
        $('#modalCreateFrm').trigger("reset");
        $('#CompanyModal').modal('show');
        document.getElementById("modalCreateFrm").action = "{{url('company')}}";
    });

     $('#dataTable tbody').on( 'click', '.btnedit', function () {
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('company/' + _id + '/edit', function (data) {
        console.log(data)
        document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลบริษัท';
        $('#CompanyModal').modal('show');
          $('#com_no').val(data.com_no);
          $('#name_th').val(data.name_th);
          $('#name_en').val(data.name_en);
          $('#short_name').val(data.short_name);
          $('#tax_id').val(data.tax_id);
          $('#tel').val(data.tel);
          $('#fax').val(data.fax);
          $('#email').val(data.email);
          $('#add_th').val(data.add_th);
          $('#add_en').val(data.add_en);
          document.getElementById("modalCreateFrm").action = "{{url('company')}}" + '/' + _id
          $('#_method').val("PATCH");
      })
     });

$('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('company')}}" + '/' + _id
});
</script>
@endsection
@section('modal')
@include('modals.company.companymodal')
@include('modals.component.delete')
@endsection