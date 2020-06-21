<div class="d-flex border-bottom">
      <div class="p-3 d-flex align-items-center border-right" id="profileGrid">
          <i class="fa fa-image p-0 m-0 mr-2">
          </i>
          <p class="p-0 m-0">Photos</p>
      </div>
      <div class="p-3 d-flex align-items-center border-right" id="followingList">
          <i class="fa fa-users p-0 m-0 mr-2">
          </i>
          <p class="p-0 m-0">Following</p>
      </div>
      <div class="p-3 d-flex align-items-center border-right" id="followsList">
          <i class="fa fa-users p-0 m-0 mr-2">
          </i>
          <p class="p-0 m-0">Followers</p>
      </div>
</div>
<script>
    $("#profileGrid").click(
        function () {
            $.get("../components/profile/profileGrid.php",{
                target_id
            },function (data) {
                $(".photos").html(data);
            });
        }
    );
    $("#followingList").click(
        function () {
            $.get("../components/profile/followingList.php",{
                target_id
            },function (data) {
                $(".photos").html(data);
            });
        }
    );
    $("#followsList").click(
        function () {
            $.get("../components/profile/followsList.php",{
                target_id
            },function (data) {
                $(".photos").html(data);
            });
        }
    );
</script>
