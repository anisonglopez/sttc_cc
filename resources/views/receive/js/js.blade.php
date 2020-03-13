<script>
            let MaterialDataTable = $('#MaterialdataTable').DataTable({
                    "paging":false,
                    //  destroy:true,
                    "columnDefs": [
                        // { "width": "15%", "targets": 0 },
                        // { "width": "50%", "targets": 1 },
                        // { "width": "15%", "targets": 2 },
                        // { "width": "15%", "targets": 3 },
                        {
                      "targets": [0,1,3],
                      "className": "text-center",
                    },
                    ],
                });
            let AssetDataTable = $('#AssetdataTable').DataTable({
                    "paging":false,
                    //  destroy:true,
                    "columnDefs": [
                        { "width": "15%", "targets": 0 },
                        { "width": "15%", "targets": 1 },
                        { "width": "15%", "targets": 2 },
                        { "width": "15%", "targets": 3 },
                        { "width": "15%", "targets": 4 },
                        { "width": "15%", "targets": 5 },
                        { "width": "15%", "targets": 6 },
                        {
                        "targets": [0,1,2,3,5,6],
                        "className": "text-center",
                    },
                    ],
                });
    //  ------  btn onclick area  --------
$(document).ready(function(){
  $(document).ajaxError(function(){
    alert("กรุณาเลือกสาขาก่อนดำเนินการต่อ");
  });    
$('#add_material_btn').click(function () {
    event.preventDefault(); 
    let branch_id = $('#branch').val();
    $.ajax({
        type: "POST",
        url: "{{url('receive_getmaterial') }}",
        data: { _token: "{{csrf_token()}}", branch_id : branch_id}, // serializes the form's elements.
        success: function(data)
        {
            console.log(data)
            response_modal(data)
        }
      });  
    });
$('#add_asset_btn').click(function () {
    event.preventDefault(); 
    let branch_id = $('#branch').val();
    $.ajax({
        type: "POST",
        url: "{{url('receive_getasset') }}",
        data: { _token: "{{csrf_token()}}", branch_id : branch_id}, // serializes the form's elements.
        success: function(data)
        {
            console.log(data)
            response_modal(data)
        }
      });  
    });
});
    //  ------  when ajax return area  --------
function response_modal(data){
    $('#material_component_Modal').modal('show'); 
    $('#material_component_Modal-title').html(data.title);
    $('#material_component_Modal-detail').html(data.table);
          document.getElementById("modalCreateFrm").name = data.frmAction;
            let frmAction = data.frmAction;
            let table = $('#component_datatable_modal').DataTable({});
                $('#component_datatable_modal tbody').on( 'click', '.btnmodal_add', function () {
                    let data_value =this.getAttribute('data-value');
                    let data_id =this.getAttribute('data-id');
                    let RowIndex = $(this).closest('tr')
                    let dataRow = table.row(RowIndex).data()
                    console.log(dataRow)
                    modal_embed_data(frmAction,data_id, data_value, dataRow);
                });
}
    //  ------   manage form action  area  --------
    function modal_embed_data(frmAction,data_id, data_value ,dataRow) {
    event.preventDefault(); 
    console.log(frmAction)
    switch(frmAction) {
        case "formMaterial":
                // $('#material_name').val(data_value); 
                let _id =  data_id
                let material_no = dataRow[1]
                let material_group = dataRow[2]
                let material_name = dataRow[3]
                let qty_balance = dataRow[4]
                var dupflag = 0 ;
                $('#MaterialdataTable > tbody > tr').each(function(index,tr){
                    let material_id = $(this).find(".m_id").val()
                    console.log("TEST  " + _id + " ==?? " + material_id)
                    if (_id == material_id){
                        alert("รายการซ้ำ")
                        dupflag = 1;
                        return;
                    }
                });
                if (qty_balance == ''){qty_balance=0}
                if (dupflag != 1){
                    MaterialDataTable.row.add([
                        material_no + '<input type="hidden" class="m_id" name="m_no[]" value="'+material_no+'"/>' ,
                        '<input type="hidden" name="_id[]" value=""/>'+material_group + '<input type="hidden" class="m_id" name="m_id[]" value="'+_id+'"/>' + '<input type="hidden" name="stock_transaction" value="in"/>',
                        material_name,
                        '<input type="number" class="qty_in form-control form-control-sm border border-success" name="qty_in[]" value="0" min="1" step="1" style="text-align:right;"/>',
                        qty_balance + '<input type="hidden" name="qty_balance_as[]" value="'+qty_balance+'"/>',
                        '<button  href="#" class="btn btn-outline-danger btn-sm tempbtndelete"><span class="fas fa-trash fa-fw"></span></button>',
                    ]).draw(false)
                }
        break;
        case "formAsset":
            let asset_id = dataRow[0]
            let asset_owner = dataRow[1]
            let asset_status = dataRow[2]
            let asset_no = dataRow[3]
            let asset_m_no = dataRow[4]
            let serial_no = dataRow[5]
            let qty_balances = dataRow[6]
            AssetDataTable.row.add([
                  // '<input type="hidden" name="asset_id[]" value=""/>'+asset_owner + '<input type="hidden" class="a_id" name="a_id[]" value="'+asset_id+'"/>' + '<input type="hidden" name="asset_transaction" value="in"/>',
                  asset_id,
                  asset_owner,
                  asset_status,
                  asset_no,
                  asset_m_no,
                  serial_no,
                  qty_balances + '<input type="hidden" name="qty_balance_as[]" value="0"/>',
                  '<button  href="#" class="btn btn-outline-danger btn-sm tempbtndelete"><span class="fas fa-trash fa-fw"></span></button>',
              ]).draw(false)
          console.log("hello")
            break;
    //  case y:
    //      code block
    //  break;
    }
    $('#joborder_component_Modal').modal('hide');
}

//---------- Delete Event ---------
  $('#MaterialdataTable tbody').on( 'click', '.tempbtndelete', function (event) {
    event.preventDefault();
      var result = confirm("Want to delete?");   if (result) {
      var _id = $(this).data('id');
      console.log(_id);
      var RowIndex = $(this).closest('tr');
        MaterialDataTable
      .row( $(this).parents('tr') )
      .remove()
      .draw();
      $.ajax({
        type: "POST",
        url: "{{url('receive')}}" + '/' + _id + '/delete',
        data: { _token: "{{csrf_token()}}"}, // serializes the form's elements.
        success: function(data)
        {
             console.log(data)
        }
      });  
      }
});
</script>