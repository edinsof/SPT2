<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia 
	
	//MySQLI Database Connection
	//Host Connection for the MySQLI database
	$db_host = "localhost"; 
	//Username for the MySQLI database 
	$db_username = "usuario";  
	//Password for the MySQLI database
	$db_pass = "oinkoink";  
	//Name for the MySQLI database
	$db_name = "stp2"; 

	//Run the MySQLI Database Connection with php variables  
	$conn = mysqli_connect($db_host,$db_username,$db_pass) or die ("could not connect to the mysql server");
	//Connect to selected MySQLI database
	mysqli_select_db($conn,$db_name) or die ("no database");  
?>