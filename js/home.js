setTimeout(()=>{$(".loading").fadeOut(300);},3000);
$("#icon").click(
    function () {
        $(".title").toggleClass("title-active");
        $(this).toggleClass("fa-bars-active");
    }
);
$("#profileDetails").click(
    function () {
        $("#tools").delay(500).load("../components/profileDetails.php");
        $(this).parent().children().each(
            function (e) {
                $(this).removeClass("sideBar-active");
            }
        );
        $(this).addClass("sideBar-active");
    }
);
$("#uploadPost").click(
    function () {
        $("#tools").delay(500).load("../components/uploadPost.php");
        $(this).parent().children().each(
            function (e) {
                $(this).removeClass("sideBar-active");
            }
        );
        $(this).addClass("sideBar-active");
    }
);
$("#followers").click(
    function () {
        $("#tools").delay(500).load("../components/followersList.php");
        $(this).parent().children().each(
            function (e) {
                $(this).removeClass("sideBar-active");
            }
        );
        $(this).addClass("sideBar-active");
    }
);
$("#wrench").click(
    function () {
        $("#tools").delay(500).load("../components/editProfile.php");
        $(this).parent().children().each(
            function (e) {
                $(this).removeClass("sideBar-active");
            }
        );
        $(this).addClass("sideBar-active");
    }
);
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
