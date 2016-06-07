<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia
	
	//Starting session
	session_start();
	//Get request type e.g. Update, delete, etc
	$type = $_REQUEST['type'];
	//Get Last URL
	$newurl = $_REQUEST['newurl'];
	//Get Last URL before Edit Page or Member page
	$url = $_REQUEST['url'];
	//Set msg variable
	$msg = '<script type="text/javascript">alert("';	
	//Edit Member Details
	if ($type == "useredit") 
	{
		if(isset($_POST['submit'])) 
		{
			//Get ID Value
			;
			$id = $_REQUEST['id'];
			$fname = $_POST['fname'];
			$fname = trim($fname);
			$lname = $_POST['lname'];
			$lname = trim($lname);	
			$rol = $_POST['rol'];		
			$username = $_POST['username'];
			$email = $_POST['email'];	
			$email = trim($email);			
			
			//Connect To Database
			include ('db/connect_to_db.php');
			
			$update = mysqli_query($conn,"UPDATE members SET firstname = '".$fname."', lastname = '".$lname."', username = '".$username."', rol = '".$rol."', email = '".$email."' 
			WHERE userid = '".$id."'") or die(mysqli_error($conn));
			
			if ($update) 
			{			
				$msg .= $username.' Cambios Realizados';
				$msg .='");</script>';				
				$_SESSION['error'] = $msg;
				//Redirect back to URL 
				//header( 'refresh: 0; url='.$url);
				header( 'refresh: 0; url=edit_member_details.php');
			}
			else 
			{
				$msg .= $username.' No se pudo actualizar, Intente de nuevo';
				$msg .='");</script>';			
				$_SESSION['error'] = $msg;
				//Redirect back to URL
				//header( 'refresh: 0; url='.$newurl);
				header( 'refresh: 0; url=edit_member_details.php');		
			}				
		}	
	}
	
	//Delete Member Details	
	elseif ($type == "userdelete") 
	{
		//Get ID Value
		$id = $_REQUEST['id'];	
		$username = $_GET['username'];
		$old_user = $username;
		
		//Connect To Database
		include ('db/connect_to_db.php');
		
		$deletequery = mysqli_query($conn,"DELETE FROM members WHERE userid = '".$id."'") or die(mysqli_error($conn));  
		
		if ($deletequery) 
		{	
			$msg .= $old_user.' fue eliminado';
			$msg .='");</script>';			
			$_SESSION['error'] = $msg;
			//Redirect back to URL
			header( 'refresh: 0; url='.$url);
		}
		else 
		{
			$msg .='No se pudo eliminar';
			$msg .='");</script>';			
			$_SESSION['error'] = $msg;
			//Redirect back to URL
			header( 'refresh: 0; url='.$newurl);
		}					
	}	

	
	
	//Add New Member		
	elseif ($type == "register") 
	{
		
		if(isset($_POST['submit'])) 
		{
			//Connect To Database
			include ('db/connect_to_db.php');		
			$result = mysqli_query($conn,"SELECT * FROM members WHERE username = '".$_POST['username']."'") or die(mysqli_error($conn)); 
			$numcount = mysqli_num_rows($result);
			if ($numcount > 0) 
			{
				$msg .= $_POST['username'].' Este usuario ya existe';
				$msg .='");</script>';				
				$_SESSION['error'] = $msg;
				//Redirect back to URL
				header( 'refresh: 0; url='.$newurl);
				
			}
			elseif ($numcount == 0) 
			{
		    	$username = $_POST['username'];
				$username = trim($username);				
				$fname = $_POST['fname'];
				$fname = trim($fname);				
				$lname = $_POST['lname'];
				$lname = trim($lname);
				$rol = $_POST['rol'];				
				$password = $_POST['password'];
				$hashpassword = md5($password);
				$email = $_POST['email'];
				$email = trim($email);				
			
				//Insert variables to table in databasse			
				$register = mysqli_query($conn,"INSERT INTO members (firstname, lastname, username, rol, password, email, date_added) VALUES 
				('".$fname."','".$lname."','".$username."','".$rol."','".$hashpassword."','".$email."',NOW())") or die ("Error in query: '".$register."'") 
				or die(mysqli_error($conn));  
			
				if ($register) 
				{			
					$msg .= $username.' fue registrado';
					$msg .='");</script>';				
					$_SESSION['error'] = $msg;
					//Redirect back to URL
					header( 'refresh: 0; url='.$url);
				}
				else 
				{
					$msg .='Error agregando a '.$username.'. intente de nuevo';
					$msg .='");</script>';				
					$_SESSION['error'] = $msg;
					//Redirect back to URL
					header( 'refresh: 0; url='.$newurl);
				}
			}
		}			
	}
	//Add New Image	
	elseif ($type == "newimage") 
	{
		if(isset($_POST['submit'])) 
		{
			//Connect To Database
			include ('db/connect_to_db.php');
			//Configuration - Your Options
			$file_types_permitted = array('.jpg','.jpeg','.gif','.bmp','.png'); // These will be the types of file and will be checked.
			//New Thumb Sizes
			$modwidth="300";
			$modheight="100";
			
			$filename = $_FILES['image']['name']; // Get the name of the file (including file extension).
			$filetype = $_FILES['image']['type']; // Get the type of the file (including file extension).
			
			if (!get_magic_quotes_gpc()) 
			{
				//$_POST variables			
				$title = addslashes($_POST['title']);		
				$category = addslashes($_POST['category']);
				$usuariosubi = addslashes($_POST['usuario']);
				$plot = addslashes($_POST['plot']);	
				$fechas = addslashes($_POST['fecha']);
			} 
			else 
			{
				$title = $_POST['title'];
				$cateory = $_POST['category'];
				$usuariosubi = addslashes($_POST['usuario']);
				$plot = $_POST['plot'];
				$fechas = $_POST['fecha'];				
			}
			//$_POST variables			
			$title = trim($title);				
			//Replace any item in array with a dash	
			$newtitle =  $filename;
			//Extencion
			
			//$newtitle = str_replace(array(' ', ',', '-', '!','/','\',|'), '_', $title);
			//Replace any item in array with a dash
			$category = trim($category);	
			$plot = mysqli_escape_string($conn, $plot);			
			//Get Extension of File
			$extension = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the file extension from the current filename.
			//Set Upload Directory Path (including sub Directoties)
			$upload_path = 'uploads/'.$category.'/'; // The place the files will be uploaded to (a directory).
			//Check if the filetype is allowed, if not DIE and inform the user.
			if(!in_array($extension,$file_types_permitted)) 
			{
				die('Este tipo de archivo no esta permitido.');
			}
			
			else 
			{
				//Check if the file path can be written to
				if(!is_writable($upload_path))
				{
					//Make New Sub Directory and set Permissions
					mkdir($upload_path,0777);
				}

				//Upload the file to your upload path.
				if(move_uploaded_file($_FILES['image']['tmp_name'],$upload_path . $filename)) 
				{
					$fecha = date("F-j-Y-H-i-s");
					$separar = "-";
					$oldfilename = $upload_path.$filename;
					$newfilename = $upload_path.$fecha.$separar.$newtitle;
					
					//$changedfile = $newtitle.$extension;
					//fecha a imagenes
					
					$changedfile = $newtitle;
					$filename = "$fecha-$changedfile";
					rename($oldfilename, $newfilename);
					//Let's set the thumbnail
					//$thumb = "tb_".$filename;
					//Create a new image from file
					//$sourceimg = imagecreatefromjpeg($upload_path.$filename);
					//Finds X and Y of File
					//$width = imagesx($sourceimg);
					//$height = imagesy($sourceimg);
					//Create a new true color image
					//$destination = imagecreatetruecolor($modwidth, $modheight);
					//Creates a Copy of source file and saves to new destination file
					//imagecopyresampled($destination, $sourceimg, 0, 0, 0, 0, $modwidth, $modheight, $width, $height);
					//create the thumbnail image to the destination
					//imagejpeg($destination, $upload_path.$thumb);
					//Destroying Images Created and freeing up any memory associated with images
					//imagedestroy($sourceimg);
					//imagedestroy($destination);
					//Insert variables to table in database
					$insert = mysqli_query($conn,"INSERT INTO picture(title, fecha, usuario, fullimage, upload_path, ext, category, plot, date_added) VALUES
					('".$title."','".$fechas."','".$usuariosubi."','".$filename."','".$upload_path."','".$extension."',
					'".$category."','".$plot."', NOW())") or die(mysqli_error($conn)); 
					
					//Get Last Inserted Id
					$lastid = mysqli_insert_id($conn);
					//Store Last Inserted Id in lastmovieid variable
					$lastmovieid = $lastid;
					
					$msg .='Imagen Subida \n';
					$msg .='");</script>';
					$_SESSION['error'] = $msg;
					//Redirect back to URL
					header( 'refresh: 0; url='.$url);
				} 
				else 
				{
					$msg .='Error subiendo imagen. Intente de nuevo \n';
					$msg .='");</script>';					
					$_SESSION['error'] = $msg;
					//Redirect back to URL
					header( 'refresh: 0; url='.$newurl);
				}
			}		
		}		
	}

	
	
	//Borrado		
	elseif ($type == "productdelete")
	{
		//Connect To Database
		include ('db/connect_to_db.php');	
		
		//Get pictureID value	
		$picid = $_REQUEST['vid'];	
		$title = $_GET['title'];
		//Search the Database to check to see if the product in the database column matches the select product
		$vidsql = mysqli_query($conn,"SELECT * FROM picture WHERE pictureID = '".$picid."'") or die(mysqli_error($conn)); 
		while($row = mysqli_fetch_array($vidsql))
		{ 	
			$vidtitle = $row["title"];
			$fullimage = $row["fullimage"];	
			$upload_path = $row["upload_path"];	
			//$thumb = $row["thumb"];	
		}
		
		//$thumb_path = $upload_path.$thumb;
		$full_path = $upload_path.$fullimage;
		$oldTitle = $vidtitle;
		//Delete Files and Folders from Directory
		//unlink($thumb_path);
		unlink($full_path);
		//rmdir($upload_path);
		$deletequery = mysqli_query($conn,"DELETE FROM picture WHERE pictureID = '".$picid."'") or die(mysqli_error($conn));
		if ($deletequery) 
		{
			$msg .= $oldTitle.' Eliminado. \n';
			$msg .='");</script>';				
			$_SESSION['error'] = $msg;
			//Redirect back to URL
			header( 'Location: show_imagenes.php');
		}
		else
		{
			$msg .='No se pudo eliminar';
			$msg .='");</script>';				
			$_SESSION['error'] = $msg;
			//Redirect back to URL
			header( 'refresh: 0; url='.$url);
		}			
	}	
	//Close Connection to Database
	mysqli_close($conn);

?>