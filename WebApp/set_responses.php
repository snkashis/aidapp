<?php  
  
    include ("config.php");    
    
    $did_danger = $_GET['danger'];
    
    $did_resp_shake = $_GET['resp_shake'];
    $did_resp_shout = $_GET['resp_shout'];
    
    $did_ab_chin = $_GET['ab_chin'];
    $did_ab_breathing = $_GET['ab_breathing'];
    $did_ab_telephone = $_GET['ab_telephone'];
    
    $did_cpr_compressions = $_GET['cpr_compressions'];
    $did_cpr_chin = $_GET['cpr_chin'];
    $did_cpr_nose = $_GET['cpr_nose'];
    $did_cpr_breaths = $_GET['cpr_nose'];
    //
    
    $set_danger = "UPDATE Results SET danger='1'";
    
    $set_resp_shake = "UPDATE Results SET resp_shake='1'";
    $set_resp_shout = "UPDATE Results SET resp_shout='1'";
    
    $set_ab_chin = "UPDATE Results SET ab_chin='1'";
    $set_ab_breathing = "UPDATE Results SET ab_breathing='1'";
    $set_ab_telephone = "UPDATE Results SET ab_telephone='1'";
    
    $set_cpr_compressions = "UPDATE Results SET cpr_compressions='1'";
    $set_cpr_chin = "UPDATE Results SET cpr_chin='1'";
    $set_cpr_nose = "UPDATE Results SET cpr_nose='1'";
    $set_cpr_breaths = "UPDATE Results SET cpr_breaths='1'";
  
    if ($did_danger=='1'){
    mysql_query($set_danger) or die(mysql_error());
    
    echo 'SUCCESS, danger is now 1';
    }
  
    if ($did_resp_shake=='1'){
    mysql_query($set_resp_shake) or die(mysql_error());
    
    echo 'SUCCESS, resp_shake is now 1';
    }
    
    
    if ($did_resp_shout=='1') {
    mysql_query($set_resp_shout) or die(mysql_error());        
    echo 'SUCCESS, resp_shout is now 1';    
    }
    //
    if ($did_ab_chin=='1'){
    mysql_query($set_ab_chin) or die(mysql_error());
    
    echo 'SUCCESS, ab_chin is now 1';
    }
    
    
    if ($did_ab_breathing=='1') {
    mysql_query($set_ab_breathing) or die(mysql_error());        
    echo 'SUCCESS, ab_breathing is now 1';    
    }
    
    if ($did_ab_telephone=='1') {
    mysql_query($set_ab_telephone) or die(mysql_error());        
    echo 'SUCCESS, ab_telephone is now 1';    
    }
    //
    if ($did_cpr_compressions=='1') {
    mysql_query($set_cpr_compressions) or die(mysql_error());        
    echo 'SUCCESS, cpr_compressions is now 1';    
    }
    
    if ($did_cpr_chin=='1'){
    mysql_query($set_cpr_chin) or die(mysql_error());
    
    echo 'SUCCESS, cpr_chin is now 1';
    }
    
    
    if ($did_cpr_nose=='1') {
    mysql_query($set_cpr_nose) or die(mysql_error());        
    echo 'SUCCESS, cpr_nose is now 1';    
    }
    
    if ($did_cpr_breaths=='1') {
    mysql_query($set_cpr_breaths) or die(mysql_error());        
    echo 'SUCCESS, cpr_breaths  is now 1';    
    }
    
    
    
?>  