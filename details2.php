
<?php
 include('template.php');
require('connect.inc.php');

$user_id=123;
$query="SELECT * FROM `product`";
$query_run = mysql_query($query);
$query_ele=mysql_fetch_array($query_run);
//if(mysql_fetch_array($query_run)== NULL){
	//      echo '<br> Sorry no result <br>';
		//}else {
		  //     $query_row = mysql_fetch_assoc($query_run);
			//   print_r ($query_ele['image']);
	       //}
?>
<html>
<head>
</head>

<body>
<div  style="margin-top:16px">

<div align=""  style="font-size:25px;margin-left:17%;" ><?php
	echo $query_ele['title'];
	  ?>
</div>
</div>
</br>

<div align="center">
<div class="col-md-6" style="margin-left:10%;font-size:20px;" >
	<img src=<?php
	echo $query_ele['image'];
	?> width="500" height="390">
</div>
</div>
<div style="color:;margin-left:10%;margin-top:45px;font-size:20px;">
<div style="font-size:28px;">Price  </div>
<div style="font-size:29px;">Rs<?php
	echo $query_ele['price'];
	  ?> </div>

</div>
</br>

<div style="margin-left:0%;font-size:28px;">Category
<div style="color:;margin-left:10%;font-size:15px;"><?php
 echo $query_ele['sub_category_id'];
?>
</div>
</div>
<div style="margin-left:25%;font-size:28px;">Sub-Category</div>
<div style="margin-left:%;font-size:15px;"><?php
 echo "SUb CAtegory";
//echo $query_ele['sub_category_id'];
?>
</div>

</br></br></br></br></br>
</br></br></br>
<div  style="margin-left:30%;font-size:28px;margin-top:5px">
Description
</br>
<div  style="font-size:18px;margin-left:20%" ><?php
echo "describing the image u see above";
	echo $query_ele['description'];
	  ?>
</div>
</div>
</div>

<!--<table align="center"  width="600px" height="500px">
<tr>
<td>Title &nbsp;&nbsp;</td>
<td><label>
<?php
	echo $query_ele['title'];
	  ?></label>
</td>
</tr>
<tr>
<td>IMAGE AREA &nbsp;&nbsp;</td>
<td><label>
<?php
echo '<img src="images/6.jpg" width="300px" height="200">';
?>
</label></td>
</tr>
<tr>
</hr>
<td>price &nbsp;&nbsp;</td>
<td><label><?php
echo $query_ele['price'];
?></label></td>
</tr>
<tr>
<td>Description &nbsp;&nbsp;</td>
<td><label><?php
 
echo $query_ele['description'];
?></label></td>
</tr>

<tr>
<td>Category &nbsp;&nbsp;</td>
<td><label><?php
 
echo $query_ele['sub_category_id'];
?></label></td>
</tr>

<tr>
<td>Sub-Category &nbsp;&nbsp;</td>
<td><label><?php
 
echo $query_ele['sub_category_id'];
?></label></td>
</tr>

<tr>
<td>User-Details &nbsp;&nbsp;</td>
<td><label><?php
echo $query_ele['user_id'];
?></label></td>
</tr>
</table>-->
</body>
</html>