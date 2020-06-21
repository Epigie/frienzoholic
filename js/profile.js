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
$.get("../components/profile/profileDetails.php",{
    user_id
},function (data) {
    $(".profileDetails").html(data);
});
