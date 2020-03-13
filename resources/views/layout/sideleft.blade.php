
<!-- Sidebar -->
<ul class="navbar-nav bg-sideleft sidebar toggled sidebar-dark accordion text-danger" id="accordionSidebar">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center " href="{{url('/')}}">
  <div class="sidebar-brand-icon">
    <!-- <i class="fas fa-apple"></i> -->
    <img src="{{asset('build/img/logoch7hd.png')}}" class="round" style="max-width: 100%"/>
  </div>
</a>
<!-- Divider -->
{{-- <hr class="sidebar-divider my-0"> --}}
<!-- Divider -->
{{-- <hr class="sidebar-divider"> --}}
<!-- Heading -->
{{-- <div class="sidebar-heading">Dashboard / Wallboard</div> --}}
<!-- Nav Item - Dashboard -->
<li class="nav-item   {{ request()->routeIs('dashboard*') ? 'active' : '' }}" >
  <a class="nav-link" href="{{url('/dashboard')}}">
    <i class="fas fa-fw fa-chart-pie "></i>
    <span>Dashboard / Wallboard</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Divider -->
{{-- <hr class="sidebar-divider"> --}}
<!-- Heading -->
{{-- <div class="sidebar-heading">การบริหารจัดการอุปกรณ์</div> --}}
<!-- Nav Item - Dashboard -->
@if (in_array( 'joborder.view', $Permissions))
<li class="nav-item  {{ request()->routeIs('joborder*') ? 'active' : '' }} {{ request()->is('jobordercreate') ? 'active' : '' }} " >
<a class="nav-link" href="{{url('/joborder')}}">
      <i class="fas fa-fw fa-book"></i>
      <span>ใบงาน (เบิกของออก - เข้า)</span></a>
  </li>
@endif
@if (in_array( 'receive.view', $Permissions))
<li class="nav-item  {{ request()->routeIs('receive*') ? 'active' : '' }} {{ request()->is('receivecreate') ? 'active' : '' }}" >
  <a class="nav-link" href="{{url('/receive')}}">
    <i class="fas fa-fw fa-tasks"></i>
    <span>รับของเข้าระบบ</span></a>
</li>
@endif
@if (in_array( 'retirement.view', $Permissions))
<li class="nav-item  {{ request()->routeIs('retire*') ? 'active' : '' }} {{ request()->is('retirecreate') ? 'active' : '' }}" >
    <a class="nav-link" href="{{url('/retire')}}">
      <i class="fas fa-fw fa-file-export"></i>
      <span>จำหน่ายออก</span></a>
</li>
@endif


<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Heading -->
{{-- <div class="sidebar-heading">การบริหารสต๊อก</div> --}}
<!-- Nav Item - Master -->
@if (in_array( 'stock-management.view', $Permissions))
<li class="nav-item  {{ request()->routeIs('m_stock*') ? 'active' : '' }}" >
  <a class="nav-link" href="{{url('/m_stock')}}">
    <i class="fas fa-fw fa-boxes"></i>
    <span>ดูจำนวนวัสดุ/อุปกรณ์</span></a>
</li>
@endif
<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Heading -->
{{-- <div class="sidebar-heading">รายงาน</div> --}}
<!-- Nav Item - Master -->
@if (in_array( 'report.view', $Permissions))
<li class="nav-item    {{ request()->routeIs('report*') ? 'active' : '' }}  {{ request()->is('reportSearch') ? 'active' : '' }}" >
  <a class="nav-link" href="{{url('/report')}}">
    <i class="fas fa-fw fa-print"></i>
    <span>รายงาน</span></a>
</li>
@endif

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Heading -->
{{-- <div class="sidebar-heading">การจัดการข้อมูลระบบ</div> --}}
<!-- Nav Item - Master -->
<li class="nav-item 
{{request()->routeIs('materialgroup*')?'active':''}}
{{request()->routeIs('material*')?'active':''}}
{{request()->routeIs('unit*')?'active':''}}
{{request()->routeIs('location*')?'active':''}}
{{request()->routeIs('employee*')?'active':''}}
{{request()->routeIs('requester*')?'active':''}}
{{request()->routeIs('intype*')?'active':''}}
{{request()->routeIs('jobtype*')?'active':''}}
{{request()->routeIs('outtype*')?'active':''}}
{{request()->routeIs('jobstatus*')?'active':''}}
{{request()->routeIs('checkinstatus*')?'active':''}}
{{request()->routeIs('assetgroup*')?'active':''}}
{{request()->routeIs('assetmodel*')?'active':''}}
{{request()->routeIs('asset*')?'active':''}}
{{request()->routeIs('priority*')?'active':''}}
{{request()->routeIs('unit*')?'active':''}}
{{request()->routeIs('unit*')?'active':''}}
{{request()->routeIs('unit*')?'active':''}}
">
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>ข้อมูลตั้งต้นระบบ</span>
  </a>
  <div id="collapsePages" class="collapse aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">ข้อมูลตั้งต้นระบบ</h6>
      @if (in_array( 'materialgroup.view', $Permissions))
        <a class="collapse-item " href="{{url('/materialgroup')}}">ประเภทวัสดุ/อุปกรณ์</a>
      @endif
      @if (in_array( 'material.view', $Permissions))
        <a class="collapse-item " href="{{url('/material')}}">ข้อมูลวัสดุอุปกรณ์</a>
      @endif
      @if (in_array( 'unit.view', $Permissions))
        <a class="collapse-item" href="{{url('/unit')}}">หน่วยนับ</a>
      @endif
      @if (in_array( 'location.view', $Permissions))
        <a class="collapse-item " href="{{url('/location')}}">สถานที่</a>
      @endif
      @if (in_array( 'employee.view', $Permissions))
        <a class="collapse-item " href="{{url('/employee')}}">พนักงาน</a>
      @endif
      @if (in_array( 'requester.view', $Permissions))
        <a class="collapse-item " href="{{url('/requester')}}">ผู้แจ้ง</a>
      @endif
      @if (in_array( 'intype.view', $Permissions))
        <a class="collapse-item " href="{{url('/intype')}}">ประเภทการรับเข้า</a>
      @endif
      @if (in_array( 'jobtype.view', $Permissions))
        <a class="collapse-item " href="{{url('/jobtype')}}">ประเภทงาน</a>
      @endif
      @if (in_array( 'outtype.view', $Permissions))
        <a class="collapse-item " href="{{url('/outtype')}}">ประเภทการจำหน่ายออก</a>
      @endif
      @if (in_array( 'jobstatus.view', $Permissions))
        <a class="collapse-item " href="{{url('/jobstatus')}}">ประเภทสถานะงาน</a>
      @endif
      @if (in_array( 'checkinstatus.view', $Permissions))
        <a class="collapse-item " href="{{url('/checkinstatus')}}">สถานะรับเข้าอุปกรณ์</a>
      @endif
      @if (in_array( 'report.view', $Permissions))
        <a class="collapse-item " href="{{url('/assetgroup')}}">ประเภททรัพย์สิน</a>
      @endif
      @if (in_array( 'report.view', $Permissions))
        <a class="collapse-item " href="{{url('/assetmodel')}}">รุ่นทรัพย์สิน</a>
      @endif
      @if (in_array( 'report.view', $Permissions))
        <a class="collapse-item " href="{{url('/asset')}}">ทรัพย์สิน</a>
      @endif
      @if (in_array( 'priority.view', $Permissions))
        <a class="collapse-item " href="{{url('/priority')}}">ลำดับความสำคัญ</a>
      @endif
      <div class="collapse-divider"></div>
    </div>
  </div>
