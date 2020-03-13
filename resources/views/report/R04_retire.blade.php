@extends('layout.template')
@include('components.alertbox')

{{-- For  Content . Blade --}}
@section('content')
    <h3>R04 - รายงานจำหน่ายออก</h3>
       <!-- Default Card Example -->
<form method="POST" action="{{url('report')}}">
@csrf 


      <!-- Default Card Example -->
<div class="card mb-4">
    <div class="card-header">
      <div class="row">
        <div class="col-md-6 font-weight-bold text-primary">
                รายงานจำหน่ายวัสดุอุปกรณ์ออกจากระบบ
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
                        <th>ลำดับ</th>
                        <th>สาขา</th>
                        <th>รหัสวัสดุอุปกรณ์</th>
                        <th>ชื่อวัสดุอุปกรณ์</th>
                        <th>จำนวน</th>
                        <th>รับเข้าโดย</th>
                        <th>สถานะ</th>
                        <th>วันที่แจ้ง</th>
                    </tr>
                  </thead>
                  <tbody class="small">
                    {{-- @foreach ($data1 as $item)
                        <tr>
                            <td class="text-center">{{$item->b_name}}</td>
                            <td class="text-center">{{$item->name}}</td>
                            <td class="text-center">{{$item->m_g_id}}</td>
                            <td class="text-center">{{$item->max}}</td>
                            <td class="text-center">{{$item->min}}</td>
                            <td class="text-center"></td>
                            <td class="text-center">{{$item->unit_id}}</td>
                        </tr>
                    @endforeach --}}
                  </tbody>
            </table>
        </div>
        </div>
      </div>
