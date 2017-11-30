<script>
$(document).ready(function(){
    
    var basepath = $("#basepath").val();
    
    setInterval(function(){
        get_chat_messages();
    },2500);
    
    $("#sendit").click(function(){
        var message_content = $("#chat_message").val()||"";
        if(message_content==""){return false;}
        
        $.post(basepath+'chat/ajax_add_chat_messages',{chat_message_content:message_content},function(data){
          
        },"json");
        //alert($("#chat_message").val());
        $("#chat_message").val("");
    });
    
    function get_chat_messages()
    {
        $.post(basepath+'chat/get_chat_messages',function(data){
          
          if(data.status=='Ok'){
              var current_content = $("#chat_viewport").html();
              $("#chat_viewport").html(current_content +data.content);
          }else{
              //there is error
          }
          
        },"json");
        
        
    }
    
    
    
});

</script>



<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="panel panel-yellow">
                <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-wechat fa-fw"></i> PB Chat</h3>
                    </div>
                    <div class="panel-body">
                        <div style="overflow-y: scroll; height:400px; " id="chat_viewport">
                            
                        </div>
                    </div>
                    <div class="panel-footer">
                         <div class="form-group">
                            <textarea class="form-control" rows="5"  id="chat_message"></textarea>
                         </div>
                        <button type="button" class="btn btn-info" id="sendit">Send</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
            
        </div>
        
    </div>
</div>
