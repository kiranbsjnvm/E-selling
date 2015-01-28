<?php
require 'index.php';
//require 'connect.inc.php';
 
	      if(isset($_POST['first'])  && isset($_POST['middle']) && isset($_POST['last']) && isset($_POST['email'])  && isset($_POST['password1']) 
		  && isset($_POST['password2'])  && isset($_POST['phno']) && isset($_POST['area'])  && isset($_POST['city']) && isset($_POST['pincode']) 
		  && isset($_POST['state'])){
	
                 $first = $_POST['first'];  $middle = $_POST['middle']; $last = $_POST['last'];
				 $email = $_POST['email'];
				 $password1 = $_POST['password1']; $password2 = $_POST['password2'];
				 $phno = $_POST['phno'];
				 $area = $_POST['area'];  
				 $city = $_POST['city']; 
				 $pincode = $_POST['pincode'];
				 $state = $_POST['state'];
                  
            if($password1 == $password2) {
				  
                if(!empty($first) && !empty($last)  && !empty($email) && !empty($password1) && !empty($phno) && !empty($area) && !empty($city) && !empty($pincode) && !empty($state) ){
				  // echo 'registerd !!....';
					  $query = "SELECT `user_id` FROM `user` WHERE `email`='$email' ";
					  $query_run = mysql_query($query);
					  
					  if(mysql_num_rows($query_run)==1){
					    echo '<div id="msg1"> * Sorry this user already exist !..Choose another </div>'; 
					  }else {
					  
						$query = " INSERT INTO `name` VALUES (' ',' ".mysql_real_escape_string($first)." ' , ' ".mysql_real_escape_string($middle)." ' , ' ".mysql_real_escape_string($last)." ')";
						   if($query_run = mysql_query($query)){
						   
								$query = " INSERT INTO `address` VALUES (' ',' ".mysql_real_escape_string($area)." ' , ' ".mysql_real_escape_string($city)." ' , ' ".mysql_real_escape_string($pincode)." ' , ' ".mysql_real_escape_string($state)." ')";
								if($query_run = mysql_query($query)){
									//echo 'Successfully registered.';
							       
										$query = "SELECT `name_id` FROM `name` ORDER BY `name_id` DESC LIMIT 1 ";
										$query_run = mysql_query($query);
										$query_rows = mysql_num_rows($query_run);
										if($query_rows==1){
										    $name_id = mysql_result($query_run,0,'name_id');
											echo $name_id;
										 }
										 
										 $query = "SELECT `address_id` FROM `address` ORDER BY `address_id` DESC LIMIT 1";
										$query_run = mysql_query($query);
										$query_rows = mysql_num_rows($query_run);
										if($query_rows == 1){
										    $address_id = mysql_result($query_run,0,'address_id');
											echo $address_id;
										 }
										 
											$query = " INSERT INTO `user` VALUES (' ',' ".mysql_real_escape_string($name_id)." ' , ' ".mysql_real_escape_string($email)." ' , ' ".mysql_real_escape_string($password1)." ' , ' ".mysql_real_escape_string($phno)." ' ,  ' ".mysql_real_escape_string($address_id)." ')";
										    	if($query_run = mysql_query($query)){
												 //echo 'success';
												 header('Location:index.php');
							                      echo '<script >alert("Successfully registered.");</script>';
												  
											   }else{
														echo 'Sorry couldn\'t register now  <br>';
											}	
									   
								}else{
										echo 'Sorry couldn\'t register now . Try agin later <br>';
									}	
									
					   }else{
						     echo 'Sorry couldn\'t register now . Try agin later <br>';
					    }		
				   }		   
				}else{
				  echo '<div id="msg1">* All fields must be filled</div>';
				}
				
			 }else {
			        echo '<div id="msg1">Password didn\'t matched</div>';
			 }
			 
           }
?>
<html>
<head>
    <style type="text/css">
	   #ms {position:absolute;
	                 top:150px;
					 left:1050px;
					 color:red;}
	</style>
</head>
<body>
</body>
</html>