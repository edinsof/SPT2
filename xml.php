<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia
	
	//Starting session
	session_start();
	//Store values in variables
	$_SESSION['url_link'] = $_SERVER['REQUEST_URI'];
	$url = $_SESSION['url_link'];
	$_SESSION['new_link'] = $url;
	//Obtener Fecha
	$hoy = date("Y-m-d");	
	//echo $hoy;
	//include External Files
 	include ('scripts/user_checks.php');
	$nums = "";
	include ('db/connect_to_db.php');
	//header('Content-Type: application/json');
	header('Content-type: application/xml');
header('Access-Control-Allow-Origin: *');
?>
<?php 
echo '<?xml version="1.0"?><list>';
?>	
          <?php
				$rghtresult = mysqli_query($conn,"SELECT * FROM picture");	
				$rhtnum_check = mysqli_num_rows($rghtresult);
				if ($rhtnum_check == 0) 
				{
					echo "<h3>No hay resultados</h3>";
				}
				else 
				{
					while($rghtrow = mysqli_fetch_array($rghtresult))
					{ 
						$picid = $rghtrow["pictureID"];
						$dia = $rghtrow["fecha"];
						$fullimage = $rghtrow["fullimage"];
						$upload_path = $rghtrow["upload_path"];
						$categoria = $rghtrow["category"];
						
						if ($categoria == 'medellin') {
							//Rotacion
					      $filename = $upload_path.$fullimage;
						  //Extenciones
						  $file_parts = pathinfo($filename);
						  $file_parts['extension'];
						  $cool_extensions = Array('jpg','jpeg');
						  if (in_array($file_parts['extension'], $cool_extensions)){
							  $exif = exif_read_data($filename);
						  if(!empty($exif['Orientation'])) {
							  switch($exif['Orientation']) {
								  case 8:
								  $degree = 90;
								  break;
								  case 3:
								  $degree = 180;
								  break;
								  case 6:
								  $degree = -90;
								  break;
								  }
						$source = imagecreatefromjpeg($filename) or notfound();
						$rotate = imagerotate($source,$degree,0);
						imagejpeg($rotate,$filename);
						imagedestroy($source);
						imagedestroy($rotate);
						}
							  } else {
								  //nada
								  }
						  //Extenciones
				//Rotacion
				  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
				  //Comparar dias
				  if ($hoy < $dia) {
			 //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>'; 
			 //echo '{tags: [{name: "img", attr: {src: "http://tropicalcocktails.com.co/apps/'.$filename.'"}}]},';
			 echo '<ref><image>http://tropicalcocktails.com.co/apps/'.$filename.'</image><alt>STP by HouseMedia</alt></ref>';
					  } else {
					  echo '';
					  }
					  //Comparar dias
				  
				  } else {
					  echo '';
					  }
	  }
	  }
	
				$rghtresult = mysqli_query($conn,"SELECT * FROM picture");	
				$rhtnum_check = mysqli_num_rows($rghtresult);
				if ($rhtnum_check == 0) 
				{
					echo "<h3>No hay resultados</h3>";
				}
				else 
				{
					while($rghtrow = mysqli_fetch_array($rghtresult))
					{ 
						$picid = $rghtrow["pictureID"];
						$dia = $rghtrow["fecha"];
						$fullimage = $rghtrow["fullimage"];
						$upload_path = $rghtrow["upload_path"];
						$categoria = $rghtrow["category"];
						
						if ($categoria == 'pereira') {
						//Rotacion
					      $filename = $upload_path.$fullimage;
						  //Extenciones
						  $file_parts = pathinfo($filename);
						  $file_parts['extension'];
						  $cool_extensions = Array('jpg','jpeg');
						  if (in_array($file_parts['extension'], $cool_extensions)){
							  $exif = exif_read_data($filename);
						  if(!empty($exif['Orientation'])) {
							  switch($exif['Orientation']) {
								  case 8:
								  $degree = 90;
								  break;
								  case 3:
								  $degree = 180;
								  break;
								  case 6:
								  $degree = -90;
								  break;
								  }
						$source = imagecreatefromjpeg($filename) or notfound();
						$rotate = imagerotate($source,$degree,0);
						imagejpeg($rotate,$filename);
						imagedestroy($source);
						imagedestroy($rotate);
						}
							  } else {
								  //nada
								  }
						  //Extenciones
				//Rotacion	
				  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
				  //Comparar dias
				  if ($hoy < $dia) {
					  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
					  echo '<ref><image>http://tropicalcocktails.com.co/apps/'.$filename.'</image><alt>STP</alt></ref>';
					  } else {
					  echo '';
					  }
					  //Comparar dias
				  } else {
					  echo '';
					  }
	  }
	  }
	
				$rghtresult = mysqli_query($conn,"SELECT * FROM picture");	
				$rhtnum_check = mysqli_num_rows($rghtresult);
				if ($rhtnum_check == 0) 
				{
					echo "<h3>No hay resultados</h3>";
				}
				else 
				{
					while($rghtrow = mysqli_fetch_array($rghtresult))
					{ 
						$picid = $rghtrow["pictureID"];
						$dia = $rghtrow["fecha"];
						$fullimage = $rghtrow["fullimage"];
						$upload_path = $rghtrow["upload_path"];
						$categoria = $rghtrow["category"];
						
						if ($categoria == 'caucasia') {
							//Rotacion
					      $filename = $upload_path.$fullimage;
						  //Extenciones
						  $file_parts = pathinfo($filename);
						  $file_parts['extension'];
						  $cool_extensions = Array('jpg','jpeg');
						  if (in_array($file_parts['extension'], $cool_extensions)){
							  $exif = exif_read_data($filename);
						  if(!empty($exif['Orientation'])) {
							  switch($exif['Orientation']) {
								  case 8:
								  $degree = 90;
								  break;
								  case 3:
								  $degree = 180;
								  break;
								  case 6:
								  $degree = -90;
								  break;
								  }
						$source = imagecreatefromjpeg($filename) or notfound();
						$rotate = imagerotate($source,$degree,0);
						imagejpeg($rotate,$filename);
						imagedestroy($source);
						imagedestroy($rotate);
						}
							  } else {
								  //nada
								  }
						  //Extenciones
				//Rotacion
				  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
				  //Comparar dias
				  if ($hoy < $dia) {
					  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
					  echo '<ref><image>http://tropicalcocktails.com.co/apps/'.$filename.'</image><alt>STP</alt></ref>';
					  } else {
					  echo '';
					  }
					  //Comparar dias
				  } else {
					  echo '';
					  }
	  }
	  }

				$rghtresult = mysqli_query($conn,"SELECT * FROM picture");	
				$rhtnum_check = mysqli_num_rows($rghtresult);
				if ($rhtnum_check == 0) 
				{
					echo "<h3>No hay resultados</h3>";
				}
				else 
				{
					while($rghtrow = mysqli_fetch_array($rghtresult))
					{ 
						$picid = $rghtrow["pictureID"];
						$dia = $rghtrow["fecha"];
						$fullimage = $rghtrow["fullimage"];
						$upload_path = $rghtrow["upload_path"];
						$categoria = $rghtrow["category"];
						
						if ($categoria == 'sincelejo') {
							//Rotacion
					      $filename = $upload_path.$fullimage;
						  //Extenciones
						  $file_parts = pathinfo($filename);
						  $file_parts['extension'];
						  $cool_extensions = Array('jpg','jpeg');
						  if (in_array($file_parts['extension'], $cool_extensions)){
							  $exif = exif_read_data($filename);
						  if(!empty($exif['Orientation'])) {
							  switch($exif['Orientation']) {
								  case 8:
								  $degree = 90;
								  break;
								  case 3:
								  $degree = 180;
								  break;
								  case 6:
								  $degree = -90;
								  break;
								  }
						$source = imagecreatefromjpeg($filename) or notfound();
						$rotate = imagerotate($source,$degree,0);
						imagejpeg($rotate,$filename);
						imagedestroy($source);
						imagedestroy($rotate);
						}
							  } else {
								  //nada
								  }
						  //Extenciones
				//Rotacion
				  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
				  //Comparar dias
				  if ($hoy < $dia) {
					  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>'; 
					  echo '<ref><image>http://tropicalcocktails.com.co/apps/'.$filename.'</image><alt>STP</alt></ref>';
					  } else {
					  echo '';
					  }
					  //Comparar dias
				  } else {
					  echo '';
					  }
	  }
	  }
	
				$rghtresult = mysqli_query($conn,"SELECT * FROM picture");	
				$rhtnum_check = mysqli_num_rows($rghtresult);
				if ($rhtnum_check == 0) 
				{
					echo "<h3>No hay resultados</h3>";
				}
				else 
				{
					while($rghtrow = mysqli_fetch_array($rghtresult))
					{ 
						$picid = $rghtrow["pictureID"];
						$dia = $rghtrow["fecha"];
						$fullimage = $rghtrow["fullimage"];
						$upload_path = $rghtrow["upload_path"];
						$categoria = $rghtrow["category"];
						
						if ($categoria == 'monteria') {
							//Rotacion
					      $filename = $upload_path.$fullimage;
						  //Extenciones
						  $file_parts = pathinfo($filename);
						  $file_parts['extension'];
						  $cool_extensions = Array('jpg','jpeg');
						  if (in_array($file_parts['extension'], $cool_extensions)){
							  $exif = exif_read_data($filename);
						  if(!empty($exif['Orientation'])) {
							  switch($exif['Orientation']) {
								  case 8:
								  $degree = 90;
								  break;
								  case 3:
								  $degree = 180;
								  break;
								  case 6:
								  $degree = -90;
								  break;
								  }
						$source = imagecreatefromjpeg($filename) or notfound();
						$rotate = imagerotate($source,$degree,0);
						imagejpeg($rotate,$filename);
						imagedestroy($source);
						imagedestroy($rotate);
						}
							  } else {
								  //nada
								  }
						  //Extenciones
				//Rotacion
				  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
				  //Comparar dias
				  if ($hoy < $dia) {
					  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>'; 
					  echo '<ref><image>http://tropicalcocktails.com.co/apps/'.$filename.'</image><alt>STP</alt></ref>';
					  } else {
					  echo '';
					  }
					  //Comparar dias
				  } else {
					  echo '';
					  }
	  }
	  }
	  mysqli_close($conn);
	?>
    <?php 
echo '</list>';
?>	