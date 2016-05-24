<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia 
	
	//Starting session
	session_start();
	
	if (!isset($_SESSION['id'])) 
	{
		//Redirect back to URL 
		header( 'Location: index.php');
	}

	$_SESSION['url_link'] = $_SERVER['REQUEST_URI'];
	$new_url = $_SESSION['url_link'];	
	
	//include External Files
 	include ('scripts/user_checks.php');	

	//Store values in variables
	$username = $_SESSION['username'];
		
	$id = $_GET['uid'];	
	$type = $_GET['type'];
	
	if (!isset($_GET['url'])) 
	{
		$url = "index.php";
	}
	elseif (isset($_GET['url'])) 
	{
		$url = $_GET['url'];				
	}
?>
<?php include("scripts/head.php"); ?>
	<body>
		<div id="wrapper"><?php echo $msgerror; ?>
        <?php include("scripts/user_navigation.php"); ?>
        <?php include("scripts/menu.php"); ?>
        
		<?php
		//Connect To Database
		include ('db/connect_to_db.php');
		//Search the Database to check to see if the product in the database column matches the select product
		$memquery = mysqli_query($conn,"SELECT * FROM members WHERE userid='".$id."'");
	
		while($row = mysqli_fetch_array($memquery))
		{ 
			$fname = $row["firstname"];	
			$lname = $row["lastname"];			
			$username = $row["username"];	
			$email = $row["email"];
		}
		
		mysqli_close($conn);
		?>
        <div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2>Editar informacion</h2>
      </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="image_status.php" name="editform">
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input class="form-control" type="text" name="username" readonly id="username" value="<?php echo $username; ?>" />
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input class="form-control" type="text" name="fname" id="fname" value="<?php echo $fname; ?>" />
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input class="form-control" type="text" name="lname" id="lname" value="<?php echo $lname; ?>" />
                                     
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="email" id="email" value="<?php echo $email; ?>"/>
                                        </div>
                                        
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
					<input type="hidden" name="type" value="<?php echo $type; ?>" />
					<input type="hidden" name="url" value="<?php echo $url; ?>" />	
					<input type="hidden" name="newurl" value="<?php echo $new_url; ?>" />
					<input type="submit" name="submit" value="Guardar" class="submit-button" />


                                    </form>


                                 
    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        

	</body>
</html>