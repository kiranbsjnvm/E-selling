<?php
   require 'connect.inc.php';
    require 'template.php';

  $product_id = $_GET['prod_id'];
  //echo $product_id;
  
   $query="SELECT * FROM `product` WHERE `p_id`='$product_id' ";
   $query_run = mysql_query($query);
   $query_ele=mysql_fetch_array($query_run);
   // echo $query_ele['image']; 
?>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="css/details.css" />
</head>
<body>
<?php echo '<img src=" images/'.$query_ele["image"].'" width="400px" height="400px" id="img_id" />';?>

<div id="box" >
 <div id="title" > <?php echo $query_ele['title'];?> </div>
 <br>
<div id="price">Rs <?php echo $query_ele['price']; ?> </div>	  
 <br>
 <div id="id">Description: <div> 
<div  id="disc" > <?php echo $query_ele['description']; ?> </div>
<br><br><br>
 <center><a href="#">   <input type="button"  value="Users details" class="but"/>  </a> </center>
</div>
</body>
</html>