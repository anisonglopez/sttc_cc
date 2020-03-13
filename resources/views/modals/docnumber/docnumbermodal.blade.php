  <!-- Logout Modal-->
  <div class="modal fade" id="docnumberModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
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
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('ชื่อโมดูล') }}</label><label class="text-danger">*</label>
                            <div class="col-md-9">
                            <select name="module_id" id="module_id" required class="form-control">
                                <option value="">Select</option>
                                    @foreach($data2 as $row)
                                        <option value="{{$row['id']}}"> {{$row['module_name']}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('คำอธิบาย') }}</label>
                            <div class="col-md-9">
                                <input id="desc" type="text" class="form-control" name="desc">
                            </div>
                        </div>
                        </div>
                    </div>   

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Prefix') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="prefix" type="prefix" class="form-control" name="prefix" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Start num') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="start_num" type="prefix" class="form-control" name="start_num" required>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Length num') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="length_num" type="number" class="form-control" name="length_num" min="0" max="10"step="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('End num') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="end_num" type="prefix" class="form-control" name="end_num" required>
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