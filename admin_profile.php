<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia 
	
	//Starting session
	session_start();
	
	if (!isset($_SESSION['id']) || $_SESSION['username'] != "admin") 
	{
		//Redirect back to URL 
		header( 'Location: index.php');
	}	
	
	//Store values in variables
	$username = $_SESSION['username'];
	$id = $_SESSION['id'];
	$_SESSION['url_link'] = $_SERVER['REQUEST_URI'];
	$url = $_SESSION['url_link'];
	
	//include External Files
 	include ('scripts/user_checks.php');

	//Connect To Database
	include ('db/connect_to_db.php');	
	//Search the Database to check to see if the user in the database column matches the select user
	$result = mysqli_query($conn,"SELECT * FROM members WHERE userid = '".$id."'");
	
	while($row = mysqli_fetch_array($result))
	{ 
		$fname = $row["firstname"];
		$lname = $row["lastname"];	
		$username = $row["username"];
		$email = $row["email"];
		$date_added = $row["date_added"];
	}
	mysqli_close($conn);
?>
<?php include("scripts/head.php"); ?>

	<body>
    <div id="wrapper">
		<?php echo $msgerror; ?>
        <?php include("scripts/user_navigation.php"); ?>
	
		<div id="container"><!--Opening Container -->
			<div class="members"><!--Opening members-->
				<div class="members-info"><!--Opening members-Info-->
					<div class="members-title"><h2>Perfil - <?php echo $username; ?></h2></div>
					<p></p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<h3><span>Nombre:</span> <?php echo $fname." ".$lname; ?></h3>	
					<h3><span>Usuario:</span> <?php echo $username; ?></h3>
					<h3><span>Email:</span><?php echo $email; ?></h3>
					<p>&nbsp;</p>
					<p>&nbsp;</p>					
					<ul id ="admin-button-table">
						<li><h3><a href="edit_member_details.php?uid=<?php echo $id; ?>&url=<?php echo $url; ?>&type=useredit" target="_self"><button>Editar Mis Datos</button></a></h3></li>
						<li><h3><a href="new_image.php?type=newimage&url=<?php echo $url; ?>" target="_self"><button>Subir Imagen</button></a></h3></li>			
						<li><h3><a href="register.php?type=register&url=<?php echo $url; ?>" target="_self"><button>Agregar Usuario</button></a></h3></li>						
	                    <li><h3><a href="show_members.php" target="_self"><button>Ver Usuarios</button></a></h3></li>
						<li><h3><a href="show_imagenes.php" target="_self"><button>Ver Imagenes</button></a></h3></li>
					</ul>			
				</div><!--Closing members-Info-->
			</div><!--Closing members-->   
		</div><!--Closing Container -->
		<div class="full-footer"><!--Full Footer-->
			<?php include("scripts/footer.php"); ?><!-- Footer External File-->  
		</div><!--End of Full Footer-->
        </div>
	</body>
</html>