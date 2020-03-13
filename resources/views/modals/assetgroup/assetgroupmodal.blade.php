  <!-- Logout Modal-->
  <div class="modal fade" id="AssetgroupModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">ประเภททรัพย์สิน</h5>
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
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('สาขา') }}</label><label class="text-danger">*</label>
                        <div class="col-md-6">
                        <select name="branch_id" id="branch_id" required class="form-control">
                            <option value="">Select</option>
                                @foreach($data1 as $row)
                                    <option value="{{$row->id}}"> {{$row->short_name}}</option>
                                @endforeach
                        </select>
                        </div>
                      </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Assetgroup Name') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Useful') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="useful" type="text" class="form-control" name="useful" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Depreciation Rate') }}</label><label class="text-danger">*</label>
                          <div class="col-md-6">
                              <input id="depreciation_rate" type="text" class="form-control" name="depreciation_rate" required>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <input id="desc" type="text" class="form-control" name="desc" >
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