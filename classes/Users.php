<?php
include_once 'DB.php';
class Users
{
	static function isPublic($user_id)
	{
		$res = DB::query("select privacy from users where user_id=$user_id and status=1");
		if ($res[0]['privacy'] == 'public')	return true;
		else return 0;
	}
	static function getUsers($page)
	{
		$end=($page*10)-1;
		$start=($page*10)-10;
		$res = DB::query("select user_id,username,profile_pic from users where status=1 order by user_id desc limit $start,10;");
		if (count($res) > 0) return $res;
		else return 0;
	}
	static function getUser($username)
	{
		$res = DB::query("select user_id,username,name,bio,email,phone,profile_pic,gender,privacy from users where status=1 and username='$username';");
		if (count($res) > 0) return $res[0];
		else return 0;
	}
	static function getUsername($user_id)
	{
		$res = DB::query("select username from users where status=1 and user_id=$user_id;");
		if (count($res) > 0) return $res[0]['username'];
		else return 0;
	}
	static function getProfilePic($user_id)
	{
		$res = DB::query("select profile_pic from users where status=1 and user_id=$user_id;");
		if (count($res) > 0) return $res[0]['profile_pic'];
		else return 0;
	}
	static function getuser_id($username)
	{
		$res = DB::query("select user_id from users where status=1 and username='$username';");
		if (count($res) > 0) return $res[0]['user_id'];
		else return 0;
	}
	static function getUserIdFromEmail($email)
	{
		$res = DB::query("select user_id from users where status=1 and email='$email';");
		if (count($res) > 0) return $res[0]['user_id'];
		else return 0;
	}
	static function logIn($email, $password)
	{
		$res = DB::query("select user_id from users where username='$email' and password='$password' and status=1;");
		if (count($res) > 0)
			return 1;
		else{
			$res = DB::query("select user_id from users where email='$email' and password='$password' and status=1;");
			if(count($res) > 0){
				return 1;
			}
			else{
				return 0;
			}
		}
	}
	static function checkUsername($username)
	{
		if (strlen($username) > 4) {
			$res = DB::query("select user_id from users where username = '$username';");
			if (count($res) > 0) {
				return 0;
			} else {
				return true;
			}
		} else {
			return 0;
		}
	}
	static function searchUser($username)
	{
		if (strlen($username) > 0) {
			$res = DB::query("select user_id,username,profile_pic from users where username like '%$username%' and status=1 limit 0,5;");
			return $res;
		}
	}
	static function checkEmail($email)
	{
		$res = DB::query("select user_id from users where email = '$email';");
		if (count($res) > 0) {
			return 0;
		} else {
			return true;
		}
	}
	static function signUp($username, $password, $confirm, $email, $bio, $name, $phone, $profile_pic, $gender, $privacy)
	{
		if ($password == $confirm && strlen($password) > 4) {
			if (self::checkUsername($username) && self::checkEmail($email)) {
				DB::queryN("
					INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `bio`, `name`, `phone`, `profile_pic`, `gender`, `privacy`, `status`, `created_at`, `updated_at`) VALUES (NULL, '$username', '$password', '$email', '$bio', '$name', '$phone', '$profile_pic', '$gender', '$privacy', '1', current_timestamp(), current_timestamp());
				");
			}
		}
	}
	static function updateDetails($user_id, $bio, $name, $phone, $gender, $privacy)
	{
		DB::queryN("
			UPDATE `users` SET `bio` = '$bio', `name` = '$name', `phone` = '$phone', `gender` = '$gender', `privacy` = '$privacy', updated_at=current_timestamp() WHERE `users`.`user_id` = $user_id;
		");
		return true;
	}
	static function getDetails($user_id)
	{
		$res = DB::query("select bio,name,phone,gender,privacy from users where user_id=$user_id and status=1;");
		return $res[0];
	}
	static function changeProfilePic($user_id, $pic)
	{
		DB::queryN("
			UPDATE `users` SET `profile_pic` = '$pic' WHERE `users`.`user_id` = $user_id;
		");
		return true;
	}
	static function changePassword($user_id, $old, $newpass, $confirm)
	{
		if ($username = self::getUsername($user_id)) {
			if (self::logIn($username, $old)) {
				if (strlen($newpass) > 4 && $newpass == $confirm) {
					DB::queryN("
						UPDATE `users` SET `password` = '$newpass',
						updated_at=current_timestamp() WHERE `users`.`user_id` = $user_id;
					");
					return true;
				}
			}
		}
	}
	static function deleteUser($user_id)
	{
		DB::queryN("update users set status=0,updated_at=current_timestamp() where user_id=$user_id;");
		return true;
	}
	static function activateUser($user_id)
	{
		DB::queryN("update users set status=1 where user_id=$user_id;");
		return true;
	}
}
