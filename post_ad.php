<?php
require 'connect.inc.php';
require 'template.php';
?>
<html>
<head>
<title>Post Ad  </title>
      <link rel="stylesheet" type="text/css" href="css/post_ad.css" />
	   
</head>
<body>

	<div id="box">
	     <center><h1>Post a free Ad here : </h1></center> <hr><br>
		 <div id="ad_data">
	     <form id="form1" method="POST" action="post_ad.php" enctype="multipart/form-data">
		 <table>
		 <tr>
			<td><p>Title : </p></td>
			<td><input type="text" name="title" ></td>
		 </tr>
		 <tr>
			<td><p>Upload image :</p></td>
			<td><input type="file" name="file1" ></td>
		 </tr>
		 <tr>
			<td><p>Select Category :</p></td>
			<td> <select name="list_id" id="test_select" value="Choose a category" onchange="display_subcat();">
			                                       <option name="mobile">Mobile and tablets</option>
												   <option name="edu">Electronics and Computers</option>
												   <option name="vehicle">Vehicle</option>
												   <option name="home">Home and furniture</option>
												   <option name="computer">Books and CD's</option>
												   <option name="electric"> Sports and health</option>
			            </select>
			 </td>
		 </tr>
		 <tr>
			<td><p>Sub Category :</p></td>
			<!-- <td><input type="text" name="sub_cat" id="sub_id"> </td> -->
			 <td> <select name="sub_cat" id="sub_id" >
			                              <option name="mobile">Mobile Phones</option>
												   <option name="edu">Tablets</option>
												   <option name="vehicle">Mobile Accessories</option>
			            </select>
			 </td>
		 </tr>
		 <tr>
			<td><p>Price	: </p></td>
			<td><input type="text" name="price" > </td>
		 </tr>
		 </table>
		 <p id="description">Description :</p>
		 <textarea rows="4" cols="30" id="textarea_id" name="description"></textarea><br><br><br>
		 <input type="submit" value="Post"  class="post_but"><br> 
         	
		 </form>
		 </div>
   </div> 


<?php

if(isset($_POST['title']) && isset($_POST['file']) && isset($_POST['list_id'])  && isset($_POST['sub_cat']) &&  isset($_POST['price']) && isset($_POST['description'])){
          
			$img = $_POST['file'];		
			$subcat=$_POST['sub_cat'];	
			$title=$_POST['title'];	
			$price=$_POST['price'];	
            $descrption =$_POST['description'];	
			 
			 //$user_id = $_SESSION['id'];
			 $user_id=1;
			 //echo $user_id;
			 $query = "SELECT `sub_cat_id` FROM `sub_category` WHERE `name`='$subcat' ";    //taking sub category id
			 $query_run = mysql_query($query);	
			 while($query_row= mysql_fetch_assoc($query_run)){
			      $sub_id = $query_row['sub_cat_id'];
			     // echo $sub_id;
			 }
           
		     $time = time();                              //getting date
			$date = date('d-m-y',$time);
			
			if(!empty($img) && !empty($subcat) && !empty($title) && !empty($price) && !empty($descrption)){ 
			
				   $query = "INSERT INTO `product` VALUES ('','".mysql_real_escape_string($user_id)."','".mysql_real_escape_string($title)."','".mysql_real_escape_string($descrption)."','".mysql_real_escape_string($img)."','".mysql_real_escape_string($price)."','".mysql_real_escape_string($sub_id)." ','".mysql_real_escape_string($date)."  ')";
				  if($query_run = mysql_query($query)){
				          
						echo '<div id="msg1"><script >alert("Successfully Posted.");</script></div>';  
						   // $name= $_FILES['file1']['name'];
							//echo $name;
				            //$tmp_path = $_FILES['file1']['tmp_name'];
							//echo $tmp_path;
							//$new_path = 'images/';
							 //if(move_uploaded_file($tmp_path,$new_path.$name)){
							  // echo 'file moved';
							 //}
							 
							 $query = " SELECT `user_id` FROM `alert` WHERE `subcat_id` = '$subcat' ";
							 $query_run = mysql_query($query);
							 $query_ele = mysql_fetch_array($query_run);
							  $user_id = $query_ele['user_id'];

                             $query = " SELECT `email` FROM `user` WHERE `user_id` = '$user_id' ";
							 $query_run = mysql_query($query);
							 $query_ele = mysql_fetch_array($query_run);
							 $email = $query_ele['email'];				

                            
						/*	$to=$email;
							$subject="About subscribed product";
							$sender = "eselling_team@gmail.com";
							$body = "Your subscribed product is avilable .";							 
				            
							if(mail($to , $subject ,$body ,$header)){
                               //echo 'Your<br>';
							   echo '<div id="msg1"><script >alert(" mail has been Sent!..");</script></div>';
                           }
							*/
						   }else{
						     echo '<div id="msg1">Sorry couldn\'t register now . Try agin later </div>';
					    }	
				}else{
				   echo 'All fields must be filled';
				}
	
        }

