/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    var basepath = $("#basepath").val();
    
    
    $('#emplist').DataTable({
    "ordering": true,
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    },
    'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': [-1] /* 1st one, start by the right */
    }]
    });
    
   $(document).on('click', '.valid-alert-close', function() {
       $(this).parent().hide();
   });
   
   $(document).on('click', '.email-alert-close', function() {
       $(this).parent().hide();
   });
   
   $("#empmobile").keydown(function (event) {
    var num = event.keyCode;
    if ((num > 95 && num < 106) || (num > 36 && num < 41) || num == 9) {
        return;
    }
    if (event.shiftKey || event.ctrlKey || event.altKey) {
        event.preventDefault();
    } else if (num != 46 && num != 8) {
        if (isNaN(parseInt(String.fromCharCode(event.which)))) {
            event.preventDefault();
        }
    }
});

$(document).on("click",".delemp",function(){
    
    var employeeid= $(this).attr("id");
    $("#tempempid").val(employeeid);
});

$(document).on("click",".del-yes",function(){
    //alert('yes');
    var transactionId= $("#tempempid").val();
    
     window.location.href = basepath + 'demolist/delete/id/'+transactionId;
});






   
    //dateofentry
    $('#dateofbirth').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        forceParse: false
    });
    
    $("#frmDemo").on("submit",function(e){
        e.preventDefault();
        var employeeid=$("#hdemployeeid").val()||"";
        var firsname = $("#firstname").val()||"";
        var lastname = $("#lastname").val()||"";
        var sex =  $('input[name=optionsex]:checked').val();
        var dateofbirth = $("#dateofbirth").val()||"";
        var empmobile = $("#empmobile").val()||"";
        var email = $("#empemail").val()||"";
        var department = $("#department").val()||"";
        //var frmObject=$("#frmDemo");
        
        
        if(validateform()){
            
            if(checkEmail(email)){
                
            var formData = new FormData($(this)[0]);
                

               
                
            $.ajax({
            type: "POST",
            url: basepath + 'demolist/saveEmployee',
            dataType: "json",
            contentType: false,//"application/x-www-form-urlencoded; charset=UTF-8",
            processData: false,
            data:formData,   
            success: function (result) {
                if (result.msg_code == 0) {
                   $("#msgdivsuccess").modal('show');
                   $("#successmsgText").html(result.msg_data);

                } 
                else if(result.msg_code == 400)//image uplaod error
                {
                    $(".uploaderror-msg").show();
                    $("#fileerrmsg").html(result.msg_data);
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
    
    $(".mdclose").click(function(){
         window.location.href = basepath + 'demolist';
        
    });
    
    $("#empCancel").click(function(){
        window.location.href = basepath + 'demolist';
    });
    $("#imgEmp").change(function () {
        
        readImageUrl(this);
    });
});

function validateform(){
    
    var firsname = $("#firstname").val()||"";
    var empmobile =$("#empmobile").val()||"";
    var email = $("#empemail").val()||"";
    
    if(firsname==""){return false;}
    
    if(empmobile==""){return false;}
    
    if(email==""){return false;}
    
    return true;
}

function checkEmail(sEmail){
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {

        return false;

    }
}

function readImageUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#empimagepreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}