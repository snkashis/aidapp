<?php  
  
    include ("config.php");    
    
    $did_shake = $_GET['shout'];
    $did_shout = $_GET['shake'];
    
    $set_shake = "UPDATE Results SET resp_shake='1'";
    $set_shout = "UPDATE Results SET resp_shout='1'";
    
    
    if ($did_shake=='1'){
    mysql_query($set_shake) or die(mysql_error());
    
    echo 'SUCCESS, resp_shake is now 1';
    }
    
    
    if ($did_shout=='1') {
    mysql_query($set_shout) or die(mysql_error());        
    echo 'SUCCESS, resp_shout is now 1';    
    }
    
?>  