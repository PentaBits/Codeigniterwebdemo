/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    var basepath = $("#basepath").val();
    $("#productlist").DataTable({
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

    $(document).on("click", ".delprod", function () {
        var productid = $(this).attr("id");
        $("#hdproductid").val(productid);
    });

    $(document).on("click", ".del-product-yes", function () {
//    alert('yes');
        var transactionId = $("#hdproductid").val();
        window.location.href = basepath + 'product/delete/id/' + transactionId;
    });


    $("#frmprodct").on("submit", function (e) {

        e.preventDefault();

        if (validateProductform()) {
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: basepath + 'product/saveproduct',
                dataType: "json",
                contentType: false, //"application/x-www-form-urlencoded; charset=UTF-8",
                processData: false,
                data: formData,
                success: function (result) {
                    if (result.msg_code == 0) {
                        $("#msgdivsuccess").modal('show');
                        $("#successmsgText").html(result.msg_data);
                    }
                    else if (result.msg_code == 1)//save success full.
                    {
                        $("#msgdivsuccess").modal('show');
                        $("#successmsgText").html(result.msg_data);
                    }
                    else if (result.msg_code == 500) {
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

        } else {
            $(".validation-msg").show();
        }//validation
    });

$(".mdclose-product").click(function(){
         window.location.href = basepath + 'product';
        
    });


//

//cancel add/edit operation
    $("#prodcancel").click(function () {
        window.location.href = basepath + 'productcategory';
    });


});

function validateProductform(){
    
    var productname = $("#product").val() || "";
    var productunit = $("#produnit").val()|| "";
    var productcatg = $("#productcat").val()||"";
    if (productname == "") {return false;}
    if(productunit==""){return false;}
    if(productcatg==""){return false;}
    
  return true;
}