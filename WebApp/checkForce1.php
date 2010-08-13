<?php

include ("config.php");
  
$result = mysql_query("SELECT  Force1 FROM  Couple WHERE  current = '1' LIMIT 0 , 30");



$row = mysql_fetch_row($result);



echo $row[0];

mysql_close();

   
?>
