<?php  
  
    include ("config.php");    
    $to = trim($_GET['email']);
    
    
    
    if ($email== 'guest' ){
    $clear_current_user = "UPDATE Couple SET current = '0'";
    $set_current_user = "UPDATE Couple SET current='1' WHERE id='guest'";
    mysql_query($clear_current_user) or die(mysql_error());
    mysql_query($set_current_user) or die(mysql_error());
    echo 'SUCCESS, guest is now CURRENT';
    }
    
    elseif ($email=='') {
    echo 'nothing';
    }
    else {
            $clear_current_user = "UPDATE Couple SET current = '0'";
            $addClient  = "INSERT INTO Couple (id,current) VALUES ('$email','1')";
            
            mysql_query($clear_current_user) or die(mysql_error());

            mysql_query($addClient) or die(mysql_error());
            echo 'SUCCESS, new user is now current';
  }
  
  
$subject = "Contact Us";
$email = $_REQUEST['email'] ;
$message = $_REQUEST['message'] ;
$headers = "From: $email"; $sent = mail($to, $subject, $message, $headers) ;
if($sent) {print "Your mail was sent successfully"; }
else {print "We encountered an error sending your mail"; } 
  
  
?>  