@extends('layout.template')
@section('content')
@include('components.alertbox')
    
       <!-- Default Card Example -->
       <form method="GET" action="{{url('reportSearch')}}">
        @csrf 
        <input type="hidden" name="_method" value="GET">
        <div class="card mb-4">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6 font-weight-bold ">
                      <h3>Report</h3>
                    </div>
                    <div class="col-md-6 text-right">
                      {{-- <a href="{{url('')}}"><button  class="btn btn-facebook" type="button" data-dismiss="modal"><span class="fa fa-undo"></span> Back</button></a>
                      <button type="submit" class="btn btn-success" id="btnsave"><span class="fa fa-w fa-save"></span> {{ __('Save') }} </button> --}}
                    </div>
                  </div>        
                </div>
              
              <!-- end card header -->
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                  <label for="password-confirm" class="col-md-5 col-form-label text-md-right">{{ __('ประเภทรายงาน') }}</label>
                                  <div class="col-md-3">
                                  <select name="report_filter" id="" class="form-control form-control-sm" required>
                                      <option value="">Select</option>
                                      <option value="R01">R01-รายงานใบงาน</option>
                                      <option value="R02">R02-รายงานเบิกของ</option>
                                      <option value="R03">R03-รายงานนำเข้าอุปกรณ์</option>
                                      <option value="R04">R04-รายงานจำหน่ายออก</option>
                                  </select>
                                  </div>
                                </div>
                            </div>  
        
                            <div class="col-md-12">
                              <div class="form-group row">
                                  <label for="desc" class="col-md-5 col-form-label text-md-right">{{ __('ค้นหาวันที่') }}</label>
                                  <div class="col-md-3  input-group"> 
                                    <input id="searchdate" type="text" class="form-control form-control-sm" name="searchdate" >
                                    <div class="input-group-append input-group-sm mb-3">
                                        <a id="searchdate_btn" href="#" class="btn btn-outline-info btn-sm"><span class="fa fa-search"></span></a>
                                    </div>
                                  </div>
                              </div>
                            </div>
        
                            <div class="col-md-12">
                              <div class="form-group row">
                                <label for="desc" class="col-md-5 col-form-label text-md-right"></label>
                                  <div class="col-md-3  input-group"> 
                                      <button type="submit" class="btn btn-facebook">ค้นหารายงาน</button>     
                                  </div>
                               
                              </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="desc" class="col-md-2 col-form-label text-md-right">{{ __(' รายละเอียด') }}</label>  
                                    <div class="col-md-8"> 
                                        <textarea name="desc" id="desc" cols="30" rows="2" class="form-control form-control-sm"></textarea>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                    
                        {{-- <a href="{{url('report/{request}/search')}}"  class="btn btn-success" id="create">ค้นหารายงาน</a> --}}
                        {{-- <a href="{{url('receive')}}"><button href="{{url('receive')}}" class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button></a> --}}
                        {{-- <button type="submit" class="btn btn-success" id="btnsave"> {{ __('ค้นหารายงาน') }} </button> --}}
             
                  </div>
              </div>
              
       </form>
@endsection

@section('js')
<script type="text/javascript">
let startDate = dateRangeFormat(0);
let endDate = dateRangeFormat(+30);
      $(document).ready(function() {
        
          LoadDataTable(startDate, endDate)
          $('#searchdate').daterangepicker(
            DRP_rangeOptions,
            function (start, end) {
            console.log('New date range selected: ' + start.format('DD/MM/YYYY') + ' to ' + end.format('DD/MM/YYYY','HH/mm/ss'));
            startDate = start.format('YYYY-MM-DD');
            endDate = end.format('YYYY-MM-DD');
          });

    function LoadDataTable(startDate, endDate){
         $('#dataTable').DataTable({
        "order": [[ 0, "desc" ]],
        "pageLength": 10,
        "processing": true,
        "destroy": true,
        "serverSide": true,
        "stateSave": true,
        "ajax": {
            "url" : "{{url('') }}",
            "type": "POST",
            "data":{ _token: "{{csrf_token()}}",startDate:startDate,endDate,endDate },
            "dataSrc":function(json) {
                console.log(json)
              },
          },  
         });
      } //end function load dataTable
      $('#searchdate_btn').click(function () {
              let searchDateBetween =  document.getElementById('searchdate').value
              console.log(startDate)
              LoadDataTable(startDate, endDate)
              
      });

    });
</script>
@endsection

@section('modal')
@include('modals.component.delete')
@endsection