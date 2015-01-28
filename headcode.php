<?php

	$limit = 9;
	$page=$_GET['page'];
	if(empty($page) || $page<1){
		$page = 1;
	}

	$offset = ($page - 1) * $limit + 1;


	$query = "SELECT `title`, `image`, `price` FROM `product` ORDER BY `date` DESC LIMIT $offset, $limit";
	
	if($query_run = mysql_query($query)){
		$check = 1;
		//display query results
		if(mysql_num_rows($query_run)==NULL){
			echo 'No results found';
		}else{
			echo '<br /><br />';
			echo '<div class="table_offset">';
			echo '<table id="item_table" width="80%">';
			$count = 1;
			while($query_row = mysql_fetch_assoc($query_run)){
				$image = "images/".$query_row['image'];
				$title = $query_row['title'];
				$price = $query_row['price'];

				if($count%3===1){
					echo '<tr>';
					echo '<td>';
					echo '<img src="'.$image.'" class="img-thumbnail" height="140px" width="140px"/>';
					echo '<br><br><a href="#" id="title">'.$title.'</a>';
					echo '<p id="price">Price: Rs.'.$price.'</p>';
					echo '</td>';
				}
				else if($count%3===0){
					echo '<td>';
					echo '<img src="'.$image.'" class="img-thumbnail" height="140px" width="140px"/>';
					echo '<br><br><a href="#" id="title">'.$title.'</a>';
					echo '<p id="price">Price: Rs.'.$price.'</p>';
					echo '</td>';
					echo '</tr>';
				}else{
					echo '<td>';
					echo '<img src="'.$image.'" class="img-thumbnail" height="140px" width="140px"/>';
					echo '<br><br><a href="#" id="title">'.$title.'</a>';
					echo '<p id="price">Price: Rs.'.$price.'</p>';
					echo '</td>';
				}
				echo '</div>';
				/*$food = $query_row['food'];
				$calories = $query_row['calories'];
				echo $food.' has '.$calories.' calories.<br />'; */
				$count += 1;
			}
			

		}

	}else{
		mysql_error();
	}

?>