<?php
	//Logout Page
	
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia
	
	//Starting session
	session_start();
	
	//Get Last URL
	if (!isset($_SESSION['new_link'])) 
	{
		$url = "index.php";
	}
	elseif (isset($_SESSION['new_link'])) 
	{
		$url = $_SESSION['new_link'];			
	}
	else 
	{
		$url = $_GET['url'];
	}
	
	$firstname = $_SESSION['firstname'];
	$user = $_SESSION['username'];
	$cat = $_SESSION['cat'];
	session_destroy();
	
	// Redirect to Index Page
	$msg='<script type="text/javascript">alert("Ha salido con exito '.$firstname.'");</script>';
	session_start();
	$_SESSION['error'] = $msg;
	$_SESSION['cat'] = $cat;
	//Redirect back to URL 
	header( 'refresh: 0; url='.$url);
?>