</div>
    </form>

    {{-- <h3>แสดงจำนวนทรัพย์สิน</h3>
       <!-- Default Card Example -->
<form method="POST" action="{{url('asset')}}">
@csrf 


      <!-- Default Card Example -->
<div class="card mb-4">
    <div class="card-header">
      <div class="row">
        <div class="col-md-6 font-weight-bold text-primary">
                รายการรับทรัพย์สินเข้าระบบ
        </div>
      </div>        
    </div>
      
      <!-- end card header -->
      <div class="card-body">
        <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm " id="assetdataTable">
                <thead class="text-center small">
                    <tr> 
                        <th>สาขา</th>
                        <th>เจ้าของทรัพย์สิน</th>
                        <th>สถานะทรัพย์สิน</th>
                        <th>รหัสทรัพย์สิน</th>
                        <th>โมเดลสินทรัพย์</th>
                        <th>หมายเลขซีเรียล</th>
                    </tr>
                  </thead>
                  <tbody class="small">
                    {{-- @foreach ($data1 as $item)
                        <tr>
                            <td class="text-center">{{$item->b_name}}</td>
                            <td class="text-center">{{$item->name}}</td>
                            <td class="text-center">{{$item->m_g_id}}</td>
                            <td class="text-center">{{$item->max}}</td>
                            <td class="text-center">{{$item->min}}</td>
                            <td class="text-center"></td>
                            <td class="text-center">{{$item->unit_id}}</td>
                        </tr>
                    @endforeach --}}
                  {{-- </tbody>
            </table>
        </div>
        </div>
      </div>
</div>
    </form>  --}}
       <!-- Default Card Example -->


      
@endsection
{{-- For Script Javascript --}}
@section('js')
{{-- @include('receive.js.js') --}}
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
        // dom: "Bfrtip",
        // buttons: [
        //     "copyHtml5",
        //     "excelHtml5",
        //     "print",
        //     // 'printHtml5',
        // ],
        "processing": true,
        "destroy": true,
        "serverSide": true,
         "stateSave": true,
        "ajax": {
            "url" : "{{url('retire_getdata')}}",
            "type": "POST",
            "data":{ _token: "{{csrf_token()}}",startDate:startDate,endDate,endDate },
            "dataSrc":function(json) {
                console.log(json)
                try{
                    var return_data = new Array();       
                          var EditPermission = ' d-none '
                          var DeletePermission = ' d-none '
                          @if (in_array( 'retirement.edit', $Permissions))
                          EditPermission = 'd-inline';
                          @endif
                          @if (in_array( 'retirement.delete', $Permissions))
                          DeletePermission = 'd-inline';
                          @endif
                          for(var i=0;i< json.data.length; i++){       
                            var status   = json.data[i]["retire_status"];      
                             if (status == "confirm"){
                                DeletePermission = ' d-none '
                             }else{
                                DeletePermission = ' d-inline '
                             }
                          var actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#"  class="btn btn-sm btn-outline-warning btnedit '+EditPermission+'"><span class="fas fa-edit fa-fw"></a>' +
                          ' <a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete '+DeletePermission+'"><span class="fas fa-trash fa-fw"></a>'; 
                          
                            return_data.push({ 
                              'retire_no'  : json.data[i]["retire_no"],
                              'm_no'   : json.data[i]["m_no"],
                              'id'   : json.data[i]["id"],
                              'created_at'   : dateFormatddmmyyyy(json.data[i]["created_at"]),
                              'retire_by'   : json.data[i]["retire_by"],
                              'q_out'   : json.data[i]["q_out"],
                              'b_name'   : json.data[i]["b_name"],
                              'm_name'   : json.data[i]["m_name"],
                              'created_at'   : json.data[i]["created_at"],
                              'actions' : actions,
                              'retire_status' : '<span class="badge badge-success">'+json.data[i]["retire_status"]+'</span>',
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
                { "data": "id" },
                { "data": "b_name" },
                { "data": "m_no" },
                { "data": "m_name" },   
                { "data": "q_out" },  
                { "data": "retire_by" },   
                { "data": "retire_status" }, 
                { "data": "created_at" }, 
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
    });
    
        // $(document).ready(function() {
        //  $('#assetdataTable').DataTable({
        //     "order": [[ 0, "desc" ]],
        //     "pageLength": 10,
        //     "processing": true,
        //     "serverSide": true,
        //     "stateSave": true,
        //     "ajax": {
        //         "url" : "{{url('asset_getdata') }}",
        //         "type": "POST",
        //         "data":{ _token: "{{csrf_token()}}"},
        //         "dataSrc":function(json) {
        //             console.log(json)
        //             try{
        //                 var return_data = new Array();
        //                   for(var i=0;i< json.data.length; i++){               
        //                       const actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-sm btn-outline-warning btnedit"><span class="fas fa-edit fa-fw"></a>' +
        //                                       '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete"><span class="fas fa-trash fa-fw"></a>'
        //                       return_data.push({
        //                           'b_name'  : json.data[i]["b_name"],
        //                           'asset_no'  : json.data[i]["asset_no"],
        //                           'a_name'   : json.data[i]["a_name"],
        //                           'serial_no'   : json.data[i]["serial_no"],      
        //                           'refer_doc'   : json.data[i]["refer_doc"],
        //                           'acqu_date'   : json.data[i]["acqu_date"],
        //                           'deac_date'   : json.data[i]["deac_date"],
        //                           'asset_value'   : json.data[i]["asset_value"],
        //                           'd_name'   : json.data[i]["d_name"],
        //                           'c_name'   : json.data[i]["c_name"],
        //                           'actions' : actions,
        //                       })
        //                   }
        //                 console.log(return_data);
        //                 return return_data;
        //             } catch(err) {
        //                     console.log(err.message)
        //                     console.log('error')
        //                 }
        //           },
        //     },
        //     "columns":[
        //             { "data": "b_name" },
        //             { "data": "d_name" },
        //             { "data": "c_name" },
        //             { "data": "asset_no" },
        //             { "data": "a_name" },
        //             { "data": "serial_no" },  
        //         ],
        //     "columnDefs": [
        //             {
        //               "targets": [0,1,2,3,4],
        //               "className": "text-center",
        //             },
        //         ],  
        //  });
        
</script>

@endsection

{{-- For  Modal --}}
@section('modal')
@include('modals.component.delete')
@endsection