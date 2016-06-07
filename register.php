<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia
	
	//Starting session
	session_start();
		
	//Get Last URL
	if (isset($_GET['url'])) 
	{
		$url = $_GET['url'];
	}
	elseif (isset($_SESSION['new_link'])) 
	{
		$url = $_SESSION['new_link'];			
	}
	else 
	{
		$url = "index.php";
	}
	
	//include External Files 
 	include ('scripts/user_checks.php');	
	
	//Store values in variables	
	$type = $_GET['type'];	
	$_SESSION['url_link'] = $_SERVER['REQUEST_URI'];
	$id = $_SESSION['id'];
	$new_url = $_SESSION['url_link'];
?>
<?php include("scripts/head.php"); ?>
<body>
<div id="wrapper"> <?php echo $msgerror; ?>
  <?php include("scripts/user_navigation.php"); ?>
  <?php include("scripts/menu.php"); ?>
  <div id="page-wrapper">
    <div id="page-inner">
      <div class="row">
        <div class="col-md-12">
          <h2>Agregar Usuario</h2>
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
                  <form method="post" action="image_status.php" name="RegisterForm" onsubmit="return ValidateRegisterForm();">
                    <div class="form-group">
                      <label>Nombres</label>
                      <input class="form-control" type="text" name="fname" id="fname" placeholder="Nombres" />
                    </div>
                    <div class="form-group">
                      <label>Apellidos</label>
                      <input class="form-control" type="text" name="lname" id="lname" placeholder="Apellidos" />
                    </div>
                    <div class="form-group">
                      <label>Usuario</label>
                      <input class="form-control" type="text" name="username" id="username" placeholder="Usuario" />
                    </div>
                    <div class="form-group">
                      <label>Tipo</label>
                      <select class="form-control" name="rol">
                        <option value="Usuario">Usuario</option>
                        <option value="Administrador">Administrador</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input class="form-control" type="password" name="password" id="password" />
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input class="form-control" type="text" name="email" id="email"/>
                    </div>
                    <input type="hidden" name="type" value="<?php echo $type; ?>" />
                    <input type="hidden" name="url" value="<?php echo $url; ?>" />
                    <input type="hidden" name="newurl" value="<?php echo $new_url; ?>" />
                    <input type="submit" name="submit" value="Agregar" class="btn btn-success btn-lg" />
                    <button type="reset" class="btn btn-primary btn-lg">Resetear</button>
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