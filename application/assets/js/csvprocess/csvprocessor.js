$(document).ready(function(){
    var basepath = $("#basepath").val();
    $.fn.dataTable.moment('DD/MM/YYYY');
    $('#csvDatas').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": basepath + 'csvuploader/listCsvData',
                    
                });
    $(".csvUplad").show();
    $("#loader").hide();           
    $(document).on('click','.csvUplad',function(){
         $(".csvUplad").hide();
         $("#loader").show();
    });
    
            
});

