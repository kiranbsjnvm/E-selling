<?php

  $mysql_host = 'localhost';
  $mysql_user = 'root';
  $mysql_pass = '';
  
  $connect_error = 'Sorry could not connect ';
  
  if(!@mysql_connect($mysql_host,$mysql_user,$mysql_pass) || !@mysql_select_db('eselling')){
           
		   die($connect_error);
    }
  
?>