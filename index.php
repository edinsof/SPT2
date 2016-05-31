<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia
	
	//Starting session
	session_start();
	if (isset($_SESSION['id'])) 
	{
		//Redirect back to URL 
		header( 'Location: usuario.php');
	}
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
?>
<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tropical Cocktails</title>
<!-- Facebook -->
<meta property="og:title" content="Programacion Dj's"/>
<meta property="og:description" content="Somos La Magia y El Arte De La Diversión. #TropicalCocktails Los Mejores Cocktails :::.. Llenos de Sabor y Color"/>
<meta property="og:type" content="blog"/>
<meta property="og:url" content="http://tropicalcokctails.com.co/apps"/>
<meta property="og:site_name" content="Somos La Magia y El Arte De La Diversión. #TropicalCocktails Los Mejores Cocktails :::.. Llenos de Sabor y Color"/>
<meta property="og:image" content="http://tropicalcocktails.com.co/apps/fb.jpg"/>
<link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/tabs.css" />
<link rel="stylesheet" type="text/css" href="css/tabstyles.css" />
<script src="js/modernizr.custom.js"></script>
</head>
<body>
<svg class="hidden">
  <defs>
    <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"/>
  </defs>
</svg>
<div class="container">
  <section>
    <div class="tabs tabs-style-bar">
      <nav>
        <ul>
          <li><a href="#section-bar-1"><span>MEDELLIN</span></a></li>
          <li><a href="#section-bar-2"><span>PEREIRA</span></a></li>
        </ul>
      </nav>
      <nav>
        <ul>
          <li><a href="#section-bar-3"><span>CAUCASIA</span></a></li>
          <li><a href="#section-bar-4"><span>SINCELEJO</span></a></li>
          <li><a href="#section-bar-5"><span>MONTERIA</span></a></li>
        </ul>
      </nav>
      <div class="content-wrap"> 
        <!-- Secciones -->
        <section id="section-bar-1">
          <h1>MEDELLIN</h1>
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
				//Rotacion
				  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
				  //Comparar dias
				  if ($hoy < $dia) {
					  echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>'; 
					  } else {
					  echo '';
					  }
					  //Comparar dias
				  
				  } else {
					  echo '';
					  }
	  }
	  }
	?>
        </section>
        <!-- Secciones --> 
        <!-- Secciones -->
        <section id="section-bar-2">
          <h1>PEREIRA</h1>
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
						
						if ($categoria == 'pereira') {
						//Rotacion
					      $filename = $upload_path.$fullimage;
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
				//Rotacion	
				  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
				  //Comparar dias
				  if ($hoy < $dia) {
					  echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>'; 
					  } else {
					  echo '';
					  }
					  //Comparar dias
				  } else {
					  echo '';
					  }
	  }
	  }
	?>
        </section>
        <!-- Secciones --> 
        <!-- Secciones -->
        <section id="section-bar-3">
          <h1>CAUCASIA</h1>
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
						
						if ($categoria == 'caucasia') {
							//Rotacion
					      $filename = $upload_path.$fullimage;
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
				//Rotacion
				  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
				  //Comparar dias
				  if ($hoy < $dia) {
					  echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>'; 
					  } else {
					  echo '';
					  }
					  //Comparar dias
				  } else {
					  echo '';
					  }
	  }
	  }
	?>
        </section>
        <!-- Secciones --> 
        <!-- Secciones -->
        <section id="section-bar-4">
          <h1>SINCELEJO</h1>
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
						
						if ($categoria == 'sincelejo') {
							//Rotacion
					      $filename = $upload_path.$fullimage;
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
				//Rotacion
				  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
				  //Comparar dias
				  if ($hoy < $dia) {
					  echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>'; 
					  } else {
					  echo '';
					  }
					  //Comparar dias
				  } else {
					  echo '';
					  }
	  }
	  }
	?>
        </section>
        <!-- Secciones --> 
        <!-- Secciones -->
        <section id="section-bar-5">
          <h1>MONTERIA</h1>
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
						
						if ($categoria == 'monteria') {
							//Rotacion
					      $filename = $upload_path.$fullimage;
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
				//Rotacion
				  //echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>';
				  //Comparar dias
				  if ($hoy < $dia) {
					  echo '<img src="'.$filename.'" width="100%" height="auto" style="image-orientation:from-image;"/><br>'; 
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
        </section>
      </div>
    </div>
  </section>
</div>
<script src="js/cbpFWTabs.js"></script> 
<script>
			(function() {
				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});
			})();
		</script>
</body>
</html>