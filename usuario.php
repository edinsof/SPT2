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
	
	//include External Files
 	include ('scripts/user_checks.php');
?>
<?php include("scripts/head.php"); ?>
<body>
<div class="container">
  <div class="row text-center ">
    <div class="col-md-12"> <br />
      <br />
      <h2> SPT : Login</h2>
      <br />
    </div>
  </div>
  <div class="row ">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"> <strong> By HouseMedia </strong> </div>
        <div class="panel-body">
        <?php echo $navlinks2; ?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>