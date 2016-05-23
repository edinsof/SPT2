<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia

	//If Session username is Set
	if (isset($_SESSION['username']) && $_SESSION['username']=="admin") 
	{
		//If the username is admin
		?>
		<div class="adminsettings"><a href="edit_image.php?vid=<?php echo $picid; ?>&type=productedit&url=<?php echo $url; ?>&title=<?php echo $title; ?>">
			<img src="images/buttons/edit.png" alt="" width="35" height="35" border=0/><span>Editar</span></a>
            <a href="image_status.php?vid=<?php echo $picid; ?>&type=productdelete&newurl=''">
			<img src="images/buttons/delete.png" alt="" width="35" height="35" border=0 /><span>Eliminar</span></a>
        </div>
		<?php
	}
	//If Nobody is logged in Display This
	else {					
	}
?>