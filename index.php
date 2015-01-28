<?php
require 'connect.inc.php';
//session_start();

  //if(session_status() == PHP_SESSION_ACTIVE)
   //  {header('Location:home.php');}
   
   
?>

<html>
<head>
<title>e-Shopping</title>
 <link rel="stylesheet" type="text/css" href="index.css" />

</head>
<body >
<div id="header">
      <h1>e-Shopping</h1>
	    <!-- <p id="p1">Login</p> -->
	   <form  method="POST" action="login.php" id="form1">

	      Email : <input type="text" name="l_email"/>
		  Password : <input type="password" name="l_password"/> 
		  <input type="submit" value="Login" id="Login" /> <br>
		  <pre>                   Forgot password?</pre> 
	   </form>
</div> 

<!-- <img src="images/img1.jpg" width="600px" height="300px" id="img_id" "> -->
<div id="sign_up">
    <h2>Sign up </h2>
	   <form  method="POST" action="update_user_table.php" id="form2">
	   <table>
	      <tr>
		       <td colspan="2">Name : </td>
		  </tr>
		  <tr>
		       <td >First : <input type="text" name="first"  size="7"/> </td>
			   <td >Middle : <input type="text" name="middle" size="7" /> </td>
			   <td >Last : <input type="text" name="last" size="7"/></td>
		  </tr>
		  <tr>
		       <td> Email : </td>
			   <td rowspan="1"><input type="text" name="email"/></td>
		  </tr>
		   <tr>
		       <td> Password : </td>
			   <td rowspan="1"><input type="password" name="password1"/></td>
		  </tr>
		   <tr>
		       <td> Retype Password : </td>
			   <td rowspan="1"><input type="password" name="password2"/></td>
		  </tr>
		  <tr>
		       <td> Phone no : </td>
			   <td rowspan="1"><input type="text" name="phno"/></td>
		  </tr>
		  <tr>
					 <td colspan="2">Address : </td>
		  </tr>
		  <tr>
		         <td></td>
			   <td >Area : <input type="text" name="area" size="10" />  </td>
			   <td >City :<input type="text" name="city" size="10"/>  </td>
		  </tr>
		  <tr>
		          <td></td>
			  <td >Pincode : <input type="text" name="pincode" size="10"/>  </td>
			   <td >State : <input type="text" name="state" size="10"/> </td>
		  </tr>
	   
	   </table> 
	    <br> <br>
		             <center> <input type="submit" value="Submit" id="submit"/> </center><br> <br>		 
	   </form>
</div>
</body>
</html>
