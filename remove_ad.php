<?php 
include('template.php');
require 'connect.inc.php';
//session_start();

$user_id=$_SESSION['user_id'];
$query="SELECT * FROM `product` WHERE `user_id`='$user_id' ";
$query_run = mysql_query($query);

?>


<html>
<head>
<title>E-Selling</title>
 <style type="text/css">
   #box {border:1px solid black;
           margin:50px 230px;
		   padding:20px;}
 </style>
</head>
<body>
<div id="box" >
<?php

while($query_ele=mysql_fetch_array($query_run)){
		//echo '<img src="'.$query_ele["image"].'" height =140 width=140 />';
echo '<div  style="margin-top:16px">';
echo '<div style="font-size:25px;margin-left:17%;" >';
 echo $query_ele['title']; 
 echo '</div>';
echo '</div>';
echo '</br>';
echo '<div align="center">';
echo '<div class="col-md-6" style="margin-left:10%;font-size:20px;" >';
echo '<img src="images/'.$query_ele["image"].'" height =175 width=300 />';

echo '</div>';
echo '</div>';
echo '<div style="color:;margin-left:10%;margin-top:45px;font-size:20px;">';
echo '<div style="font-size:28px;">Price  </div>';
echo '<div style="font-size:29px;">Rs';
echo  $query_ele['price'];
echo '</div>';
echo '</div>';
$p_id=$query_ele['p_id'];
//echo '<input type="button"  value="Remove" class="btn btn-danger" id="subscribe" /> '; 
echo '<a href="delete_ad.php?prod_id='.$p_id.' "> <button class="btn btn-danger" id="subscribe" >DELETE</BUTTON> </a>';
echo '<hr><br>';
 }
 
?>
</div>
</body>

<script>
function preparePage(){
document.getElementById("subscribe").onclick {
alert('honbf');
}//= function(){alert("<?PHP hello(); ?>");};
}
window.onload =  function() {
	preparePage();
};
</script>
</html>