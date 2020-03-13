@extends('layout.template')

{{-- For  Content . Blade --}}
@section('content')
@include('components.alertbox')
@php

@endphp

    <h3>รับของเข้าระบบ</h3>
       <!-- Default Card Example -->
<div class="card mb-4">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6 font-weight-bold text-primary form-inilne small">
              <div class="form-group row">
                <label for="desc" class="col-md-2 col-form-label text-right">{{ __('ช่วงวันที่') }}</label>  
                <div class="col-md-5  input-group"> 
                  <input id="searchdate" type="text" class="form-control form-control-sm" name="searchdate" >
                  <div class="input-group-append">
                      <a id="searchdate_btn" href="#" class="btn btn-outline-info btn-sm"><span class="fa fa-search"></span></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 text-right">
              @if (in_array( 'receive.create', $Permissions))
                <a href="{{url('receivecreate')}}"  class="btn btn-facebook" id="create">Create</a>
              @endif
            
            </div>
          </div>        
        </div>
      
      <!-- end card header -->
        <div class="card-body">
                <div class="col-md-12">
                        <div class="table-responsive">
                                <table class="table table-bordered table-hover small table-sm" id="dataTable">
                                    <thead class="text-center bg-primary text-white">
                                        <tr>
                                            <th>หน่วยงาน</th>
                                            <th>รหัสรับของเข้าระบบ</th>
                                            <th>ประเภท</th>
                                            <th>เวลารับเข้า</th>
                                            <th>รับเข้าโดย</th>
                                            <th>คำอธิบาย</th>
                                            <th>Status</th>
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
{{-- For Script Javascript --}}
@section('js')
<script type="text/javascript">
    $('#searchdate').daterangepicker();
let startDate = dateRangeFormat(0);
let endDate = dateRangeFormat(+30);
      $(document).ready(function() {
        
          LoadDataTable(startDate, endDate)
          $('#searchdate').daterangepicker(DRP_rangeOptions,
          function (start, end) {
           console.log('New date range selected: ' + start.format('DD/MM/YYYY') + ' to ' + end.format('DD/MM/YYYY'));
           startDate = start.format('YYYY-MM-DD');
           endDate = end.format('YYYY-MM-DD');
          });

    function LoadDataTable(startDate, endDate){
      console.log(startDate, endDate)
         $('#dataTable').DataTable({
            
        "order": [[ 0, "desc" ]],
        "processing": true,
        "destroy": true,
        "serverSide": true,
         "stateSave": true,
        "ajax": {
            "url" : "{{url('receive_getdata')}}",
            "type": "POST",
            "data":{ _token: "{{csrf_token()}}",startDate:startDate,endDate,endDate },
            "dataSrc":function(json) {
                console.log(json)
                try{
                    var return_data = new Array();         
                          var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          
                          @if (in_array( 'receive.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'receive.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          
                          for(var i=0;i< json.data.length; i++){     
                            var status   = json.data[i]["receive_status"];      
                             if (status == "confirm"){
                                DeletePermission = ' d-none '
                             }
                             else{
                              DeletePermission = ' d-inline '
                             }
                             
                            var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                            '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>';
                            
                            
                          return_data.push({ 
                              'receive_no'  : json.data[i]["receive_no"],
                              'in_name'   : json.data[i]["in_name"],
                              'desc'   : json.data[i]["desc"],
                              'receive_date'   : dateFormatddmmyyyy(json.data[i]["receive_date"]),
                              'receive_by'   : json.data[i]["receive_by"],
                              'b_name'   : json.data[i]["b_name"],
                              'actions' : actions,
                              'receive_status' : '<span class="badge badge-success">'+json.data[i]["receive_status"]+'</span>',
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
                { "data": "receive_no" },
                { "data": "in_name" },   
                { "data": "receive_date" }, 
                { "data": "receive_by" },  
                { "data": "desc" },   
                { "data": "receive_status" }, 
                { "data": "actions" }, 
            ],
        'columnDefs': [
                {
                  "targets": [0,1,2,3,4,5,6,7],
                  "className": "text-center",
                },
                { "orderable": false, "targets": 7 },
            ],   
         });
      } //end function load dataTable
      $('#searchdate_btn').click(function () {
              let searchDateBetween =  document.getElementById('searchdate').value
              console.log(startDate)
              LoadDataTable(startDate, endDate)
      });
    }); //Ready Function
    $('#dataTable tbody').on( 'click', '.btnedit', function () {
      event.preventDefault();
      var _id = $(this).data('id');
      window.location = 'receive/' + _id + '/edit';
      console.log(data)
      // $.get('receive/' + _id + '/edit', function (data) {
      //   console.log(data)
      //   document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลพนักงาน';
      //     $('#emp_code').val(data.emp_code);
      //     $('#title').val(data.title);
      //     $('#f_name').val(data.f_name);
      //     $('#l_name').val(data.l_name);
      //     $('#nickname').val(data.nickname);
      //     $('#remark').val(data.remark);
      //     $('#branch').val(data.branch_id);
      //     branchSelected(data.branch_id, data.dep_id);
          // document.getElementById("modalCreateFrm").action = "{{url('receiveedit')}}" + '/' + _id
          // $('#_method').val("PATCH");
      // })
     });

$('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('receive')}}" + '/' + _id
});

</script>
@endsection

{{-- For  Modal --}}
@section('modal')
@include('modals.component.delete')

@endsection