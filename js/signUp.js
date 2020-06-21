$(".form-2").fadeOut();
$(".form-3").fadeOut();
$("#nextToForm-2").click(
    function(){
        username=$("#username").val();
        password=$("#password").val();
        re_password=$("#re-password").val();
        name=$("#name").val();
        if(username.length > 4){
            if(password.length > 4){
                if(re_password.length > 4){
                    if(password == re_password){
                        if(name.length > 4){
                            //form-1 ok
                            $("#message").animate({opacity:0},300);
                            $("#message").html("");
                            $(".form-1").fadeOut(300);
                            $(".form-2").delay(300).fadeIn(300);
                        }
                        else{
                            show("Enter the Name of above the length of 4");
                        }
                    }else{
                        show("Password does not match");
                    }
                }else{
                    show("Re - Password length is small");
                }
            }
            else{
                show("Password length is small");
                $("#password").addClass("in-valid");
            }
        }
    }
);
$("#nextToForm-3").click(
    function () {
        email=$("#email").val();
        phone=$("#phone").val();
        bio=$("#bio").val();
        if(email != ''){
            if(phone != ''){
                if(bio != ''){
                    $("#message").animate({opacity:0},300);
                    $("#message").html("");
                    $(".form-2").fadeOut(300);
                    $(".form-3").delay(300).fadeIn(300);
                }
                else{
                    show("All fields should be filled");
                }
            }
            else{
                show("All fields should be filled");
            }
        }
        else{
            show("All fields should be filled");
        }
    }
);
$("#goToForm-1").click(
    function() {
        $(".form-2").fadeOut(300);
        $(".form-1").delay(300).fadeIn(300);
    }
);
$("#goToForm-2").click(
    function() {
        $(".form-3").fadeOut(300);
        $(".form-2").delay(300).fadeIn(300);
    }
);
function show(message){
    $("#message").animate({opacity:1});
    $("#message").html(`
        <div class="alert alert-danger mt-2" style="opacity:0;" id="alert">${message}</div>
    `);
    $("#alert").animate({opacity:1},300);
}
$("#uploadPic").change(
    function (event) {
        $(".profile").attr("src",URL.createObjectURL(event.target.files[0]));
    }
);
$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
});
