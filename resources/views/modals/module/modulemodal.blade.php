  <!-- Logout Modal-->
  <div class="modal fade" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Module</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
<form method="POST" id="modalCreateFrm">
<input type="hidden" name="_method" id="_method">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="role_id" id="role_id">
        <div class="modal-body">
            <div class="col-md-12">
                        @csrf 
                        <div class="form-group row">
                            <label for="role_name" class="col-md-4 col-form-label text-md-right">{{ __('Module') }}</label>
                            <div class="col-md-6">
                                <input id="module_name" type="text" class="form-control" name="module_name" required>
                            </div>
                        </div>


            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <button type="submit" class="btn btn-success" id="btnsave">
                                    {{ __('บันทึก') }}
          </button>
        </div>
      </div>
      </form>
    </div>
  </div>

  <script>

  </script>