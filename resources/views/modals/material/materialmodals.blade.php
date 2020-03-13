  <!-- Logout Modal-->
  <div class="modal fade" id="materialModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">เพิ่มข้อมูลประเภทวัสดุอุปกรณ์</h5>
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
                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('หน่วยงาน') }}</label><label class="text-danger">*</label>
                            <div class="col-md-7">
                            <select name="branch_id" id="branch_id" required class="form-control">
                                <option value="">Select</option>
                                    @foreach($data4 as $row)
                                        <option value="{{$row->id}}"> {{$row->short_name}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Material No') }}</label><label class="text-danger">*</label>
                            <div class="col-md-7">
                                <input id="m_no" type="text" class="form-control" name="m_no" required disabled>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ประเภทวัสดุอุปกรณ์') }}</label><label class="text-danger">*</label>
                            <div class="col-md-7">
                            <select name="m_g_id" id="m_g_id" required class="form-control">
                                <option value="">Select</option>
                                    @foreach($data2 as $row)
                                        <option value="{{$row['id']}}"> {{$row['name']}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-12">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('ชื่อวัสดุอุปกรณ์') }}</label><label class="text-danger">*</label>
                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" required>
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
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('หน่วยนับ') }}</label><label class="text-danger">*</label>
                                <div class="col-md-6">
                                <select name="unit_id" id="unit_id" required class="form-control">
                                    <option value="">Select</option>
                                        @foreach($data3 as $row)
                                            <option value="{{$row['id']}}"> {{$row['name_th']}}</option>
                                        @endforeach
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Min') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="min" type="number" class="form-control" name="min" min="0" step="1" required>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('สถานะ') }}</label>
                                <div class="col-md-6">
                                    <div class="material-switch mt-2 ml-1">
                                        <input id="status" name="status" type="checkbox" value="1" checked/>
                                        <label for="status" class="label-success"></label>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Max') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="max" type="number" class="form-control" name="max" min="0" step="1" required>
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