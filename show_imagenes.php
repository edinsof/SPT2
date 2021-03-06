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
	$id = $_SESSION['id'];
	$rol = $_SESSION['rol'];
	$elusuario = $_SESSION['username'];
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
          <h2>Imagenes</h2>
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
                      <th>Id</th>
                      <th>Fecha Subida</th>
                      <th>Fecha Finalizacion</th>
                      <th>Categoria</th>
                      <th>Anotaciones</th>
                      <th>URL</th>
                      <th>Borrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
			//Connect To Database
			include ('db/connect_to_db.php');
			
			//Search the Database to check to see if the image in the database column matches the select image
			if ($rol == 'Administrador'){
				$showquery = mysqli_query($conn,"SELECT * FROM picture");
			}
			else 
			{
				$showquery = mysqli_query($conn,"SELECT * FROM picture where usuario ='$elusuario'");
				}	
			//$showquery = mysqli_query($conn,"SELECT * FROM picture where usuario ='$elusuario'");
			$num_check = mysqli_num_rows($showquery);
			if ($num_check == 0) 
			{
				echo '<tr>';
					echo '<td>Ninguno</td>';
					echo '<td>Ninguno</td>';
					echo '<td>Ninguno</td>';
					echo '<td>Ninguno</td>';				
					echo '<td>Ninguno</td>';			
					echo '<td>Ninguno</td>';	
					echo '<td>Ninguno</td>';	
				echo '</tr>';
			}
			else 
			{
				while($row = mysqli_fetch_array($showquery))
				{ 
					$pictureID = $row["pictureID"];
					$fecha = $row["date_added"];
					$fechafin = $row["fecha"];
					$categoria = $row["category"];
					$notas = $row["plot"];
					$urlpatch = $row["upload_path"];
					$urlimg = $row["fullimage"];
					//$newurl = "";
					//$id = "";
			
					echo '<tr>';
						echo '<td>'.$pictureID.'</td>';
						echo '<td>'.$fecha.'</td>';
						echo '<td>'.$fechafin.'</td>';
						echo '<td>'.$categoria.'</td>';
						echo '<td>'.$notas.'</td>';		
						echo '<td><a href="'.$urlpatch.''.$urlimg.'" data-toggle="lightbox"><img src="'.$urlpatch.''.$urlimg.'" width="160" height="auto" alt="Img"></a></td>';		
						echo '<td><a href="image_status?vid='.$pictureID.'&type=productdelete&url=/apps/show_imagenes"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>';			
					echo '</tr>';
				}
				mysqli_close($conn);				
			}
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
<script src="//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/4.0.1/ekko-lightbox.min.js"></script>
<script type="text/javascript">
$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
</script>
</body>
</html>