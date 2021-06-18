<?php
	$conn = mysqli_connect("localhost","root","","localjob_db");
	if(!$conn){
		die("Database connection has failed" . mysqli_error());
	}
	
	function cleanStr($str){
		$cStr = trim($str);
		$cStr = htmlspecialchars($cStr);
		$cStr = addslashes($cStr);
		return $cStr;
	}
?>