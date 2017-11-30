/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
     var basepath = $("#basepath").val();
    
    
      $('.refreshCaptcha').on('click', function(){
            $.get( basepath+'contactus/captchaRefresh', function(data){
                $('#captImg').html(data);
            });
        });
        
      $("#frmcontactus").on("submit",function(e){
         
        e.preventDefault();
       
        var email = $("#contpersonemail").val()||"";
        
        if(validateContactform()){
            
            if(checkContactEmail(email)){
                
            var formData = new FormData($(this)[0]);
                

               
                
            $.ajax({
            type: "POST",
            url: basepath + 'contactus/sendMail',
            dataType: "json",
            contentType: false,//"application/x-www-form-urlencoded; charset=UTF-8",
            processData: false,
            data:formData,   
            success: function (result) {
                if (result.msg_code == 0) {
                   $("#msgdivsuccess").modal('show');
                   $("#successmsgText").html(result.msg_data);

                } 
                else if(result.msg_code == 400)//captcha code error
                {
                    $(".captcha-err-msg").show();
                    $("#captchaerrrmsg").html(result.msg_data);
                }
                else if(result.msg_code == 1)//save success full.
                {
                    $("#msgdivsuccess").modal('show');
                    $("#successmsgText").html(result.msg_data);
                } 
                else if(result.msg_code==500){
                    window.location.href = basepath + 'memberlogin';
                }
            }, error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
            }
        });
            }else{
                $(".emailvalidation-msg").show();
            }
        }else{
            $(".validation-msg").show();
        }//validation
        
        
    });  
    
      $(".mdclose-contactus").click(function(){
         window.location.href = basepath + 'contactus';
        
    });
});

function validateContactform(){
    
    var name = $("#contpersonname").val()||"";
    var email = $("#contpersonemail").val()||"";
    
    if(name==""){return false;}
    if(email==""){return false;}
    
    return true;
}

function checkContactEmail(sEmail){
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {

        return false;

    }
}
