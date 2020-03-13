  <!-- Logout Modal-->
  <div class="modal fade" id="material_component_Modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="material_component_Modal-title">[modal_title]</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
<form method="POST" id="modalCreateFrm" name="">
<input type="hidden" name="_method" id="_method">
    <input type="hidden" name="id" id="id">
        <div class="modal-body">
            <div class="col-md-12">
                        @csrf
                        <div id="material_component_Modal-detail"></div>
          </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          {{-- <button type="submit" class="btn btn-success" id="joborder_modal_btnsave">
                                    {{ __('บันทึก') }}
          </button> --}}
        </div>
      </div>
      </form>
    </div>
  </div>
</div>