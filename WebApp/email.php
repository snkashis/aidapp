<?php  
  
    include ("config.php");    
    $to = trim($_GET['email']);
    
//  
$result = mysql_query("SELECT * FROM Results");


if (!$result) die ("MySQL failure: " . mysql_error());

$fields = mysql_num_fields($result);
//echo 'num of fields ' . $fields . '<br/>';
$row = mysql_fetch_row($result);

echo '{ ';

for ($a = 0 ; $a < $fields ; ++$a)
{
    if ($a >=1) {
        echo ', ';
    }
    $field = mysql_field_name($result, $a);
    
    echo '"' . $field . '": "' . $row[$a] . '"';
    
    }
    

echo ' }';

//
    
    
  
  
$subject = "Contact Us";
$email = $_REQUEST['email'] ;
$message = $_REQUEST['message'] ;
$headers = "From: $email"; $sent = mail($to, $subject, $message, $headers) ;
if($sent) {print "Your mail was sent successfully"; }
else {print "We encountered an error sending your mail"; } 
  
  
?>  