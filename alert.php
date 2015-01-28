<?php
require 'template.php';
require 'connect.inc.php';

 //$user_id = $_SESSION['id'];
  $user_id = 1 ;

	if(isset($_POST['submit'])){//to run PHP script on submit
		if(!empty($_POST['check_list'])){
			// Loop to store and display values of individual checked checkbox.
		   foreach($_POST['check_list'] as $selected){
			   //echo $selected;
			   
			    $query = "INSERT INTO `alert` VALUES (' ".mysql_real_escape_string($user_id)." ',' ".mysql_real_escape_string($selected)." ')";
			   if($query_run = mysql_query($query)){
							 // echo '<div id="msg1"> Successfully registered.</div>';
							echo '<div id="msg1"><script >alert("Successfully subscribed.");</script></div>';
						   }else{
						     echo '<div id="msg1">Sorry couldn\'t subscribe now . Try agin later </div>';
				 }	
			}
		}
	}
?>

<html>
<head>
<title>Free alert subscribe</title>
<link rel="stylesheet" type="text/css" href="css/alert.css" />
<body>

<div id ="box">
        <form method="POST" action="alert.php" name="subscribe">
		  <div class="category1" > <p id="category1_id">Mobile and tablets  </p> 
							<input type="checkbox" name="check_list[]"  id="select" value="1"/> Mobile Phones  <br>
							<input type="checkbox" name="check_list[]"  value="2"/> Tablets <br>
							<input type="checkbox" name="check_list[]" value="3"/> Mobile Accessories <br>  </div>
			<div class="category2" ><p id="category2_id">Electronics and Computers  </p> 
							<input type="checkbox" name="check_list[]"  value="4"/> Camera and Accessories <br>
							<input type="checkbox" name="check_list[]"  value="5"/> Computer and Laptops<br>
							<input type="checkbox" name="check_list[]" value="6"/> TV<br>		</div>
             <div class="category3" ><p id="category3_id">Sports and health </p> 
							<input type="checkbox" name="check_list[]"  value="18"/> Sports Equipmen<br>
							<input type="checkbox" name="check_list[]"  value="19"/> Gym and Fitness<br>
							<input type="checkbox" name="check_list[]" value="20"/> Health and bueaty<br>		</div>		
               <div class="category4" ><p id="category4_id">Vehicle</p> 
							<input type="checkbox" name="check_list[]"  value="7"/> Cars<br>
							<input type="checkbox" name="check_list[]"  value="8"/> Bikes<br>
							<input type="checkbox" name="check_list[]"  value="9"/> Scooters<br>
							<input type="checkbox" name="check_list[]" value="10"/> Spare parts and Accessories<br>		</div>		
                 <div class="category5" ><p id="category5_id">Home and furniture </p> 
							<input type="checkbox" name="check_list[]"  value="11"/> Furniture<br>
							<input type="checkbox" name="check_list[]"  value="12"/> Fridge<br>
							<input type="checkbox" name="check_list[]"  value="13"/> Washing machine<br>
							<input type="checkbox" name="check_list[]" value="14"/> Kitchen appliances <br>		
							<input type="checkbox" name="check_list[]"  value="15"/> Other households<br></div>		
				<div class="category6" ><p id="category6_id">Books and CD's</p> 
							<input type="checkbox" name="check_list[]"  value="16"/> Books and Magazine <br>
							<input type="checkbox" name="check_list[]" value="17"/> CD and DVD	</div>	

                	<input type="submit" value="Subscribe" name="submit" id="subscribe_but"/>						
		  </form>
</div>

</body>
</head>
</html>