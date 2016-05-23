<?php
	//Name: SPT
	//Version: 1.0
	//Mayo 2016
	//Plataformas HouseMedia

	//Comments External File
	
	//Connect To Database
	include ('db/connect_to_db.php');

	//Search the Database to check to see if the movie in the database column matches the select movie and order it by descending order
	$query = mysqli_query($conn,"SELECT * FROM usercomments WHERE picid = '".$picid."' ORDER BY date_added DESC ");
	$num_check = mysqli_num_rows($query);		
	//print Out on the screen a div tag with the comments header
	?>
	<div id='commenthead'><h3>Comments</h3></div><br>
	<?php
	//if numrow is equal to 0
	if ($num_check == 0 || $num_check == "") 
	{		
		//print Out on the screen a div tag with the list of comments for the movie
		?>
		<div id='usercomments'><h4>No Comments have been Found</h4></div>
		<?php
	} 
	else 
	{
		while($row = mysqli_fetch_array($query))
		{ 			
			//Get columns from database from store in variables
			$username = $row["username"];
			$date = $row["date_added"];
			$commenttext = $row["commenttext"];	
							
			//Echo Usercomments Div Tag Opening
			echo "<div id='usercomments'>";
			//Echo comment-rating Div Tag Opening
			echo "<div id='comment-rating'>";
			//Use echo to print out ratings and username and date
			echo "<span>".$username."</span> Subido el <span> ".date('d-m-Y', strtotime($date))."<br>";
			//Echo comment-rating Div Tag Closing
			echo "</div><br/>";
			//Echo maincomment Div Tag Opening
			echo "<div id='maincomment'>";
			// echo to Comment H4
			echo "<h4>Comment</h4>";
			//Echo to print out Comment
			echo "".$commenttext."<br>";
			//Echo maincomment Div Tag Closing
			echo "</div><br/>";
			//Echo Usercomments Div Tag Closing
			echo "</div><br/>";
		}				
	}
	
	mysqli_close($conn);	
	
?>