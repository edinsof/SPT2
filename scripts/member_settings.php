<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia
	
	//If Session username is Set
	if (isset($_SESSION['username']) && $_SESSION['username']!="admin") 
	{
		//If the username is not admin
		$memberid = $_SESSION['id'];
		$memcollresult = mysqli_query($conn,"SELECT * FROM picture,usercollection
        WHERE usercollection.pictureID='".$picid."' AND usercollection.userid='".$memberid."'") or die(mysqli_error($conn));
		$num_check = mysqli_num_rows($memcollresult);
		//If picture not found belonging to user then show plus image
		if ($num_check == 0) 
		{
		?>	
			<div class="membersettings">
				<a href="image_status.php?vid=<?php echo $picid; ?>&type=addcollection&url=<?php echo $url; ?>&id=<?php echo $memberid; ?>&title=<?php echo $title; ?>&newurl=''">
				<img src="images/buttons/add.png" alt="" width="35" height="35" border="0" /><span>Add To Favourites</span></a>
            </div>
            <?php
		}
		//If picture found belonging to user then show minus image
		elseif ($num_check >=1) 
		{
			?>
			<div class="membersettings">
				<a href="image_status.php?vid=<?php echo $picid; ?>&type=removecollection&url=<?php echo $url; ?>&id=<?php echo $memberid; ?>&title=<?php echo $title; ?>&newurl=''">
				<img src="images/buttons/minus.png" alt="" width="35" height="35" border="0" /><span>Remove From Favourites</span></a>
            </div>
			<?php
		}	
	}
	//If Nobody is logged in Display This
	else 
	{					
	}
?>