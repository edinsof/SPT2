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
    <a class="navbar-brand">SPT</a> </div>
  <div style="color:white;padding: 15px 10px 5px 10px;text-align:center;font-size: 16px;"> Hola, <?php echo $nombre; ?>&nbsp; <?php echo $navlinks; ?> </div>
</nav>
