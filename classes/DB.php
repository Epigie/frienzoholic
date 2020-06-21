<?php
class DB{
	static function query($sql){
		$con=mysqli_connect("localhost","root","","frienzoholic");
		$res = mysqli_query($con,$sql);
		$res=mysqli_fetch_all($res,MYSQLI_ASSOC);
		return $res;
	}
	static function queryN($sql){
		$con=mysqli_connect("localhost","root","","frienzoholic");
		$result=mysqli_query($con,$sql);
		return true;
	}
	static function show($arr){
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	}
}
