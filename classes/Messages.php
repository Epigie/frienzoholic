<?php
include_once 'DB.php';
include_once 'Users.php';
class Messages{
	static function sendMessage($from,$to,$message){
		DB::queryN("
			INSERT INTO `messages` (`message_id`, `from_user_id`, `to_user_id`, `message`, `seen`, `status`, `created_at`) VALUES (NULL, '$from', '$to', '$message', '0', '1', current_timestamp());
		");
	}
	static function seeSendMessage($from,$to){
		DB::queryN(
			"UPDATE `messages` SET `seen` = '1' WHERE `messages`.`from_user_id` = $from and to_user_id = $to;"
		);
	}
	static function seeMessage($from,$to){
		DB::queryN(
			"UPDATE `messages` SET `seen` = '1' WHERE `messages`.`from_user_id` = $from and to_user_id = $to;"
		);
		DB::queryN(
			"UPDATE `messages` SET `seen` = '1' WHERE `messages`.`from_user_id` = $to and to_user_id = $from;"
		);
	}
	static function getUserMessage($from,$to,$page){
		$end=($page*6)-1;
		$start=($page*6)-6;
		$res=DB::query("select from_user_id,to_user_id,message,seen from messages where from_user_id=$from and to_user_id=$to or from_user_id=$to and to_user_id=$from order by message_id desc limit $start,6");
		return $res;
	}
	static function getLatestMessage($from,$to){
		$res=DB::query("select message from messages where from_user_id=$from and to_user_id=$to or to_user_id=$from and from_user_id=$to order by message_id desc limit 0,1;");
		return $res[0]['message'];
	}
	static function getLatestTime($from,$to){
		$res=DB::query("select created_at from messages where from_user_id=$from and to_user_id=$to or to_user_id=$from and from_user_id=$to order by message_id desc limit 0,1;");
		return $res[0]['created_at'];
	}
	static function getNewMessageNo($user_id){
		$res=DB::query("select message from messages where to_user_id=$user_id and seen=0;");
		return count($res);
	}
	static function getNewMessageNoFromTarget($user_id,$target_id){
		$res=DB::query("select message from messages where to_user_id=$user_id and from_user_id=$target_id and seen=0;");
		return count($res);
	}
	static function getNewMessages($user_id){
		$res=DB::query("select from_user_id from messages where to_user_id=$user_id and seen=0 order by message_id desc limit 0,10;");
		return $res;
	}
	static function getChats($user_id){
		$users=array();
		$out=array();
		$res=DB::query("
			select DISTINCT from_user_id,to_user_id from messages where from_user_id=$user_id or to_user_id=$user_id order by message_id desc;
		");
		foreach($res as $re){
			$pop=0;
			$target=($re['from_user_id']==$user_id) ? $re['to_user_id'] : $re['from_user_id'];
			$username=Users::getUsername($target);
			$profilePic=Users::getProfilePic($target);
			$out[]=array(
				'user_id' => $target,
				'username' => $username,
				'profile_pic' => $profilePic,
				'message' => self::getLatestMessage($re['from_user_id'],$re['to_user_id']),
				'seen' => self::getLatestTime($re['from_user_id'],$re['to_user_id'])
			);
			foreach ($users as $user) {
				if($user==$username){
					array_pop($out);
					$pop=1;
				}
			}
			if($pop != 1)	array_push($users,$username);
		}
		$ord = array();
		foreach ($out as $key => $value){
		    $ord[] = strtotime($value['seen']);
		}
		array_multisort($ord,SORT_DESC, $out);
		return $out;
	}
}
