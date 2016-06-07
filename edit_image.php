<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia 
	
	//Starting session
	session_start();
	
	//if (!isset($_SESSION['id']) || $_SESSION['username'] != "admin") 
	//{
		//Redirect back to URL 
		//header( 'Location: index.php');
	//}	
	
	//include External Files
 	include ('scripts/user_checks.php');
	
	$vid = $_GET['vid'];
	$type = $_GET['type'];
	$url = $_GET['url'];
	$_SESSION['url_link'] = $_SERVER['REQUEST_URI'];
	$new_url = $_SESSION['url_link'];
	$id = $_SESSION['id'];
	
	//Connect To Database
	include ('db/connect_to_db.php');	
	//Search the Database to check to see if the image in the database column matches the select image
	$memquery = mysqli_query($conn,"SELECT * FROM picture WHERE pictureID='".$vid."'");
	
	while($row = mysqli_fetch_array($memquery))
	{ 
		// Get member ID into a session variable
		$title = $row["title"];
		$category = $row["category"];
		$leusuario = $row["usuario"];
		$upload_path = $row["upload_path"];
		$storyline = $row["plot"];
		$fecha = $row["date_added"];	
		$fechafin = $row["fecha"];				
	}	
	mysqli_close($conn);
	
	//Set Counters to 0
	$i = 0;
	$j = 0;
?>

<?php include("scripts/head.php"); ?>
	<body>
    <div id="wrapper"> <?php echo $msgerror; ?><!-- Echo Error Message-->
  <?php include("scripts/user_navigation.php"); ?>
  <?php include("scripts/menu.php"); ?>
  <div id="page-wrapper">
    <div id="page-inner">
      <div class="row">
        <div class="col-md-12">
          <h2>Editar Imagen</h2>
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
                  <form method="post" action="image_status.php" name="editProductForm">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input class="form-control" type="text" name="title" id="title" value="<?php echo $leusuario; ?>"  />
                    </div>
                    <div class="form-group">
                      <label>Categoria</label>
                      <select class="form-control" name="category">
                      <option value="<?php echo $category; ?>">Actual: <?php echo $category; ?></option>
                        <option value="medellin">Programacion DJ's Medellin</option>
                        <option value="pereira">Programacion DJ's Pereira</option>
                        <option value="caucasia">Programacion DJ's Caucasia</option>
                        <option value="sincelejo">Programacion DJ's incelejo</option>
                        <option value="monteria">Programacion DJ's Monteria</option>
                        <option value="queestapasando">Que esta Pasando</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="text">Fecha de Finalizacion</label>
                      <div class="input-group date" id="datetimepicker1">
                        <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $fechafin; ?>" />
                        <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div>
                    </div>
                    <div class="form-group">
                      <label>Anotaciones</label>
                      <input class="form-control" name="plot" value="<?php echo $storyline; ?>" readonly/>
                    </div>
                    <input type="submit" name="submit" value="Actualizar" class="submit-button" />
                  </form>
                </div>
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