?>

      <script type="text/javascript" >
	    //var x= document.getElementById('title').value;
		//alert(x);
		function display_subcat(){
		      var select = document.getElementById("sub_id");
				while(select.options.length > 0){                
                       select.remove(0);		
		                }
						
						
		        var category =  document.getElementById('test_select').value;
		       // alert(category);
			  if(category=="Mobile and tablets"){
			       var val = document.getElementById('sub_id');
				 var option1 = document.createElement("option");
				 option1.text="Mobile Phones";
				 option1.value="Mobile Phones";
				val.add(option1,null);
				var option2 = document.createElement("option");
				 option2.text="Tablets";
				 option2.value="Tablets";
				val.add(option2,null);
				var option3 = document.createElement("option");
				 option3.text="Mobile Accessories";
				 option3.value="Mobile Accessories";
				 val.add(option3,null);
				  
				}
				
				 else if(category=="Electronics and Computers"){
			         //alert(category);
			    var val = document.getElementById('sub_id');
				var option1 = document.createElement("option");
				 option1.text="Camera and Accessories";
				 option1.value="Camera and Accessories";
				val.add(option1,null);
				var option2 = document.createElement("option");
				option2.text="Computer and Laptops";
				 option2.value="Computer and Laptops";
				val.add(option2,null);
				var option3 = document.createElement("option");
				option3.text="TV";
				 option3.value="TV";
				val.add(option3,null);
			   }
			   
			   else if(category=="Vehicle"){
			         //alert(category);
			    var val = document.getElementById('sub_id');
				var option1 = document.createElement("option");
				 option1.text="Cars";
				 option1.value="Cars";
				val.add(option1,null);
				var option2 = document.createElement("option");
				option2.text="Bikes";
				 option2.value="Bikes";
				val.add(option2,null);
				var option3 = document.createElement("option");
				option3.text="Scooters";
				 option3.value="Scooters";
				val.add(option3,null);
				var option4 = document.createElement("option");
				option4.text="Spare parts and Accessories";
				 option4.value="Spare parts and Accessories";
				val.add(option4,null);
			   }
			   
			   else if(category=="Home and furniture"){
			         //alert(category);
			    var val = document.getElementById('sub_id');
				var option1 = document.createElement("option");
				 option1.text="Furniture";
				 option1.value="Furniture";
				val.add(option1,null);
				var option2 = document.createElement("option");
				option2.text="Fridge";
				 option2.value="Fridge";
				val.add(option2,null);
				var option3 = document.createElement("option");
				option3.text="Washing machine";
				 option3.value="Washing machine";
				val.add(option3,null);
				var option4 = document.createElement("option");
				option4.text="Kitchen appliances ";
				 option4.value="Kitchen appliances ";
				val.add(option4,null);
				var option5 = document.createElement("option");
				option5.text="Other households ";
				 option5.value="Other households";
				val.add(option5,null);
			   }
			   
			   else if(category=="Books and CD's"){
			         //alert(category);
			    var val = document.getElementById('sub_id');
				var option1 = document.createElement("option");
				 option1.text="Books and Magazine ";
				 option1.value="Books and Magazine ";
				val.add(option1,null);
				var option2 = document.createElement("option");
				option2.text="CD and DVD";
				 option2.value="CD and DVD";
				val.add(option2,null);
			   }
				
			   else if(category=="Sports and health"){
			         //alert(category);
			    var val = document.getElementById('sub_id');
				var option1 = document.createElement("option");
				 option1.text="Sports Equipment";
				 option1.value="Sports Equipment";
				val.add(option1,null);
				var option2 = document.createElement("option");
				option2.text="Gym and Fitness";
				 option2.value="Gym and Fitness";
				val.add(option2,null);
				var option3 = document.createElement("option");
				option3.text="Health and bueaty";
				 option3.value="Health and bueaty";
				val.add(option3,null);
			   }

		}
		
		
		
	   </script>
   </body>

</html>