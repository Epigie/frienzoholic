<?php
include_once 'DB.php';
include_once 'Followers.php';
include_once 'Users.php';
class Status{
	static function ifStatus($user_id){
		$res = DB::query("SELECT * FROM `status` WHERE user_id=$user_id and created_at > DATE_SUB(NOW(), INTERVAL 1 DAY) and status=1 order by status_id");
		if(count($res) > 0 ) return 1;
		else return 0;
	}
	static function getNewStatusList($user_id,$page){
		$end=($page*10)-1;
		$start=($page*10)-10;
		$out=array();
		$names=array();
		$final=array();
		$res=DB::query("select status.user_id,status.status_id from status,followers where followers.follows_id=status.user_id and followers.user_id=$user_id and followers.accepted=1 and status.status=1 and status.created_at > DATE_SUB(NOW(), INTERVAL 1 DAY) order by status.status_id desc limit $start,20;");
		for($i=0;$i<count($res);$i++){
			if(!(self::isSeen($user_id,$res[$i]['status_id']))){
				$username=Users::getUsername($res[$i]['user_id']);
				$res[$i]['username']=$username;
				$res[$i]['profile_pic']=Users::getProfilePic($res[$i]['user_id']);
				if(!(in_array($res[$i]['username'],$names))){
					$names[]=$res[$i]['username'];
					array_push($out,$res[$i]);
				}
			}
		}
		return $out;
	}
	static function getSeenStatusList($user_id,$page){
		$end=($page*10)-1;
		$start=($page*10)-10;
		$out=array();
		$res=DB::query("select DISTINCT status.user_id,status.status_id from status,followers where followers.follows_id=status.user_id and followers.user_id=$user_id and followers.accepted=1 and status.status=1 and status.created_at > DATE_SUB(NOW(), INTERVAL 1 DAY) group by status.user_id order by status.created_at desc limit $start,20;");
		for($i=0;$i<count($res);$i++){
			$username=Users::getUsername($res[$i]['user_id']);
			$res[$i]['username']=$username;
			$res[$i]['profile_pic']=Users::getProfilePic($res[$i]['user_id']);
		}
		foreach($res as $r){
			if((self::isSeen($user_id,$r['status_id']))){
				array_push($out,$r);
			}
		}
		return $out;
	}
	static function getUserStatus($user_id){
		$res=DB::query("SELECT * FROM `status` WHERE user_id=$user_id and created_at > DATE_SUB(NOW(), INTERVAL 1 DAY) and status=1 order by status_id desc");
		return $res;
	}
	static function isSeen($user_id,$status_id){
		$res=DB::query("select user_id from status_seen where user_id='$user_id' and status_id='$status_id';");
		if(count($res) > 0) return true;
		else return 0;
	}
	static function getStatus($user_id){
		$username=Users::getUsername($user_id);
		$profile_pic=Users::getProfilePic($user_id);
		$res = DB::query("select status_id, image_url,description,created_at from status where user_id = $user_id and status=1 and created_at > DATE_SUB(NOW(), INTERVAL 1 DAY) order by status_id;");
		for($i=0;$i<count($res);$i++){
			$res[$i]['username']=$username;
			$res[$i]['profile_pic']=$profile_pic;
		}
		return $res;
	}
	static function getStatusIndex($user_id,$index){
		$index=$index-1;
		$res = DB::query("select status_id, image_url,description,created_at from status where user_id = $user_id and status=1 order by status_id limit $index,1;");
		return $res[0];
	}
	static function getStatusNo($user_id){
		$res = DB::query("select status_id, image_url,description,created_at from status where user_id = $user_id and status=1 and created_at > DATE_SUB(NOW(), INTERVAL 1 DAY) order by status_id;");
		return count($res);
	}
	static function getSeenStatusNo($status_id){
		$res = DB::query("select * from status_seen where status_id=$status_id and created_at > DATE_SUB(NOW(), INTERVAL 1 DAY);");
		return count($res);
	}
	static function getSeenStatus($status_id){
		$res = DB::query("select users.user_id,users.username,users.profile_pic from status_seen,users where status_seen.status_id=$status_id and users.user_id=status_seen.user_id;");
		return $res;
	}
	static function uploadStatus($user_id,$image_url,$description){
		DB::queryN("
			INSERT INTO `status` (`status_id`, `user_id`, `image_url`, `description`, `status`, `created_at`, `updated_at`) VALUES (NULL, '$user_id', '$image_url', '$description', '1', current_timestamp(), current_timestamp());
		");
		return true;
	}
	static function seeStatus($user_id,$status_id){
		if(!self::isSeen($user_id,$status_id)){
			DB::queryN("
				INSERT INTO `status_seen` (`status_seen_id`, `user_id`, `status_id`, `created_at`) VALUES (NULL, '$user_id', '$status_id', current_timestamp());
			");
		}
	}
	static function deleteStatus($status_id){
		DB::queryN("
			Update status set status=0,updated_at=current_timestamp() where status_id=$status_id;
		");
		return true;
	}
	static function getStatusUserId($status_id){
		$res=DB::query("
			select user_id from status where status_id=$status_id;
		");
		return $res[0]['user_id'];
	}
}
