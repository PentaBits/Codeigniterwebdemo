$(document).ready(function(){
    
    var basepath = $("#basepath").val();
    
    $("#fileupldfrm").on("submit",function(e){
        e.preventDefault();
        
            var formData = new FormData($(this)[0]);
            $.ajax({
            type: "POST",
            url: basepath + 'multifileuploader/multipleFileUpload',
            dataType: "json",
            contentType: false,//"application/x-www-form-urlencoded; charset=UTF-8",
            processData: false,
            data:formData, 
            beforeSend: function() { 
                $('.sbmtbtn').hide();
                $('.prcbtn').show();
            },
            success: function (result) {
                if (result.msg_code == 0) {
                   $(".upload-err-msg") .show();
                } 
                else if(result.msg_code == 3)//select at least one file
                {
                    $(".fileselct-msg").show();
                    
                }
                else if(result.msg_code == 1)
                {
                    $("#msgdivsuccess").modal('show');
                    $("#successmsgText").html(result.msg_data);
                } 
                else if(result.msg_code==500){
                    window.location.href = basepath + 'memberlogin';
                }
            },
            complete: function() { 
                $('.sbmtbtn').show();
                $('.prcbtn').hide();
            },
            error: function (jqXHR, exception) {
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
    });
    $(".fileselct-msg-close").click(function(){
        $(".fileselct-msg").hide();
    });
    $(".err-msg-close").click(function(){
        $(".upload-err-msg") .hide();
    });
    
    $(".mdclose-fileuploader").click(function(){
        loadImageData(basepath);
    });
    $(".imagelist").click(function(){
        loadImageData(basepath);
    });
    
    $(document).on('click','.rmv-file',function(){
        var fileId=$(this).attr("id");
        $("#tempfileId").val(fileId);
    });
    
    $(document).on('click','.rmv-yes-file',function(){
        var fileId=$("#tempfileId").val()||"";
        
        $.ajax({
            type: "POST",
            url: basepath + 'multifileuploader/delete',
            dataType: "json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data:{fileId:fileId}, 
            beforeSend: function() { 
                
            },
            success: function (result) {
                if (result.msg_code == 0) {
                   alert("Error in remove");
                } 
                else if(result.msg_code == 1)
                {
                   loadImageData(basepath);
                } 
                else if(result.msg_code==500){
                    window.location.href = basepath + 'memberlogin';
                }
            },
            complete: function() { 
               
            },
            error: function (jqXHR, exception) {
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
    });
    
    
});
function loadImageData(basepath){
    $.ajax({
            type: 'POST',
            url: basepath + 'multifileuploader/getUploadedFiles',
            success: function (msg) {
                $("#uplddt").html(msg);
            },
            error: function (result)
            {
                $("#div_result").html("Error");
            },
            fail: (function (status) {
                $("#div_result").html("Fail");
            }),
            beforeSend: function (d) {
                $('#uplddt').html("<button class = 'btn btn-danger center-block processingbtn' >Data is loading... <i class='fa fa-spinner fa-spin'></i></button>");
            }

        }); 
}

