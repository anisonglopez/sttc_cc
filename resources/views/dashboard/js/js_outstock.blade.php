
<script>
    $(document).ready(function() {
        
      $('#outstockdataTable').DataTable({
         "order": [[ 0, "desc" ]],
         "pageLength": 10,
         "processing": true,
         "serverSide": true,
         "stateSave": true,
         "ajax": {
             "url" : "{{url('dashboard_getdataoutstock') }}",
             "type": "POST",
             "data":{ _token: "{{csrf_token()}}"},
             "dataSrc":function(json) {
                console.log('ss')
                 console.log(json)
                 try{
                     var return_data = new Array();
                       for(var i=0;i< json.data.length; i++){               
                           const actions = '<a id="btn_edit" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-sm btn-outline-warning btnedit"><span class="fas fa-edit fa-fw"></a>' +
                                           '<a id="btn_delete" data-id="'+json.data[i]["id"]+'" href="#" class="btn btn-outline-danger btn-sm btndelete"><span class="fas fa-trash fa-fw"></a>'
                           const nulldesc = '-';
                           return_data.push({
                               'b_name'  : json.data[i]["b_name"],
                               'name'  : json.data[i]["name"],
                               'm_g_name'   : json.data[i]["m_g_name"],   
                               'min'   : json.data[i]["min"],
                               'status'   : json.data[i]["status"],
                               'desc'   : json.data[i]["desc"],
                               'qty_balance'   : json.data[i]["qty_balance"],
                               'actions' : actions,
                           })
                       }
                     console.log(return_data);
                     return return_data;
                 } catch(err) {
                         console.log(err.message)
                         console.log('error')
                     }
               },
         },
         "columns":[
                 { "data": "b_name" },
                 { "data": "m_g_name" },
                 { "data": "name" },
                 { "data": "min" },
                 { "data": "qty_balance" },
             ],
         'columnDefs': [
                 {
                   "targets": [0,2],
                   "className": "text-center",
                 },
                 
             ],
             
      });
     });
  
    </script>