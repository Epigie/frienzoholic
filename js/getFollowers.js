$(".followButton").click(
    function() {
        let button=$(this);
        let user_id=$(this).parent().attr("user_id");
        user_id=parseInt(user_id);
        $.get("../api/followers.php",{
            follow:1,
            target:user_id
        },function (data) {
            if(data == ''){
                console.log("nothing");
            }
            if(data == 'following'){
                $(button).html(`
                    <div class="btn follow d-flex align-items-center">
                         <i class="fa fa-check mr-2"></i>Following
                    </div>
                `);
                let follows=parseInt($("#follows").html())+1;
                $("#follows").html(follows);
            }
            if(data == 'requested'){
                $(button).html(`
                    <div class="btn follow d-flex align-items-center">
                         <i class="fa fa-check mr-2"></i>Requested
                    </div>
                `);
            }
            $("#profileHere").load("../components/profilesList.php");
        })
    }
);
$("#searchBar").keyup(
    function(){
        let search=$("#searchBar").val();
        if(search.length == 0){
            $("#profileHere").load("../components/profilesList.php");
        }
        else{
            if(search.length > 0){
                $.get("../components/searchUsers.php",{
                    search
                },function(data){
                    $("#profileHere").html(data);
                });
            }
        }
    }
);
