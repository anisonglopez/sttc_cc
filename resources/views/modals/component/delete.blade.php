
    <!-- UserProfile Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modal-title-delete" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header bg-gradient-warning text-white">
              <h5 class="modal-title" id="modal-title-delete">ยืนยันการลบข้อมูล</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="POST" id="daleteFrm">         
            {{-- <input type="hidden" name="_method" id="_method" value="DELETE"> --}}
            @csrf
            @method('DELETE')
                 <div class="modal-body">     
                     <div class="row text-center">  
                     <div class="col-md-6">                        
                            <button type="submit" class="btn btn-danger" >ลบข้อมูล</button> 
                    </div>      
                    <div class="col-md-6">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
          
            </div>
            </form>
          </div>
        </div>
      </div>