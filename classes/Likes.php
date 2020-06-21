<?php
include_once 'DB.php';
include_once 'Users.php';
include_once 'Posts.php';
include_once 'Notifications.php';
class Likes{
	static function getLikes($post_id,$page){
		$end=($page*10)-1;
		$start=($page*10)-10;
		$res=DB::query("select users.user_id,users.username from likes,users where likes.user_id = users.user_id and likes.post_id = $post_id order by like_id desc limit $start,10");
		return $res;
	}
	static function getLikesNo($post_id){
		$res=DB::query("select * from likes where post_id = $post_id;");
		return count($res);
	}
	static function ifLiked($user_id,$post_id){
		$res=DB::query("select user_id from likes where user_id=$user_id and post_id=$post_id;");
		if(count($res) > 0)	return true;
		else return 0;
	}
	static function putLike($user_id,$post_id){
		if(self::ifLiked($user_id,$post_id)){
			DB::queryN("delete from likes where user_id=$user_id and post_id=$post_id;");
		}
		else{
			DB::queryN("INSERT INTO `likes` (`like_id`, `user_id`, `post_id`, `created_at`) VALUES (NULL, '$user_id', '$post_id', current_timestamp());");
			$user=Posts::getPostUserId($post_id);
			$username=Users::getUsername($user_id);
			Notifications::addNotification($user['id'],$post_id,"$username liked your post","post");
		}
	}
}
