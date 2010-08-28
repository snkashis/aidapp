<?php  
  
    include ("config.php");    
    $clear_results = "UPDATE Results SET resp_shake = '0',resp_shout = '0',ab_chin =  '0',ab_breathing = '0',ab_telephone = '0',cpr_compressions = '0',cpr_chin =  '0',cpr_nose = '0',cpr_breaths = '0' WHERE id='guest'";
    $clear_practice = "UPDATE Practice SET resp_shake = '0',resp_shout = '0',ab_chin =  '0',ab_breathing = '0',ab_telephone = '0',cpr_compressions = '0',cpr_chin =  '0',cpr_nose = '0',cpr_breaths = '0' WHERE id='guest'";
    
    $clear_states = "UPDATE Couple SET  tilt =  '0',force1 =  '0',force2 =  '0',temp =  '0',shake =  '0', audio =  '0' WHERE id='guest'";
 
    mysql_query($clear_results) or die(mysql_error());
    mysql_query($clear_practice) or die(mysql_error());
    mysql_query($clear_states) or die(mysql_error());
  
?>  