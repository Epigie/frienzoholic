$.get("../components/profile/profileGrid.php",{
    target_id:user_id
},function (data) {
    $(".photos").html(data);
});
setTimeout(()=>{$(".loading").fadeOut(300);},3000);
