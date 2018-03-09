<?php
	require "../lib/lib.php";
	$db = new db_connect();
  	$con = $db->connection_db();
	$dataset = new auth();
	if ( isset($_GET['login']) ){
		session_start();
		$dataset->setUsertype($_POST['type']);
		$dataset->setUsername($_POST['username']);
		$dataset->setPassword($_POST['password']);
		$dataset->setDbCon($con);
		
		echo $dataset->login();
		
		
		
	}
?>