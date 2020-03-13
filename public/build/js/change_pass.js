$( "form.changepassword" ).on( "submit", function( event ) {
    event.preventDefault();
    var form = $(this);
      console.log( $( this ).serialize() );
    $('#UserProfileModal').modal('hide');
    $('#UserProfileMsgboxModal').modal('show');
    $.ajax({
        type: "POST",
        url: "../change_pass/ajax/change_pass.php",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {   
            document.getElementById("old_password").value = '';
            document.getElementById("user_password").value = '';
            document.getElementById("user_repassword").value = '';
            console.log(data);
             if(data == 'incorrect_pass'){
                document.getElementById("changePass_txt").innerHTML = 'รหัสผ่านเดิม ไม่ถูกต้อง';
             }else if(data == 'pass_not_match'){
                document.getElementById("changePass_txt").innerHTML = 'รหัสผ่านไม่สามารถเข้ากันได้  กรุณาระบุรหัสผ่านใหม่ให้ตรงกัน';
             }else if(data == 'success'){
                document.getElementById("changePass_txt").innerHTML = 'เปลี่ยนรหัสผ่านสำเร็จ';
             }else if(data == 'error'){
                document.getElementById("changePass_txt").innerHTML = 'Error';
            }
        }
      });
  });