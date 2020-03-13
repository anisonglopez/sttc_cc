  <!-- Logout Modal-->
  <div class="modal fade" id="CompanyModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">เพิ่มข้อมูลบริษัท</h5>
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
                    {{-- Row Left --}}
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Companies No.') }}</label><label class="text-danger">*</label>
                            <div class="col-md-7">
                                <input id="com_no" type="text" class="form-control" name="com_no" required>
                            </div>
                        </div>
                    </div>
                    {{-- Row Right --}}
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Short Name') }}</label><label class="text-danger">*</label>
                            <div class="col-md-6">
                                <input id="short_name" type="text" class="form-control" name="short_name" required>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Name TH') }}</label><label class="text-danger">*</label>
                            <div class="col-md-9">
                                <input id="name_th" type="text" class="form-control" name="name_th" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Name EN') }}</label><label class="text-danger">*</label>
                            <div class="col-md-9">
                                <input id="name_en" type="text" class="form-control" name="name_en" required>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Tax ID') }}</label>
                            <div class="col-md-7">
                                <input id="tax_id" type="text" class="form-control" name="tax_id">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Fax') }}</label>
                            <div class="col-md-7">
                                <input id="fax" type="text" class="form-control" name="fax">
                            </div>
                        </div>   
                    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Tel.') }}</label>
                            <div class="col-md-8">
                                <input id="tel" type="text" class="form-control" name="tel">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-8">
                                <input id="email" type="text" class="form-control" name="email">
                            </div>
                        </div>
                        
                    </div> 
                    </div>  
                    {{-- Row Right --}}
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Addess TH') }}</label>
                            <div class="col-md-9">
                                <input id="add_th" type="text" class="form-control" name="add_th">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Addess EN') }}</label>
                            <div class="col-md-9">
                                <input id="add_en" type="text" class="form-control" name="add_en">
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