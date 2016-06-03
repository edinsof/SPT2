<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia 
	//Set Variable to Clear
	$navlinks = "";
	$userchoice = "";
	$usertype = "";	
	$msgerror = "";
	$comment = "";
	//If Session ID is Set
	if (isset($_SESSION['id'])) 
	{
		//Put stored session variables into local php variable
		$userid = $_SESSION['id'];
		$firstname = $_SESSION['firstname'];
		$username = $_SESSION['username'];
		$comment = 	'<h3>Comentar</h3>';
		//Put stored session variables into local php variable
		$usertype = "Galeria";
		//Store html code in variable when user logged in 
		$userchoice = '<a href="member_collection.php?userid=' . $userid . '">' . $usertype . '</a>';
		//If the username is admin
		if ($username == 'admin')
		{
			$navlinks = '<a class="btn btn-danger square-btn-adjust" href="admin_profile.php">Administrador</a> <a href="logout.php" class="btn btn-danger square-btn-adjust">Salir</a>';
			$navlinks2 = '<meta http-equiv="refresh" content="1;URL=admin_profile.php"><center><a class="btn btn-danger square-btn-adjust" href="·">Cargando STP</a></center>';
		}
		//else Do This
		elseif ($username != 'admin')
		{
			//Store html code in variable when user logged in 
			$navlinks = '<a class="btn btn-danger square-btn-adjust" href="member_profile.php">Administrador</a> <a href="logout.php" class="btn btn-danger square-btn-adjust">Salir</a>';
			$navlinks2 = '<meta http-equiv="refresh" content="1;URL=member_profile.php"><center><a class="btn btn-danger square-btn-adjust" href="·">Cargando STP</a></center>';			
		}
		
	}
	//If Nobody is logged in Display This
	else 
	{
		//Store html code in variable when user is not logged in 
		$navlinks2 = '<form action="login.php" method="post" name="LoginForm" onsubmit="return ValidateLoginForm();">
            <br />
            <div class="form-group input-group"> <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
			<input name="username" value="Username" type="text" class="form-control"/>
            </div>
            <div class="form-group input-group"> <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
			<input name="password" value="Password" type="password" class="form-control"/>
            </div>
			  <input type="hidden" name="url" value="'.$url.'" />					
			<input type="submit" name="Ingresar" value="Ingresar" class="submit-button" />
          </form>';
					
		$comment = "";
		
		if (!isset($url)) 
		{
			$usertype = "";
			//Store html code in variable when user is not logged in 
			$userchoice = '';
		}
		elseif (isset($url)) 
		{
			$usertype = "Registro";
			//Store html code in variable when user is not logged in 
			$userchoice = '<a href="register.php?type=register&url='.$url.'">' . $usertype . '</a>';					
		}
	}
	//If Session variable error is set
	if(isset($_SESSION['error'])) 
	{
		//Store Session variable in Variable
		$msgerror = $_SESSION['error'];
		$_SESSION['error'] = "";
	}
	//Else Session variable error is not set
	else 
	{
		//Set Variable to Clear
		$msgerror = "";
	}
?>