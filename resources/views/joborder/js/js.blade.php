<script>
    let MaterialDataTable = $('#MaterialdataTable').DataTable({
        "paging":false,
        //  destroy:true,
        "columnDefs": [
            {
            "targets": [0,1,2,3,4,6],
            "className": "text-center",
        },
        ],
    });
    let AssetDataTable = $('#AssetdataTable').DataTable({
        "paging":false,
        //  destroy:true,
        "columnDefs": [
            // { "width": "15%", "targets": 0 },
            // { "width": "15%", "targets": 1 },
            // { "width": "15%", "targets": 2 },
            {
            "targets": [0,1,2,3],
            "className": "text-center",
        },
        ],
    });
    //  ------  btn onclick area  --------
$('#search_location_btn').click(function () {
    event.preventDefault(); 
    $.ajax({
        type: "POST",
        url: "{{url('joborder_getlocation') }}",
        data: { _token: "{{csrf_token()}}"}, // serializes the form's elements.
        success: function(data)
        {
            console.log(data)
            response_modal(data)
        }
      });  
});
$(document).ready(function(){
  $(document).ajaxError(function(){
    alert("กรุณาเลือกสาขาก่อนดำเนินการต่อ");
  });
$('#search_asset_owner_dep_id_btn').click(function () {
    event.preventDefault(); 
    let branch_id = $('#branch').val();
    $.ajax({
        type: "POST",
        url: "{{url('joborder_getrequest_by') }}",
        data: { _token: "{{csrf_token()}}",branch_id : branch_id}, // serializes the form's elements.
        success: function(data)
        {
            console.log(data)
            response_modal(data)
        }
      });  
});
$('#search_assign_as_btn').click(function () {
    event.preventDefault(); 
    let branch_id = $('#branch').val();
    $.ajax({
        type: "POST",
        url: "{{url('joborder_getassign_as') }}",
        data: { _token: "{{csrf_token()}}", branch_id : branch_id}, // serializes the form's elements.
        success: function(data)
        {
            console.log(data)
            response_modal(data)
        }
      });  
});

$('#search_assignee_btn').click(function () {
    event.preventDefault(); 
    let branch_id = $('#branch').val();
    $.ajax({
        type: "POST",
        url: "{{url('joborder_getassignee') }}",
        data: { _token: "{{csrf_token()}}", branch_id : branch_id}, // serializes the form's elements.
        success: function(data)
        {
            
            console.log(data)
            response_modal(data)
        }
      });  
});

$('#add_material_btn').click(function () {
    event.preventDefault(); 
    let branch_id = $('#branch').val();
    $.ajax({
        type: "POST",
        url: "{{url('joborder_getmaterial') }}",
        data: { _token: "{{csrf_token()}}" , branch_id : branch_id}, // serializes the form's elements.
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
        url: "{{url('joborder_getasset') }}",
        data: { _token: "{{csrf_token()}}" , branch_id : branch_id}, // serializes the form's elements.
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
    $('#joborder_component_Modal').modal('show'); 
    $('#joborder_component_Modal-title').html(data.title);
    $('#joborder_component_Modal-detail').html(data.table);
          document.getElementById("modalCreateFrm").name = data.frmAction;
          let frmAction = data.frmAction;
          let table = $('#component_datatable_modal').DataTable({});
                $('#component_datatable_modal tbody').on( 'click', '.btnmodal_add', function () {
                    let data_value =this.getAttribute('data-value');
                    let data_id =this.getAttribute('data-id');
                    let RowIndex = $(this).closest('tr')
                    let dataRow = table.row(RowIndex).data()
                    console.log(dataRow)
                    modal_embed_data(frmAction, data_value, data_id, dataRow);
                });
}

    //  ------   manage form action  area  --------
    function modal_embed_data(frmAction, data_value, data_id, dataRow) {
    event.preventDefault(); 
    console.log(frmAction)
    switch(frmAction) {
        
        case "formLocation":
                $('#location_name').val(data_value); 
            break;
        case "formRequest_by":
                $('#request_by').val(data_id); 
                $('#request_by_text').val(data_value); 
            break;
        case "formAssign_as":
                $('#assign_as').val(data_id); 
                $('#assign_as_text').val(data_value); 

            break;
        case "formAssignee":
                $('#assignee').val(data_id); 
                $('#assignee_text').val(data_value); 
            break;
        case "formMaterial":
                // $('#material_name').val(data_value); 
                let _id =  data_id
                let material_no = dataRow[1]
                let material_group = dataRow[2]
                let material_name = dataRow[3]
                let qty_balance = dataRow[4]
                if (qty_balance == ''){qty_balance=0}
                    MaterialDataTable.row.add([
                       material_no + '<input type="hidden" class="m_id" name="m_no[]" value="'+material_no+'"/>' ,
                        '<input type="hidden" name="_id[]" value=""/>'+material_group + '<input type="hidden" class="m_id" name="m_id[]" value="'+_id+'"/>' + '<input type="hidden" name="stock_transaction" value="out"/>',
                        material_name,
                        '<input type="number" class="qty_out form-control form-control-sm border border-success " name="qty_out[]" value="0" min="1" max="'+qty_balance+'" step="1" style="text-align:right;" required/>',
                        qty_balance + '<input type="hidden" name="stock_balance_as[]" value="'+qty_balance+'"/>',
                        '<input type="text" class="reason form-control form-control-sm border border-success " name="reason[]" value=""/>',
                        '<button class="btn btn-outline-danger btn-sm tempbtndelete"><span class="fas fa-trash fa-fw"></span></button>',
                    ]).draw(false)
            break;

        case "formAsset":
            let asset_id = dataRow[0]
            let asset_owner = dataRow[1]
            let asset_status = dataRow[2]
            let asset_no = dataRow[3]
            let asset_m_no = dataRow[4]
            let serial_no = dataRow[5]
            AssetDataTable.row.add([
                  asset_no,
                  asset_m_no,
                  asset_status,
                  serial_no,
                  '<button  href="#" class="btn btn-outline-danger btn-sm tempbtndelete"><span class="fas fa-trash fa-fw"></span></button>',
              ]).draw(false)
          console.log("hello")
            break;
        // case y:
        //     // code block
        //     break;
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
        url: "{{url('joborder')}}" + '/' + _id + '/delete',
        data: { _token: "{{csrf_token()}}"}, // serializes the form's elements.
        success: function(data)
        {
             console.log(data)
        }
      });  
      }
});

$('#AssetdataTable tbody').on( 'click', '.tempbtndelete', function (event) {
    event.preventDefault();
      var result = confirm("Want to delete?");   if (result) {
      var _id = $(this).data('id');
      console.log(_id);
      var RowIndex = $(this).closest('tr');
      AssetDataTable
      .row( $(this).parents('tr') )
      .remove()
      .draw();
      $.ajax({
        type: "POST",
        url: "{{url('joborder')}}" + '/' + _id + '/delete',
        data: { _token: "{{csrf_token()}}"}, // serializes the form's elements.
        success: function(data)
        {
             console.log(data)
        }
      });  
      }
});
</script>