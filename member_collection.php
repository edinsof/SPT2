<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia
	
	//Starting session
	session_start();
	
	if (!isset($_GET['userid'])) 
	{
		//Redirect back to URL 
		header( 'Location: index.php');
	}	
	
	//Store values in variables
	$userID = $_GET['userid'];
	$username = $_SESSION['username'];
	$firstname = $_SESSION['firstname'];	
	$_SESSION['url_link'] = $_SERVER['REQUEST_URI'];
	$url = $_SESSION['url_link'];
	$id = $_SESSION['id'];
	
	//include External Files
 	include ('scripts/user_checks.php');
?>
<?php include("scripts/head.php"); ?>
<body>
<div id="wrapper"><?php echo $msgerror; ?>
  <?php include("scripts/user_navigation.php"); ?>
  <?php include("scripts/menu.php"); ?>
  <div id="page-wrapper">
    <div id="page-inner">
      <div class="row">
        <div class="col-md-12">
          <h2>Mi Cuenta</h2>
          <h5><?php echo $username; ?></h5>
        </div>
      </div>
      <!-- /. ROW  -->
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-back noti-box"> <span class="icon-box bg-color-red set-icon"> <i class="fa fa-pencil-square-o"></i> </span>
            <div class="text-box">
              <p class="main-text">Nombre</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="container"><!--Start of Container-->
  <?php
			//Connect To Database
			include ('db/connect_to_db.php');	
	        //Search the Database to check to see if the image in the database column matches the select image for collection
			$prdresult = mysqli_query($conn,"SELECT picture.pictureID,picture.title,picture.upload_path,picture.thumb FROM picture,usercollection 
			WHERE usercollection.userid='".$userID."' AND usercollection.pictureID=picture.pictureID");	
			$num_check = mysqli_num_rows($prdresult);
			if ($num_check == 0) 
			{
				echo "<p id='notfound'>No Pictures in Favourites</p>";
			}
			else 
			{
				while($pdrows = mysqli_fetch_array($prdresult))
				{ 
					$picid = $pdrows["pictureID"];
					$title = $pdrows["title"];
					$upload_path = $pdrows["upload_path"]; 
					$thumb = $pdrows["thumb"];
					?>
  <div id='collect'>
    <div class='product-divs'><!--product-divs-->
      
      <?php
						
						echo	"<a href='image_details.php?vid=".$picid."'><img src=".$upload_path.$thumb." alt='".$thumb."' border='0' /></a>";
						 ?>
      <!-- Members Settings External File--> 
    </div>
  </div>
  <!-- End of product-divs--> 
</div>
<?php
				}				
			}	
			mysqli_close($conn);
			?>
</div>
</body>
</html>