<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia
	
	//Starting session
	session_start();	
	$usuario = $id = $_SESSION['id'];;
	$id = $_SESSION['id'];
	
	//include External Files 
 	include ('scripts/user_checks.php');
	
	$type = $_GET['type'];
	$url = $_GET['url'];
	$_SESSION['url_link'] = $_SERVER['REQUEST_URI'];
	$new_url = $_SESSION['url_link'];
	
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
<div id="wrapper"> <?php echo $msgerror; ?><!-- Echo Error Message-->
  <?php include("scripts/user_navigation.php"); ?>
  <?php include("scripts/menu.php"); ?>
  <div id="page-wrapper">
    <div id="page-inner">
      <div class="row">
        <div class="col-md-12">
          <h2>Subir Imagen</h2>
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
                  <form method="post" action="image_status.php" name="newProductForm" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input class="form-control" type="text" name="title" id="title" placeholder="<?php echo $fname; ?>_<?php echo date("Y-m-d"); ?>"/>
                    </div>
                    <div class="form-group">
                      <label>Categoria</label>
                      <select class="form-control" name="category">
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
                        <input type="text" class="form-control" id="fecha" name="fecha" />
                        <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div>
                    </div>
                    <div class="form-group">
                      <label>Anotaciones</label>
                      <input class="form-control" name="plot" value="<?php echo $fname; ?>_<?php echo $lname; ?>_<?php echo $_SERVER['REMOTE_ADDR']; ?>_<?php echo date("F-j-Y-H-i-s"); ?>" readonly/>
                    </div>
                    <div class="form-group">
                      <label>Imagen</label>
                      <input type="file" name="image" id="image" />
                    </div>
                    <input type="hidden" name="usuario" value="<?php echo $username; ?>" />
                    <input type="hidden" name="type" value="<?php echo $type; ?>" />
                    <input type="hidden" name="url" value="<?php echo $url; ?>" />
                    <input type="hidden" name="newurl" value="<?php echo $new_url; ?>" />
                    <input type="submit" name="submit" value="Subir" class="submit-button" />
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
<script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD' 
            });
        });
    </script> 
</body>
</html>