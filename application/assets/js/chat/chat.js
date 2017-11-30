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
              var current_content = $("chat_viewport").html();
              $("#chat_viewport").html(current_content +data.content);
          }else{
              //there is error
          }
          
        },"json");
        
        
    }
    
    
    
});

