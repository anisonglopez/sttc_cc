@extends('layout.template')

{{-- For  Content . Blade --}}
@section('content')
@include('components.alertbox')
<h3>จัดการกลุ่มผู้ใช้งาน</h3>
<!-- Default Card Example -->
<div class="card mb-4">
<div class="card-header">
<div class="row">
<div class="col-md-6 font-weight-bold text-primary">

</div>
<div class="col-md-6 text-right">
    @if (in_array( 'role.create', $Permissions))
     <a href="#"  class="btn btn-facebook" id="create">Create</a>
    @endif
</div>
</div>        
</div>

<!-- end card header -->
<div class="card-body">
<div class="col-md-12">
<div class="table-responsive">
 {{-- {{Auth::user()->isAdmin()}} --}}
 {{-- @if($user->status =='waiting') @endif --}}
     <table class="table table-bordered table-hover table-sm " id="dataTable">
         <thead class="text-center">
             <tr>
                     <th>หน่วยงาน</th>
                     <th>กลุ่มผู้ใช้งาน</th>
                     <th>คำอธิบาย</th>
                     <th>#</th>
             </tr>
          </thead>
          <tbody>
          @foreach($data as $row)
          <tr>              
                    <td>{{$row->short_name}}</td>
                     <td>{{$row->role_name}}</td>
                     <td>{{$row->desc}}</td>
                     <td class="text-center">
                        {{-- @if (in_array( 'role.edit', $Permissions)) --}}
                                <a id="btn_edit" data-id="{{$row->id}}" href="#" class="btn btn-sm btn-outline-warning btnedit"><span class="fas fa-edit fa-fw"></a>
                        {{-- @endif    --}}
                        @if (in_array( 'role.delete', $Permissions))
                                <a id="btn_delete" data-id="{{$row->id}}" href="#" class="btn btn-outline-danger btn-sm btndelete"><span class="fas fa-trash fa-fw"></a>
                        @endif
                       </td>
             </tr>
             @endforeach
          </tbody>
     </table>
</div>
</div>
</div>
</div>

@endsection
{{-- For Script Javascript --}}
@section('js')
<script>
var table = $('#dataTable').DataTable({
   stateSave: true,
});
        $('#create').click(function () {
            document.getElementById('modal-title').innerHTML = 'สร้างข้อมูลกลุ่มผู้ใช้งาน';
            $('#modalCreateFrm').trigger("reset");
            $('#_method').val("");
              $('#roleModal').modal('show');
              document.getElementById("modalCreateFrm").action = "{{url('role')}}";
          });

    $('#dataTable tbody').on( 'click', '.btnedit', function () {
        $('#modalCreateFrm').trigger("reset");
      event.preventDefault();
      var _id = $(this).data('id');
      $.get('role/' + _id +'/edit', function (data) {
          console.log(data);
        document.getElementById('modal-title').innerHTML = 'แก้ไขข้อมูลกลุ่มผู้ใช้งาน';
        $('#roleModal').modal('show');
          $('#role_name').val(data['data'].role_name);
          $('#desc').val(data['data'].desc);
          document.getElementById("modalCreateFrm").action = "{{url('role')}}" + '/' + _id
          $('#_method').val("PATCH");
          $('#branch_id').val(data['data'].branch_id);

var codesChk = document.getElementsByClassName('code');
var data2 = data['data2'];
        for (x in data2) {
            for(var i=0; codesChk[i]; ++i){
                if (data2[x].code == codesChk[i].value){
                    codesChk[i].checked = true
                }
            }
        }
      })
  });


$('#dataTable tbody').on( 'click', '.btndelete', function () {
        event.preventDefault();
        var _id = $(this).data('id');
        $('#deleteModal').modal('show');
        document.getElementById("daleteFrm").action = "{{url('role')}}" + '/' + _id
});
</script>
@endsection
{{-- For  Modal --}}
@section('modal')
@include('modals.role.rolemodal')
@include('modals.component.delete')
@endsection