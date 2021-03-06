
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column ">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar nav-bar-custom navbar-expand navbar-light skin-custom topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 text-white">
            <i class="fa fa-bars"></i>
          </button>
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
 
  {{-- <button class="btn border-0 text-white" id="sidebarToggle">
  <i class="fa fa-bars"></i>
  </button> --}}
  <span class="mr-2 d-none d-lg-inline text-white text-uppercase">sttc.southernthaicocoa.co.th</span>
   {{-- <img src="{{asset('build/img/logoch7hd.png')}}" class="img-profile" style="max-width: 40px;" /> --}}
  {{-- <button class="btn border-0 text-white" id="viewless" >
  <i class="fa fa-bars"></i>
      </button> --}}
</div>
<!-- Topbar Search -->
<!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"> -->
  
  <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-width-custom ">
    <nav class="navbar navbar-expand-lg small">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </nav>
  </div>
<!-- </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto ">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white text-uppercase"><?=date('d/m/Y')?></span>
                <span class="mr-2 d-none d-lg-inline text-white text-uppercase"><div id="clock" style="color: white;"></div></span>
              </a>
            </li>


            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  แจ้งเตือน วัสดุอุปกรณ์มีจำนวนต่ำกว่าที่กำหนดไว้
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">หลอดไฟ LED </span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    <span class="font-weight-bold">ประตู</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    <span class="font-weight-bold">กุญแจ</span>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- <div class="topbar-divider d-none d-sm-block"> </div> -->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
           <!-- <p class="nav-link"><span class="mr-2 d-none d-lg-inline text-white text-uppercase"><?=date('d/m/Y')?></span></p>  -->
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

              <!-- <span class="mr-2 d-none d-lg-inline text-white text-uppercase"><div id="clock" style="color: white;"></div></span> -->

                <span class="mr-2 d-none d-lg-inline text-white text-uppercase"></span>
                <img class="img-profile rounded-circle" src="{{asset('build/img/account-icon.png')}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepassModal">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                 ตั้งค่าการแจ้งเตือนแบบ Real-time
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepassModal">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                   เปลี่ยนรหัสผ่าน
                  </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                 ออกจากระบบ
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
      