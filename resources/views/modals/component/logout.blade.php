  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="modal-title-logout" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title-logout">คุณต้องการออกจากระบบใช่หรือไม่ </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">คลิกที่ปุ่ม "ออกจากระบบ" เพื่อออกโปรแกรม</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          {{-- <a class="btn btn-danger" href="../login/logout.php">ออกจากระบบ</a> --}}
          <a class="btn btn-danger" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           {{ __('ออกจากระบบ') }}
       </a>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
        </div>
      </div>
    </div>
  </div>