<?php
include_once 'DB.php';
class Notifications{
	static function addNotification($user_id,$target,$notification,$type){
		if($type=='post'){
			DB::queryN("INSERT INTO `notifications` (`notification_id`, `user_id`, `target_id`, `type`, `notification`, `seen`, `status`, `created_at`) VALUES (NULL, '$user_id', '$target', 'post', '$notification', '0', '1', current_timestamp());");
		}
		else if($type=='follow'){
			DB::queryN("INSERT INTO `notifications` (`notification_id`, `user_id`, `target_id`, `type`, `notification`, `seen`, `status`, `created_at`) VALUES (NULL, '$user_id', '$target', 'follow', '$notification', '0', '1', current_timestamp());");
		}
	}
	static function getNotifications($user_id,$page){
		$end=($page*10)-1;
		$start=($page*10)-10;
		$res=DB::query("select * from notifications where user_id=$user_id order by notification_id desc limit $start,10;");
		return $res;
	}
	static function getNotificationsNo($user_id){
		$res=DB::query("select * from notifications where user_id=$user_id and seen=0 order by notification_id desc;");
		return count($res);
	}
	static function seeNotifications($user_id){
		DB::queryN("
			update notifications set seen=1 where user_id=$user_id;
		");
	}
}
