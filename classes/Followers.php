<?php
include_once 'DB.php';
include_once 'Users.php';
include_once 'Notifications.php';
class Followers{
	static function getFollowersNo($user_id){
		$res=DB::query("select user_id from followers where accepted=1 and follows_id=$user_id;");
		return count($res);
	}
	static function getRequestNo($user_id){
		$res=DB::query("select user_id from followers where accepted=0 and follows_id=$user_id;");
		return count($res);
	}
	static function getRequests($user_id){
		$res=DB::query("select user_id from followers where accepted=0 and follows_id=$user_id;");
		return $res;
	}
	static function getFollowsNo($user_id){
		$res=DB::query("select follows_id from followers where accepted=1 and user_id=$user_id;");
		return count($res);
	}
	static function getFollows($user_id,$page){
		$end=($page*10)-1;
		$start=($page*10)-10;
		$ret=array();
		$res=DB::query("select follows_id from followers where accepted=1 and user_id=$user_id order by follows_id desc limit $start,10;");
		foreach($res as $re){
			$temp=Users::getUsername($re['follows_id']);
			$ret[]=array(
				"id" => $re['follows_id'],
				"username" => $temp
			);
		}
		return $ret;
	}
	static function getFollowers($user_id,$page){
		$end=($page*10)-1;
		$start=($page*10)-10;
		$ret=array();
		$res=DB::query("select user_id from followers where accepted=1 and follows_id=$user_id order by follows_id desc limit $start,10;");
		foreach($res as $re){
			$temp=Users::getUsername($re['user_id']);
			$ret[]=array(
				"id" => $re['user_id'],
				"username" => $temp
			);
		}
		return $ret;
	}
	static function acceptRequest($user_id,$follows_id){
		DB::queryN("
			UPDATE `followers` SET `accepted` = '1', updated_at=current_timestamp() WHERE `followers`.`follows_id` = $follows_id and `user_id`=$user_id;
		");
		$username=Users::getUsername($follows_id);
		Notifications::addNotification($user_id,$follows_id,"$username accepted your request","follow");
	}
	static function unfollow($user_id,$target_id){
		DB::queryN("
			DELETE FROM `followers` WHERE `followers`.`user_id` = $user_id and `follows_id` = $target_id;
		");
	}
	static function follow($user_id,$follows_id){
		if(Users::isPublic($follows_id)){
			DB::queryN("
				INSERT INTO `followers` (`follower_id`, `user_id`, `follows_id`, `accepted`, `status`, `created_at`, `updated_at`) VALUES (NULL, '$user_id', '$follows_id', '1', '1', current_timestamp(), current_timestamp());
			");
			$username=Users::getUsername($user_id);
			Notifications::addNotification($follows_id,$user_id,"$username started following you","follow");
		}
		else{
			DB::queryN("
				INSERT INTO `followers` (`follower_id`, `user_id`, `follows_id`, `accepted`, `status`, `created_at`, `updated_at`) VALUES (NULL, '$user_id', '$follows_id', '0', '1', current_timestamp(), current_timestamp());
			");
		}
		return true;
	}
	static function ifFollows($user_id,$follows_id){
		$res=DB::query("select follows_id from followers where accepted=1 and user_id=$user_id and follows_id=$follows_id;");
		if(count($res) > 0)	return true;
		else return 0;
	}
	static function ifRequested($user_id,$follows_id){
		$res=DB::query("select follows_id from followers where accepted=0 and user_id=$user_id and follows_id=$follows_id;");
		if(count($res) > 0)	return true;
		else return 0;
	}
}
