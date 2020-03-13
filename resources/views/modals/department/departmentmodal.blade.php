  <!-- Logout Modal-->
  <div class="modal fade" id="DepartmentModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">แผนก</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
<form method="POST" id="modalCreateFrm">
<input type="hidden" name="_method" id="_method">
    <input type="hidden" name="id" id="id">
        <div class="modal-body">
            <div class="col-md-12">
                        @csrf
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Dep Code') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="dep_code" type="text" class="form-control" name="dep_code" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Name TH') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="name_th" type="text" class="form-control" name="name_th" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Name EN') }}</label>
                            <div class="col-md-6">
                                <input id="name_en" type="text" class="form-control" name="name_en">
                            </div>
                        </div>
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