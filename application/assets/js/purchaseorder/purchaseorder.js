/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
  var basepath = $("#basepath").val();
    $('#podt').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        forceParse: false
    });
    
   $("#polist").DataTable({
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
    
    //delete area
    $(document).on("click", ".delpo", function () {
        var purchaseorderid = $(this).attr("id");
        $("#temppurchaseorderid").val(purchaseorderid);
    });

    $(document).on("click", ".del-po-yes", function () {
//    alert('yes');
        var transactionId = $("#temppurchaseorderid").val();
        window.location.href = basepath + 'purchaseorder/delete/id/' + transactionId;
    });
    
    
    
    
    
  $(document).on('click','.dtl-add',function(){
      //dtl-table
      var productname= $("#item :selected").text();
      var productId =  $("#item").val()||"";
      var unit=$("#itemunit").val()||"";
      var qty = $("#itemqty").val()||"";
      var rate = $("#itemrate").val()||"";
      var itemamount =  $("#itemamt").val()||"";
      var row ="<tr>"+
              "<td style='display:none'>"+productId+"</td>"+
              "<td>"+productname+"</td>"+
              "<td>"+unit+"</td>"+
              "<td>"+qty+"</td>"+
              "<td>"+rate+"</td>"+
              "<td>"+itemamount+"</td>"+
              "<td><button type='button' class='btn btn-danger btn-sm dtl-del'>Del</button></td>";
     
//      console.log(productId+"--"+itemamount);
      
      if(productId!=""  && itemamount!=0){
         $(".dtl-table").append(row);
         getsubtotal();
       }
     
      clearDtlFields();
  });
   $(".dtl-table").on("click", ".dtl-del", function () {
        $(this).closest("tr").remove();
        getsubtotal();
    });
  $("#itemqty").blur(function(){
      getItemAmount();
  });
  $("#itemrate").blur(function(){
      getItemAmount();
  });
  
  $("#posave").click(function(){
      var poid=$("#poid").val()||"";
      var pono=$("#pono").val()||"";
      var podate = $("#podt").val()||"";
      var vaendor = $("#vendor").val()||"";
      var totalAmount = $("#subtotal").val()||"";
      var podtl=getDetailJson();
      
      var data={
          "poid":poid,
          "pono":pono,
          "podate":podate,
          "vaendor":vaendor,
          "totalAmount":totalAmount,
          "podtl":podtl
      };
      console.log(JSON.stringify(data) );
      var dtlData =JSON.stringify(data);
      if(validateProdform()){
         $.ajax({
            type: "POST",
            url: basepath + 'purchaseorder/purchaseordersave',
            dataType: "json",
            contentType: "application/json",
            data: dtlData,
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
    }else{
         $(".validation-msg").show();
    }
      
      
  });
  
  
    $(".mdclose-purorder").click(function(){
         window.location.href = basepath + 'purchaseorder';
        
    });
    
    $("#pocancel").click(function(){
        window.location.href = basepath + 'purchaseorder';
    });
  
  
  
    $("#item").change(function () {
        var productId = $("#item").val() || "";
        if (productId != "") {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: basepath + "purchaseorder/getUnitByProduct",
                data: {productId: productId},
                success: function (data) {

                    if (data.msg_code == 1) {
                        $("#itemunit").val();
                        $("#itemunit").val(data.msg_data);
                        $("#itemqty").focus();
                    } else if (data.msg_code == 500) {
                        window.location.href = basepath + 'memberlogin';
                    }
                },
                complete: function () {
                },
                error: function (e) {
                    //called when there is an error
                    console.log(e.message);
                }
            });
        }
    });
    
    
    $('.decimalbox').keypress(function (event) {
            return isNumber(event, this)
        });
    
    
  
});

function isNumber(evt, element) {

    var charCode = (evt.which) ? evt.which : event.keyCode

    if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) && // “-” CHECK MINUS, AND ONLY ONE.
            (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57))
        return false;

    return true;
    }    



function validateProdform(){
    
      var pono=$("#pono").val()||"";
      var podate = $("#podt").val()||"";
      var vaendor = $("#vendor").val()||"";
      var totalAmount = $("#subtotal").val()||"";
      
    if (pono == "") {return false;}
    if(podate==""){return false;}
    if(vaendor==""){return false;}
    if(totalAmount==""){return false;}
    
  return true;
}
function getItemAmount(){
    var itemAmount =0;
    var itemQty = $("#itemqty").val()||0;
    var itemRate = $("#itemrate").val()||0;
    itemAmount = parseFloat(itemQty) * parseFloat(itemRate);
    $("#itemamt").val(itemAmount.toFixed(2));
    return itemAmount;
}
function clearDtlFields(){
     $("#itemqty").val("");
     $("#itemrate").val("");
     $("#itemamt").val("");
     $("#item").val("");
     $("#itemunit").val("");
}
function getsubtotal(){
    var subtotal =0;
    $('.dtl-table tr:gt(0)').each(function() {
      subtotal = subtotal + parseFloat($(this).find("td").eq(5).html()||0);    
    });
    $("#subtotal").val(subtotal.toFixed(2));
 }
 
 function getDetailJson(){
     var productid="";
     var qty="";
     var rate="";
     var amt="";
     var dtl=[];
     $('.dtl-table tr:gt(0)').each(function() {
        productid= $(this).find("td").eq(0).html();
        qty = $(this).find("td").eq(3).html();
        rate =$(this).find("td").eq(4).html();
        amt = $(this).find("td").eq(5).html();
         //subtotal = subtotal + parseFloat($(this).find("td").eq(5).html()||0);    
         dtl.push({
             "productid":productid,
             "qty":qty,
             "rate":rate,
             "amt":amt
         });
    });
    //console.log(JSON.stringify(dtl));
    return dtl;
 }