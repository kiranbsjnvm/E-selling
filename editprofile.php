<?php
require 'template.php';
require 'connect.inc.php';

 $user_id = $_SESSION['user_id'];

		$query = "SELECT * FROM user,name,address WHERE user.user_id='$user_id' AND user.name_id=name.name_id AND user.address_id=address.address_id";
          $query_run = mysql_query($query);		
		  while($query_row= mysql_fetch_assoc($query_run)){
		            $pasword = $query_row['password'];
			       $email = $query_row['email'];
				   $phone = $query_row['phone'];
				   $first_name = $query_row['first'];
			       $middle_name = $query_row['middle'];
				   $last_name = $query_row['last'];
				   $area_name = $query_row['area'];
			       $city_name = $query_row['city'];
				   $pincode_name = $query_row['pincode'];
				   $state_name = $query_row['state'];
		     }	
?>

<?php

if(isset($_POST['first']) && isset($_POST['middle']) && isset($_POST['last'])  && isset($_POST['email']) &&  isset($_POST['password1']) &&  isset($_POST['password2'])  && isset($_POST['phone'])  && isset($_POST['area'])  && isset($_POST['city']) &&  isset($_POST['pincode']) && isset($_POST['state'])){
          
			$first = $_POST['first'];		
			$middle=$_POST['middle'];	
			$last=$_POST['last'];	
			$email=$_POST['email'];	
            $password1 =$_POST['password1'];	
		    $password2 =$_POST['password2'];	
			$phone = $_POST['phone'];		
			$area=$_POST['area'];	
			$city=$_POST['city'];	
			$pincode=$_POST['pincode'];	
			$state=$_POST['state'];	
			
			$query = "SELECT `name_id` FROM `user` WHERE `user_id`='$user_id' ";    //taking sub category id
			 $query_run = mysql_query($query);	
			 while($query_row= mysql_fetch_assoc($query_run)){
			      $name_id = $query_row['name_id'];
			    // echo $name_id;
			 }
				
			$query = "SELECT `address_id` FROM `user` WHERE `user_id`='$user_id' ";    //taking sub category id
			 $query_run = mysql_query($query);	
			 while($query_row= mysql_fetch_assoc($query_run)){
			      $address_id = $query_row['address_id'];
			     //echo $address_id;
			 }	
			 
			if(!empty($first) && !empty($last) && !empty($email) && !empty($password1) && !empty($password2) && !empty($phone) && !empty($area) && !empty($city) && !empty($pincode) && !empty($state) ){ 
				   
				   if($password1==$password2){
				   $query = "UPDATE `user` SET `password`='$password1' , `email`='$email' , `phone`='$phone' WHERE `user_id`='$user_id' ";
					 if($query_run = mysql_query($query)){
							 // echo '<div id="msg1"> Successfully registered.</div>';
							//echo '<div id="msg1"><script >alert("Successfully registered.");</script></div>';
							//echo 'successfully updated user';
							 
							 $query = "UPDATE `name` SET `first`='$first' , `middle`='$middle' , `last`='$last' WHERE `name_id`='$name_id' ";
							    if($query_run = mysql_query($query)){
								     //echo 'successfully updated name';
								         
										  $query = "UPDATE `address` SET `area`='$area' , `city`='$city' , `pincode`='$pincode' , `state`='$state' WHERE `address_id`='$address_id' ";
											if($query_run = mysql_query($query)){
													echo 'successfully updated address';
								
											}
								}
							
							}
					}else { echo '<div id="pwd_id">Password does\'t matched</div>';}		
							
				}else{
				   echo 'All fields must be filled';
				}
	
        }

?>

<html>
<head> <title> Edit your profile</title>
   <link rel="stylesheet" type="text/css" href="css/editprofile.css" />
</head>
<body>
      
	  <div id="main_body">
	         <center> <h2>Edit your Profile </h2> </center><hr>
			   <form id="form1" method="POST" action="editprofile.php">
				 <table>
					 <tr>
						<td><p>First name  : </p></td>
						<td><input type="text" name="first" value="<?php echo $first_name?>"></td>
					 </tr>
					 <tr>
						<td><p>Middle name  : </p></td>
						<td><input type="text" name="middle" value="<?php echo $middle_name?>"></td>
					 </tr>
					 <tr>
						<td><p>Last name  : </p></td>
						<td><input type="text" name="last" value="<?php echo $last_name?>"></td>
					 </tr>
					 <tr>
						<td><p>Email : </p></td>
						<td><input type="text" name="email" value="<?php echo $email?>"></td>
					 </tr>
					 <tr>
						<td><p>Password : </p></td>
						<td><input type="password" name="password1" value="          "></td>
					 </tr>
					 <tr>
						<td><p>Retype Password : </p></td>
						<td><input type="password" name="password2" value="          "></td>
					 </tr>
					 <tr>
						<td><p>Phone No : </p></td>
						<td><input type="text" name="phone" value=" <?php echo $phone?>"></td>
					 </tr>
					 <tr>
						<td><p>Address : </p></td>
						<td></td>
					  </tr>	
					  <tr>
						<td><p>Area : </p> <input type="text" name="area" value=" <?php echo $area_name?>"></td>
						<td><p>City: </p> <input type="text" name="city" value=" <?php echo $city_name?>"></td>
					 </tr>
					 <tr>
						<td><p>Pin code : </p>  <input type="text" name="pincode" value=" <?php echo $pincode_name?>"></td>
						<td><p>State : </p>  <input type="text" name="state" value=" <?php echo $state_name?>"></td>
					 </tr>
				 </table>
				          <br><br>
						<div id="buttons"> <input type="submit" value="Save changes" />
						 <input type="button" value="Cancel" />
						 </div>
				 </form>
        </div>
</body>
</html>
	

