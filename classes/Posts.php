<?php
include_once 'DB.php';
include_once 'Followers.php';
include_once 'Users.php';
include_once 'Likes.php';
include_once 'Comments.php';
class Posts{
	static function getFeeds($user_id,$page){
		$end=($page*5)-1;
		$start=($page*5)-5;
		$out=array();
		$res=DB::query("select posts.user_id,posts.image_url,posts.post_id,posts.description,posts.created_at from posts,followers where followers.follows_id=posts.user_id and followers.accepted=1 and followers.user_id=$user_id and posts.status=1 order by posts.post_id desc limit $start,5;");
		for($i=0;$i<count($res);$i++){
			$username=Users::getUsername($res[$i]['user_id']);
			$res[$i]['likes']=Likes::getLikesNo($res[$i]['post_id']);
			$res[$i]['username']=Users::getUsername($res[$i]['user_id']);
			$res[$i]['profile_pic']=Users::getProfilePic($res[$i]['user_id']);
			$res[$i]['commentsNo']=Comments::getCommentsNo($res[$i]['post_id']);
			$res[$i]['comments']=Comments::getCommentsThree($res[$i]['post_id']);
		}
		return $res;
	}
	static function getPosts($user_id,$page){
		$end=($page*10)-1;
		$start=($page*10)-10;
		$res = DB::query("select post_id, image_url,description,created_at from posts where user_id = $user_id and status=1 order by created_at desc limit $start,20;");
		return $res;
	}
	static function getPostsNo($user_id){
		$res = DB::query("select post_id, image_url,description,created_at from posts where user_id = $user_id and status=1 order by created_at desc");
		return count($res);
	}
	static function getPostUserId($post_id){
		$out=array();
		$res=DB::query("select user_id from posts where post_id=$post_id");
		$id=$res[0]['user_id'];
		$username=Users::getUsername($id);
		$out['id']=$id;
		$out['username']=$username;
		return $out;
	}
	static function getImage($post_id){
		$res=DB::query("select image_url from posts where post_id = $post_id;");
		return $res[0]['image_url'];
	}
	static function uploadPost($user_id,$image_url,$description){
		DB::queryN("
			INSERT INTO `posts` (`post_id`, `user_id`, `image_url`, `description`, `status`, `created_at`, `updated_at`) VALUES (NULL, '$user_id', '$image_url', '$description', '1', current_timestamp(), current_timestamp());
		");
		return true;
	}
	static function deletePost($user_id,$post_id){
		$post_user_id=self::getPostUserId($post_id);
		if($post_user_id['id']==$user_id)
		{
			DB::queryN("
				Update posts set status=0,updated_at=current_timestamp() where post_id=$post_id;
			");
			return true;
		}
	}
	static function editPost($post_id,$desc){
		DB::queryN("
			Update posts set description='$desc',updated_at=current_timestamp() where post_id=$post_id;
		");
		return true;
	}
}
