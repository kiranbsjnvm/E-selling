<?php
require 'connect.inc.php';

  $p_id = $_GET['prod_id'];
  echo $p_id;
  
    $query = "DELETE FROM `product` WHERE `p_id`='$p_id' ";

			if($query_run = mysql_query($query)){
			   echo 'product deleted';
			   header('Location:remove_ad.php');
			}

?>