</li>

<li class="nav-item
{{request()->routeIs('company*')?'active':''}}
{{request()->routeIs('branch*')?'active':''}}
{{request()->routeIs('businessunit*')?'active':''}}
{{request()->routeIs('department*')?'active':''}}
{{request()->routeIs('module*')?'active':''}}
{{request()->routeIs('menu*')?'active':''}}
{{request()->routeIs('docnumber*')?'active':''}}
">
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="true" aria-controls="collapseSettings">
    <i class="fas fa-fw fa-cogs"></i>
    <span>ตั้งค่าระบบ</span>
  </a>
  <div id="collapseSettings" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">ตั้งค่าระบบ</h6>
      @if (in_array( 'company.view', $Permissions))
        <a class="collapse-item" href="{{url('/company')}}">บริษัท</a>
      @endif
      @if (in_array( 'branch.view', $Permissions))
        <a class="collapse-item " href="{{url('/branch')}}">สาขา</a>
      @endif
      @if (in_array( 'businessunit.view', $Permissions))
        <a class="collapse-item " href="{{url('/businessunit')}}">ประเภทธุรกิจ</a>
      @endif
      @if (in_array( 'department.view', $Permissions))
        <a class="collapse-item " href="{{url('/department')}}">แผนก</a>
      @endif
      @if (in_array( 'module.view', $Permissions))
        <a class="collapse-item " href="{{url('/module')}}">โมดูล</a>
      @endif
      @if (in_array( 'menupermission.view', $Permissions))
        <a class="collapse-item " href="{{url('/menu')}}">เมนู/สิทธิ์การใช้งาน</a>
      @endif
      @if (in_array( 'docnumber.view', $Permissions))
        <a class="collapse-item " href="{{url('/docnumber')}}">เลขเอกสาร</a>
      @endif
      <div class="collapse-divider"></div>
    </div>
  </div>
</li>

<li class="nav-item
{{request()->routeIs('user*')?'active':''}}
{{request()->routeIs('role*')?'active':''}}
{{request()->routeIs('log*')?'active':''}}
">
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-key"></i>
    <span>Authorization</span>
  </a>
  <div id="collapseUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Authorization</h6>
        @if (in_array( 'user.view', $Permissions))
          <a class="collapse-item" href="{{url('/user')}}"><span>ข้อมูลผู้ใช้งาน </span></a>
        @endif
        {{-- @if (in_array( 'role.view', $Permissions)) --}}
          <a class="collapse-item" href="{{url('/role')}}"><span>กลุ่มผู้ใช้งานระบบ </span></a>
        {{-- @endif --}}
        @if (in_array( 'log.view', $Permissions))
          <a class="collapse-item" href="{{url('/log')}}"><span>ประวัติการใช้งานระบบ </span></a>
        @endif
      <div class="collapse-divider"></div>
    </div>
  </div>
</li>
{{-- @if (in_array( 'user.view', $Permissions)) --}}
<!-- Divider -->
<hr class="sidebar-divider my-0">
</ul>
<!-- Heading -->
{{-- <div class="sidebar-heading">ผู้ใช้งานระบบ</div> --}}
<!-- Nav Item -->
{{-- <li class="nav-item" > --}}
    {{-- @if (in_array( 'user.view', $Permissions)) --}}
  {{-- <a class="nav-link" href="{{url('/user')}}">
    <i class="fas fa-fw fa-user-plus"></i>
    <span>ข้อมูลผู้ใช้งาน </span></a> --}}
    {{-- @endif --}}
{{-- </li>--}}

{{-- <li class="nav-item  " >
    <a class="nav-link" href="{{url('/role')}}">
      <i class="fas fa-fw fa-users"></i>
      <span>กลุ่มผู้ใช้งานระบบ </span></a>
  </li> --}}


<!-- End of Sidebar -->
