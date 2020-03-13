
    <!-- UserProfile Modal-->
    <div class="modal fade" id="changepassModal" tabindex="-1" role="dialog" aria-labelledby="modal-title-changepass" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-gradient-warning text-white">
          <h5 class="modal-title" id="modal-title-changepass">เปลี่ยนรหัสผ่าน</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="{{ route('password.update') }}" id="changepassword" class="changepassword" >
          @csrf
             <div class="modal-body">           
                  <div class="form-group row">
                      <label for="old_password" class="col-sm-4 col-form-label">รหัสผ่านเดิม : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="password" name="old_password" id="old_password" value="" class="form-control"    required minlength="6" maxlength="10" placeholder="Current Password">
                    </div>
                    </div>

                <div class="form-group row">
                      <label for="user_password" class="col-sm-4 col-form-label">รหัสผ่านใหม่ : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="password" name="user_password" id="user_password" value="" class="form-control"    required minlength="6" maxlength="10" placeholder="New Password">
                    </div>
                    </div>

                    <div class="form-group row">
                      <label for="user_repassword" class="col-sm-4 col-form-label">ยืนยันรหัสผ่านอีกครั้ง : <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="password" name="user_repassword" id="user_repassword" value="" class="form-control"    required  minlength="6" maxlength="10" placeholder="Confirm Password">
                    </div>
                    </div>
                   
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <button type="submit" class="btn btn-success" >ยืนยัน</button>
        </div>
        </form>
      </div>
    </div>
  </div>