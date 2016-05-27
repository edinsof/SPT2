<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia 
?>		
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
      <?php
	  $url  = $_GET['url'];
      //If the username is admin
		if ($username == 'admin')
		{
			echo '<li><a href="admin_profile.php"><i class="fa fa-home fa-3x"></i> Home</a></li>';
			echo '<li><a href="edit_member_details.php?uid='.$id.'"><i class="fa fa-user fa-3x"></i> Editar Mis Datos</a></li>';
			echo '<li><a href="new_image.php?type=newimage&url='.$url.'"><i class="fa fa-upload fa-3x"></i> Subir Imagen</a></li>';
			echo '<li><a href="register.php?type=register&url='.$url.'"><i class="fa fa-user-plus fa-3x"></i> Agregar Usuario</a></li>';
			echo '<li><a href="show_members.php"><i class="fa fa-users fa-3x"></i> Ver Usuarios</a></li>';
			echo '<li><a href="show_imagenes.php"><i class="fa fa-camera fa-3x"></i> Ver Imagenes</a></li>';
		}
		//else Do This
		elseif ($username != 'admin')
		{
			echo '<li><a href="member_profile.php"><i class="fa fa-home fa-3x"></i> Home</a></li>';
			echo '<li><a href="edit_member_details.php?uid='.$id.'"><i class="fa fa-user fa-3x"></i> Editar Mis Datos</a></li>';
			echo '<li><a href="new_image.php?type=newimage&url=/apps/show_imagenes.php"><i class="fa fa-upload fa-3x"></i> Subir Imagen</a></li>';
			echo '<li><a href="show_imagenes.php"><i class="fa fa-camera fa-3x"></i> Ver Imagenes</a></li>';			
		} ?>
      </ul>
    </div>
  </nav>