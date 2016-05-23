<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia 
	
	//Starting session
	session_start();
	
	//Check if $_GET variables equals value
	$picid = $_GET['vid'];	
	
	//Store values in variables
	$_SESSION['url_link'] = $_SERVER['REQUEST_URI'];
	$url = $_SESSION['url_link'];
	$_SESSION['new_link'] = $url;
	
	//include External Files 	
 	include ('scripts/user_checks.php');
	//Average Star Ratings
	include ('scripts/avgstar.php');
	
	//Connect To Database
	include ('db/connect_to_db.php');	
	//Search the Database to check to see if the image in the database column matches the select image
	$result = mysqli_query($conn,"SELECT * FROM picture WHERE pictureID = '".$picid."'");
	while($row = mysqli_fetch_array($result))
	{ 
		$title = $row["title"];			
		$fullimage = $row["fullimage"];
		$mediatype = $row["mediatype"];
		$mediaformat = $row["mediaformat"];
		$upload_path = $row["upload_path"];	
		$category = $row["category"];	
		$thumb = $row["thumb"];	
		$storyline = $row["plot"]; 
		$date_added = $row["date_added"]; 		
	}
?>

<?php include("scripts/head.php"); ?>
	<body>
		<?php echo $msgerror; ?><!-- Echo Error Message-->
       
        <div class="fullnav"><!--FullNav-->
            <div class="logo"><?php include("scripts/logo.php"); ?><!-- Logo External File--></div>
            <div class="centernav"><!--CenterNav-->
				 <?php include("scripts/menu.php"); ?><!-- Navigation External File-->
				 <div id="loginNav">
				 	<?php include("scripts/user_navigation.php"); ?>
				</div> 
			</div><!-- End of CenterNav-->
        </div><!-- End of FullNav-->
		<div id="container"> <!--Opening Container -->
			<div class="product"><!--Opening Review-->
				<div class="product-image"><!--Opening product-Image-->
					<a href="<?php echo $upload_path.$fullimage; ?>" rel="lightbox" title="<?php echo $title; ?>">
					<img src="<?php echo $upload_path.$fullimage; ?>" alt="<?php echo $title; ?>" width="140" height="200" /></a>
				</div><!--Closing product-Image-->
	
				<div class="product-details"><!--Opening Image Details-->
					<h3>Detalles de Imagen</span></h3>
					<ul>
						<li>Title:</span> <?php echo $title; ?></li>
						<li><span>Fecha:</span> <?php echo date('d-m-Y', strtotime($date_added));?></li>
						<li><span>Categoria:</span> <?php echo $category; ?></li>
				</div><!--Closing Image Details -->
				
				<div class="product-info"><!--Opening product-info-->
					
                    <div class="product-storyline">					
						<?php
						echo "<h3>$title</h3>";
						if ($storyline == "") 
						{
							?>
							<br />
							<p>No Experience Given</p>					
							<?php
						}
						else 
						{
							echo "<p>".$storyline."</p>";
						}
						?>
					</div>				
					
					<?php include("scripts/member_settings.php"); ?><!-- Logo External File-->
					<?php include("scripts/admin_edit_settings.php"); ?><!-- Logo External File-->                    

				</div><!--Closing product-info-->
			</div><!--Closing product--> 
			
		</div> <!--Closing Container -->
		<div class="full-footer"><!--Full Footer-->
			<?php include("scripts/footer.php"); ?><!-- Footer External File-->
		</div><!--End of Full Footer-->
	</body>
</html>