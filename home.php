<?php

	require 'connect.inc.php';
	require 'template.php';
    //echo $_POST['like'];
	
	$limit = 9;
	if(isset($_GET['page']))
		$page=$_GET['page'];
	else
		$page =1;
	if(empty($page) || $page<1){
		$page = 1;
	}

	$offset = ($page - 1) * $limit;

	if(isset($_GET['subcategory'])){
		$subcategory = $_GET['subcategory'];
		$query = "SELECT `title`, `image`, `price` ,`p_id` FROM `product` WHERE `sub_category_id` = $subcategory ORDER BY `p_id` DESC LIMIT $offset, $limit";
	}
	else if(isset($_GET['like'])){
		$search = $_GET['like'];
		//echo $search;
		$query = "SELECT `title`, `image`, `price`,`p_id` FROM `product` WHERE `sub_category_id` IN (SELECT sub_cat_id FROM sub_category WHERE name LIKE '%$search%') ORDER BY `p_id` DESC LIMIT $offset, $limit";
	}else{
		$query = "SELECT `title`, `image`, `price` ,`p_id` FROM `product` ORDER BY `p_id` DESC LIMIT $offset, $limit";
	}
	
	if($query_run = mysql_query($query)){
		$rows = mysql_num_rows($query_run);
		$check = 1;
		//display query results
		if(mysql_num_rows($query_run)==NULL){
			echo '<p style="margin:2% 17%; color:red;font-size:20px;">Sorry, No results found!</p>';
		}else{
			echo '<br /><br />';
			echo '<div class="table_offset">';
			echo '<table id="item_table" width="80%">';
			$count = 1;
			while($query_row = mysql_fetch_assoc($query_run)){
			  
				$image = "images/".$query_row['image'];
				$title = $query_row['title'];
				//echo $title;
				$price = $query_row['price'];

				if($count%3===1){
				     $p_id = $query_row['p_id'];
				     //echo $p_id;
					echo '<tr>';
					echo '<td>';
					echo '<img src="'.$image.'" class="img-thumbnail" height="140px" width="140px"/>';
					echo '<br><br><a href="details.php?prod_id='.$p_id.' " id="title">'.$title.'</a>';
					echo '<p id="price">Price: Rs.'.$price.'</p>';
					echo '</td>';
				}
				else if($count%3===0){
				 $p_id = $query_row['p_id'];
					echo '<td>';
					echo '<img src="'.$image.'" class="img-thumbnail" height="140px" width="140px"/>';
					echo '<br><br><a href="details.php?prod_id='.$p_id.' " id="title">'.$title.'</a>';
					echo '<p id="price">Price: Rs.'.$price.'</p>';
					echo '</td>';
					echo '</tr>';
				}else{
				 $p_id = $query_row['p_id'];
					echo '<td>';
					echo '<img src="'.$image.'" class="img-thumbnail" height="140px" width="140px"/>';
					echo '<br><br><a href="details.php?prod_id='.$p_id.'" id="title">'.$title.'</a>';
					echo '<p id="price">Price: Rs.'.$price.'</p>';
					echo '</td>';
				}

				echo '</div>';
				$count += 1;
			}
			echo '</table>';
			echo '<br/><br />';
		}

	}else{
		mysql_error();
	}

	if(isset($rows) && $rows>0){
		echo '<div class="col-md-3 col-md-offset-1">';
		echo '<a href="home.php?page='.($page-1).'"><input type="button"  value="Prev" class="btn btn-warning" />  </a>';
		echo '</div>';

		echo '<div class="col-md-3" style="margin-top:1%">';
		echo '<p>Page '.$page.'</p>';
		echo '</div>';

		echo '<div class="col-md-3">';
		echo '<a href="home.php?page='.($page+1).'"><input type="button"  value="Next" class="btn btn-warning" />  </a>';
		echo '</div>';
		echo '<br /><br />';
	}
?>

<?php
	

?>

<html>

	<head>
		<title>Home</title>
		<link rel="stylesheet" href="css/home.css" />
	</head>

	<body>
		<!--<div id="footer"></div>-->
	</body>

</html>