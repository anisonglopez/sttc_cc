@if (session('success'))
<div class="alert alert-success alert-dismissible fade show " role="alert">
  <strong>ทำรายการสำเร็จ</strong>
  <p>{{ session('success') }}</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if (session('error'))
<div class="alert alert-btn btn-danger alert-dismissible fade show" role="alert">
  <strong>ไม่สามารถทำรายการได้</strong>
  <p>{{ session('error') }}</p>
  <button type="button" class="close btn btn-danger" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif