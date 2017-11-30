/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    var basepath = $("#basepath").val();
    
    
    
    $('#prodcatlist').DataTable({
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
    
    
    
    $("#frmcatg").on("submit",function(e){
        
        e.preventDefault();
        
        if(validateCatgform()){
            var formData = new FormData($(this)[0]);
            $.ajax({
            type: "POST",
            url: basepath + 'productcategory/savecategory',
            dataType: "json",
            contentType: false,//"application/x-www-form-urlencoded; charset=UTF-8",
            processData: false,
            data:formData,   
            success: function (result) {
                if (result.msg_code == 0) {
                   $("#msgdivsuccess").modal('show');
                   $("#successmsgText").html(result.msg_data);
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
            $(".validation-msg").show();
        }//validation
    });
    
 
    
$(document).on("click",".delcatg",function(){
    var productcatgid= $(this).attr("id");
    $("#prodcatgtmpid").val(productcatgid);
});

$(document).on("click",".del-prodctg-yes",function(){
//    alert('yes');
    var transactionId= $("#prodcatgtmpid").val();
    window.location.href = basepath + 'productcategory/delete/id/'+transactionId;
});


   //save successfull yes click
  $(".mdclose-prodcatg").click(function(){
         window.location.href = basepath + 'productcategory';
        
    });


//cancel add/edit operation
    $("#catgcancel").click(function () {
        window.location.href = basepath + 'productcategory';
    });






    
});

function validateCatgform(){
    
    var catgname = $("#catg").val() || "";
   
    if (catgname == "") {
        return false;
    }
  return true;
}
