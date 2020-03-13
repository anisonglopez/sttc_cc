<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  

  <title>{{ config('app.name', 'Laravel') }}</title>
<!-- icon -->
<link rel="icon" href="../../img/toray_icon.ico">
  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
  <!-- Custom styles for this template-->
  <link href="{{asset('build/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <!-- date rang picker -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <!-- <link href="../../vendor/datatable_fixed_header/css/fixedHeader.bootstrap4.scss" rel="stylesheet"> -->
<script type="text/javascript" src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/daterangepicker-preconfig.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}" />
<link href="{{asset('vendor/progress-bar/css/static.css')}}" rel="stylesheet"/> 
{{-- Custom css --}}
<link href="{{asset('build/css/custom.css')}}" rel="stylesheet">
</head>

  
<body  id="page-top" onload="startTime()" class="sidebar-toggled">
      <!-- Page Wrapper -->
      <div id="wrapper">
      @yield('sideleft' , View::make('layout.sideleft'))
     {{-- ย้ายเมนู ไปไว้ด้านบน --}}
     <div class="sidebar-custom " id="accordionSidebar">
     </div>
      @yield('navbar' , View::make('layout.navbar'))
      
 <!-- Custom scripts for all pages before read content-->
  <script src="{{asset('build/js/sb-admin-2.js')}}"></script>
        <div class="container-fluid">
          {{-- <div class="mt-5"></div>  --}}
          {{-- Custom Navbar Position fixed --}}
     
        @yield('content')
        <div class="mb-5"></div> 
        </div> 
      <!-- End main_container -->
    </div>
 <!-- End wrapper -->
 {{-- Start toast --}}
 {{-- <div aria-live="polite" aria-atomic="true" style="position: fixed; min-height: 100px; z-index:9" >
    <div class="toast" style="position: fixed; bottom: 40px; right: 0;"  id="toast" data-autohide="false">
      <div class="toast-header bg-danger text-white">
        <span class="fas fa-exclamation-triangle"></span>
        <strong class="mr-auto">แจ้งเตือน</strong>
        <small class="ml-2">กรุณาตรวจสอบ</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
                   <label>เลยกำหนด</label>   
                   <label>10 รายการ</label>   <a href="#">View</a>
                   <br>
                   <label>กำหนดวันนี้</label>   
                   <label>20 รายการ</label>   <a href="#">View</a>
                   <br>
                   <label>เร่งด่วน</label>   
                   <label>30 รายการ</label>    <a href="#">View</a>
                   <br>
                   <label>ใหม่</label>   
                   <label>40 รายการ</label>    <a href="#">View</a>
                   <br>
           </div>
          </div>
      </div> --}}

 {{-- End toast --}}
      <!-- Footer -->
        <footer class="sticky-footer bg-white shadow-sm fixed-bottom" style="z-index:99;">
        <div class="container my-auto">
          <div class="row">
            <div class="col-md-6">
                <div class="copyright text-left my-auto text-black-50">
                  <span class="small">Version: {{config('app_version.version', '1.0')}}  Copyright &copy; {{now()->year}}  ITBC Business Consultant Group Company Limited | 433</span>
                </div>
          </div>
          <div class="col-md-6">
            <div class="copyright text-right my-auto">
              <span>
                หน่วยงาน : {{ $BranchName ?? '' }}
              </span>
            </div>
          </div>
        </div>
        </div>
      </footer>
      
      
      <!-- End of Footer -->
   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<!-- script -->
    <!-- jQuery -->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/tempusdominus/tempusdominus.min.js')}}"></script>
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script> --}}
      <!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
{{-- <script src="{{asset('vendor/progress-bar/js/jquery.progresstimer.js')}}"></script> --}}
{{-- <script src="{{asset('vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>  --}}

 <!-- Export -->
{{-- <script src="{{asset('vendor/datatable_export/buttons/1.6.0/js/dataTables.buttons.min.js')}}"></script> --}}
{{-- <script src="{{asset('vendor/datatable_export/buttons/1.6.0/js/buttons.flash.min.js')}}"></script> --}}
{{-- <script src="{{asset('vendor/datatable_export/ajax/jszip/3.1.3/jszip.min.js')}}"></script> --}}
{{-- <script src="{{asset('vendor/datatable_export/ajax/pdfmake/0.1.53/pdfmake.min.js')}}"></script>
<script src="{{asset('vendor/datatable_export/ajax/pdfmake/0.1.53/vfs_fonts.js')}}"></script> --}}
{{-- <script src="{{asset('vendor/datatable_export/buttons/1.6.0/js/buttons.html5.min.js')}}"></script> --}}
{{-- <script src="{{asset('vendor/datatable_export/buttons/1.6.0/js/buttons.print.min.js')}}"></script> --}}
{{-- <script src="{{asset('vendor/datatable_export/buttons/1.6.0/js/buttons.colVis.min.js')}}"></script>  --}}
<script>
  $('#toast').toast('show')
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    setTimeout(function() {$('.alert').slideUp("slow");}, 3000);
</script>
            @yield('js')
            @yield('logoutmodal' , View::make('modals.component.logout'))
            @yield('changepassmodal' , View::make('modals.component.changepass'))
            @yield('modal')
</body>
</html>