<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia 
	
	$nombre = $_SESSION['firstname'];
?>

<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a class="navbar-brand" href="index.html">SPT</a> </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Hola, <?php echo $nombre; ?>&nbsp; <?php echo $navlinks; ?> <a href="logout.php" class="btn btn-danger square-btn-adjust">Salir</a> </div>
</nav>
