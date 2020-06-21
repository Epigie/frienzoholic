setTimeout(()=>{$(".loading").fadeOut(300);},3000);
var activeChat=null;
function chatList() {
    $.get("../components/message/chatList.php",{
        activeChat
    },function (data) {
        $(".chats").html(data);
    })
}
$("#searchBox").keyup(
    function () {
        search=$("#searchBox").val();
        if(search.length > 1){
            $.get("../components/homeSearch.php",{
                search
            },function (data) {
                $("#searchResults").html(data);
            })
        }
        else{
            $("#searchResults").html('');
        }
    }
);
function getMessages() {
    if(activeChat != null){
        $.get("../components/message/messageList.php",{target_id:activeChat},
            function (data) {
                $(".eachMessage").html(data);
            }
        );
    }
}
$("#sendMessage").keyup(
    function (event) {
        if(event.key=="Enter"){
            let message=$("#sendMessage").val();
            if(message.length > 0){
                if(activeChat==null){
                    alert("Select a person to send message");
                }
                else{
                    $.get("../api/messages.php",{
                        sendMessage:1,
                        target_id:activeChat,
                        message
                    },function (data) {
                        $("#sendMessage").val('');
                    })
                }
            }
        }
    }
);
setInterval(chatList,500);
setInterval(getMessages,500);
