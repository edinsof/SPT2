<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia 
	
	//Starting session
	session_start();
	
	if (!isset($_SESSION['id']) || $_SESSION['rol'] != "Administrador") 
	{
		//Redirect back to URL 
		header( 'Location: index.php');
	}	
	
	//Store values in variables
	$username = $_SESSION['username'];
	$id = $_SESSION['id'];
	$rol = $_SESSION['rol'];
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
<div id="wrapper"> <?php echo $msgerror; ?>
  <?php include("scripts/user_navigation.php"); ?>
  <?php include("scripts/menu.php"); ?>
  <div id="page-wrapper">
    <div id="page-inner">
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-back noti-box"> <span class="icon-box bg-color-red set-icon"> <i class="fa fa-pencil-square-o"></i> </span>
            <div class="text-box">
              <p class="main-text">Nombre</p>
              <p class="text-muted"><?php echo $fname." ".$lname; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-back noti-box"> <span class="icon-box bg-color-red set-icon"> <i class="fa fa-users"></i> </span>
            <div class="text-box">
              <p class="main-text">Tipo</p>
              <p class="text-muted"><?php echo $rol; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-back noti-box"> <span class="icon-box bg-color-green set-icon"> <i class="fa fa-user"></i> </span>
            <div class="text-box">
              <p class="main-text">Usuario</p>
              <p class="text-muted"><?php echo $username; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-back noti-box"> <span class="icon-box bg-color-blue set-icon"> <i class="fa fa-envelope"></i> </span>
            <div class="text-box">
              <p class="main-text">Email</p>
              <p class="text-muted"><?php echo $email; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>