<?php  
  
    include ("config.php");    
    $to = trim($_GET['email']);
    echo $to;
//  
$result = mysql_query("SELECT * FROM Practice");


if (!$result) die ("MySQL failure: " . mysql_error());

$fields = mysql_num_fields($result);
//echo 'num of fields ' . $fields . '<br/>';
$row = mysql_fetch_row($result);

//echo '{ ';

for ($a = 0 ; $a < $fields ; ++$a)
{
    /*if ($a >=1) {
        echo ', ';
    } */
    $field = mysql_field_name($result, $a);
    $$field = $row[$a];
    //echo '"' . $field . '": "' . $row[$a] . '"';
    
    }
    

//echo ' }';

//
/*echo 'new';
echo $resp_shake;
echo $resp_shout;
*/    
  
  
$subject = "Contact Us";
$email = "steve@snkcreative.com";
$message = "Hello this is a test";
$headers = "From: $email"; $sent = mail($to, $subject, $message, $headers) ;
if($sent) {print "Your mail was sent successfully"; }
else {print "We encountered an error sending your mail"; } 
  
  
?>  