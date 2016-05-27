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
	<body onLoad='sendcat("all");'>
		<?php echo $msgerror; ?><!-- Echo Error Message-->
		<?php $cat = $_GET['cat']; ?>
		<input type="hidden" name="cattype" id="cattype" value="<?php echo $cat; ?>"/>
		
        <div class="fullnav"><!--FullNav-->
            <div class="logo"><?php include("scripts/logo.php"); ?><!-- Logo External File--></div>
            <div class="centernav"><!--CenterNav-->
				 <?php include("scripts/menu.php"); ?><!-- Navigation External File-->
				 <div id="loginNav">
				 	<?php include("scripts/user_navigation.php"); ?>
				</div> 
			</div><!-- End of CenterNav-->
        </div><!-- End of FullNav-->	
        <div id="container"><!--Start of Container-->
			<div class="left-column"><!-- Start of Left Column-->
				<h2>Categorias</h2>
				<?php
				//Connect To Database
				include ('db/connect_to_db.php');
	            //Search the Database to check to see if the product in the database column matches the select product and order it by descending order
				$lftresult = mysqli_query($conn,"SELECT distinct category FROM picture WHERE mediatype='".$cat."' GROUP BY category");	
					while($leftrow = mysqli_fetch_array($lftresult))
					{ 
						$category = $leftrow["category"];
						?>
						
						<div class='left-choicediv'><!--specialoffer-divs-cols-->
							<input type="button" class="cat" id="catlink" value="<?php echo $category; ?>" onclick="sendcat(this.value);" />
						</div><!-- End of left-choicediv-->
						<?php
					}
				?>
			</div><!-- End of Left Column-->
        </div><!-- End of Container-->
			<?php 

			?>		
		<div class="full-footer"><!--Full Footer-->
			<?php include("scripts/footer.php"); ?><!-- Footer External File-->
		</div><!--End of Full Footer-->
	</body>
</html>