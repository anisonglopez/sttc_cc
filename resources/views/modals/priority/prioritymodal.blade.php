  <!-- Logout Modal-->
  <div class="modal fade" id="PriorityModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">ประเภทวัสดุ/อุปกรณ์</h5>
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
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ') }}</label><label class="text-danger">*</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label><label class="text-danger">*</label>
                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control" name="code" required>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12">
                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Color Code') }}</label><label class="text-danger">*</label>
                              <div class="col-md-2">
                                  <input id="color_code" type="color" class="form-control" name="color_code" value="#ff0000" required>
                              </div>
                          </div>
                      </div> 
                      <div class="col-md-12">
                      <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Expire Date') }}</label><label class="text-danger">*</label>
                          <div class="col-md-2">
                              <input id="expire_date" type="number" class="form-control" name="expire_date" min="0" max="30" step="1" required>
                          </div>
                      </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('หมายเหตุ') }}</label>
                            <div class="col-md-6">
                                <input id="remark" type="text" class="form-control" name="remark">
                            </div>
                        </div>
                      </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                          <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('NotiFlag ') }}</label>
                          <div class="col-md-3">
                              <div class="material-switch mt-2 ml-1">
                                  <input id="status" name="status" type="checkbox" value="1"/>
                                  <label for="status" class="label-success"></label>
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
</div>