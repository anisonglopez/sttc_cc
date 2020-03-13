@extends('layout.template')

{{-- For  Content . Blade --}}
@section('content')
{{-- ใช้ PHP Serverside  Call With Ajax--}}
<h3>ประวัติการใช้งานระบบ</h3>
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
     {{-- <a href="#"  class="btn btn-facebook" id="create">Create</a> --}}
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
         <thead class="text-center small">
             <tr>
                    <th>Created At (-7 Hours)</th> 
                    <th>User</th>
                     <th>Module</th>
                     <th>Page</th>
                     <th>Action</th>
                     <th>Desc</th>     
                     <th>Status</th>              
             </tr>
          </thead>
          <tbody class="small">
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
let startDate = dateRangeFormat(0);
let endDate = dateRangeFormat(+30);
    $(document).ready(function() {
        LoadDataTable(startDate, endDate)
        $('#searchdate').daterangepicker({
            startDate: moment(), //moment().subtract('days', 29) for prev date
            endDate: moment().add(30, 'days'),
             locale: {
                 format: 'DD/MM/YYYY'
             },
        },
        function (start, end) {
         console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
         startDate = start.format('YYYY-MM-DD');
         endDate = end.format('YYYY-MM-DD');
        });
         
        function LoadDataTable(startDate, endDate){
            $('#dataTable').DataTable({
            "order": [[ 0, "desc" ]],
            "pageLength": 25,
            "processing": true,
            "destroy": true,
            "serverSide": true,
            "ajax": {
                "url" : "{{url('log_getdata') }}",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}",startDate:startDate,endDate,endDate },
                "dataSrc":function(json) {
                    console.log(json)
                    try{
                        var return_data = new Array();
                                        for(var i=0;i< json.data.length; i++){  
                                            const status = json.data[i]["status"] == "ERROR" ? 
                                             '<span class="badge badge-danger">ERROR</span>' : 
                                             '<span class="badge badge-success">' + json.data[i]["status"] + '</span>' ;               

                                            return_data.push({
                                                'action'  : json.data[i]["action"],
                                                'module'   : json.data[i]["module"],
                                                'user'   : json.data[i]["user"],      
                                                'module'   : json.data[i]["module"],
                                                'page'   : json.data[i]["page"],
                                                'status'   : status,
                                                'created_at'   : json.data[i]["created_at"],
                                                'desc'   : json.data[i]["desc"],
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
                    { "data": "created_at" },
                    { "data": "user" },
                    { "data": "module" },
                    { "data": "page" },
                    { "data": "action" },
                    { "data": "desc" },      
                    { "data": "status" },
                          
                ]
         });
    } //end function load dataTable
         
         $('#searchdate_btn').click(function () {
            let searchDateBetween =  document.getElementById('searchdate').value
            console.log(startDate)
            LoadDataTable(startDate, endDate)
    });
}); //Ready Function


    </script>



@endsection

{{-- For  Modal --}}
@section('modal')

@endsection

{{--        "columns":[
                { "data": "first_name" },
                { "data": "last_name" }
            ] --}}