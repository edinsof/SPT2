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

	$_SESSION['url_link'] = $_SERVER['REQUEST_URI'];
	$url = $_SESSION['url_link'];
	$_SESSION['new_link'] = $url;	
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
        <h2>Usuarios</h2>
      </div>
    </div>
    <!-- /. ROW  -->
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombre Completo</th>
                    <th>Tipo</th>
                    <th>Ultima session</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
			//Connect To Database
			include ('db/connect_to_db.php');
			//Search the Database to check to see if the image in the database column matches the select image
			$showquery = mysqli_query($conn,"SELECT * FROM members");
			while($row = mysqli_fetch_array($showquery))
			{ 
				$userid = $row["userid"];
				$username = $row["username"];
				$primernombre = $row["firstname"];
				$segnombre = $row["lastname"];
				$lsession = $row["last_logged_in"];
				$roles = $row["rol"];
				$newurl = "";
				$vid = "";
					
				echo '<tr>';
					echo '<td>'.$userid.'</td>';
					echo '<td>'.$username.'</td>';
					echo '<td>'.$primernombre.' '.$segnombre.'</td>';
					echo '<td>'.$roles.'</td>';
					echo '<td>'.$lsession.'</td>';
					echo '<td><a href="edit_member_details.php?uid='.$userid.'&type=useredit"><img src="images/buttons/edit.png" alt="" width="35" height="35" /></a></td>';			
					echo '<td><a href="image_status.php?id='.$userid.'&type=userdelete&username='.$username.'&url=/apps/show_members.php"><img src="images/buttons/delete.png" alt="" width="35" height="35" /></a></td>';			
				echo '</tr>';
			}				
			mysqli_close($conn);
			?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>