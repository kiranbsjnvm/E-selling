<?php
require 'index.php';
if(isset($_POST['l_email']) && isset($_POST['l_password'])){
  
       $email = $_POST['l_email'];
	   $password = $_POST['l_password'];
  
		 if(!empty($email) && !empty($password)){

		    $query = "SELECT `user_id` FROM `user` WHERE `email`='$email' AND `password` = '$password' ";
            $query_run = mysql_query($query);

            $query_rows = mysql_num_rows($query_run);
            
               if($query_rows == 0){
                   echo 'Inavlid username or password<br><br>';
                }else if($query_rows>=1){
				 
				  session_start();
				  $query_id = mysql_result($query_run,0,'user_id');
				  $_SESSION['user_id'] = $query_id; 
				  
				  $query = "SELECT first FROM name WHERE name_id IN (SELECT name_id FROM user  WHERE user_id='$query_id') ";
                  $query_run = mysql_query($query);
				  $query_ele=mysql_fetch_array($query_run);
				  $username= $query_ele['first'];
				 
                 $_SESSION['username']=$username;
				 // echo 'You Logged in';
                 //$_SESSION['id']=$user_id;
				  header('Location: home.php');
				}
				
		 }
      }


?>