<?php
include_once 'DB.php';
include_once 'Notifications.php';
include_once 'Posts.php';
class Comments{
	static function getComments($post_id,$page){
		$end=($page*10)-1;
		$start=($page*10)-10;
		$res=DB::query("SELECT `comment_id`,`user_id`,`post_id`,`comment` from comments where post_id=$post_id order by comment_id desc limit $start,10;");
		return $res;
	}
	static function getCommentsNo($post_id){
		$res=DB::query("select users.user_id,users.username from comments,users where comments.user_id = users.user_id and comments.post_id = $post_id order by comments.created_at desc;");
		return count($res);
	}
	static function getCommentsThree($post_id){
		$res=DB::query("select users.user_id,users.username,comments.comment_id,comments.comment from comments,users where comments.user_id = users.user_id and comments.post_id = $post_id order by comments.created_at desc limit 0,3");
		return $res;
	}
	static function putComment($user_id,$post_id,$comment){
		DB::queryN("INSERT INTO `comments` (`comment_id`, `user_id`, `post_id`,`comment`, `created_at`) VALUES (NULL, '$user_id', '$post_id','$comment', current_timestamp());");
		$target=Posts::getPostUserId($post_id);
		$username=Users::getUsername($user_id);
		$message=$username." commented \"".$comment."\" on your post";
		Notifications::addNotification($target['id'],$post_id,$message,"post");
	}
	static function deleteComments($comment_id){
		DB::query("
			update comments set status=0,updated_at=current_timestamp() where comment_id=$comment_id;
		");
	}
}
