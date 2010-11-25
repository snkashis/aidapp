<?php  
  
    include ("config.php");    
    $to = trim($_GET['email']);
    
//  
$result = mysql_query("SELECT * FROM Practice");


if (!$result) die ("MySQL failure: " . mysql_error());

$fields = mysql_num_fields($result);
//echo 'num of fields ' . $fields . '<br/>';
$row = mysql_fetch_row($result);



for ($a = 0 ; $a < $fields ; ++$a)
{
    $field = mysql_field_name($result, $a);
    $$field = $row[$a];
    //echo '"' . $field . '": "' . $row[$a] . '"';
    
    }
    
$resp_compute = $resp_shake + $resp_shout;

$ab_compute = $ab_chin + $ab_breathing + $ab_telephone;

$cpr_compute = $cpr_compressions + $cpr_chin + $cpr_nose + $cpr_breaths;


$resp_compute = ($resp_compute/2)*100;
$ab_compute = ($ab_compute/3)*100;
$cpr_compute = ($cpr_compute/4)*100;

$resp_display = $resp_compute .'%';
$ab_display = $ab_compute .'%';
$cpr_display = $cpr_compute .'%';

$random_hash = md5(date('r', time())); 

ob_start(); //Turn on output buffering
?>
--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

Congratulations.
You have just completed a tutorial in basic life support, we hope you feel more prepared if someone needs CPR. Please see the results of your practical quiz below:

<?php
echo '';
echo '100% for Check for Danger ';
echo $resp_display . ' for Check for Response';
echo $ab_display . ' for Airway & Breathing';
echo $cpr_display . ' for CPR';
echo '';
?>

Remember you do not need to be certified to help save a life but there are many other emergencies where you can make a difference.
Sincerely, the Aidapp Team

Please take a moment to look at the organisations below to attend a first aid course and learn other life saving skills: <br>
http://www.epionemedical.com
http://www.redcross.org.uk
http://www.heartaid.org

For more information about the Aidapp team please visit http://maimm.arts.ac.uk/degree_show/0910/ MA Interactive Media degree show website.

Copyright (C) 2010 | Aidapp | All rights reserved.



--PHP-alt-<?php echo $random_hash; ?><?php echo "\n"; ?>
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit


<html>
<body>

<center><IMG SRC="http://www.snkcreative.com/FMP_images/header.png" align="center"></center>

<br>
<p style= "font-size:22px;font-weight:bold;">Congratulations!</p>
<p style="font-size:14px; ">You have just completed a tutorial in basic life support, we hope you feel more prepared if someone needs CPR. Please see the results of your practical quiz below:</p>

<?php

echo '<table width=300><tr> <td>';
echo '<div id="danger" style="font-size:22px;"> 100%</div>';
echo '</td> <td>Check for Danger 1</td></tr>';

echo '<tr> <td>';
echo '<div id="resp" style="font-size:22px;"> '. $resp_display .'</div>';
echo '</td> <td>Check for Response 2</td></tr>';

echo '<tr> <td>';
echo '<div id="ab" style="font-size:22px;position:"> ' . $ab_display . '</div>';
echo '</td> <td>Airway & Breathing 3</td></tr>';

echo '<tr> <td>';
echo '<div id="cpr" style=";font-size:22px;">' . $cpr_display . '</div>';
echo '</td> <td>CPR 4</td></tr></table>';
?>
<img src="http://www.snkcreative.com/FMP_images/1heart.png" style="position: relative; left: 250px;top:-130px; ">

<p style="font-size:14px;">Remember you do not need to be certified to help save a life but there are many other emergencies where you can make a difference. <br>
<br>Sincerely, the Aidapp Team
</p>

<span style="font-size:12px;color:#505050;">
Please take a moment to look at the organisations below to attend a first aid course and learn other life saving skills: <br>
<a href="http://www.epionemedical.com/"><IMG SRC="http://www.snkcreative.com/FMP_images/epionelogo.png" BORDER="0"></a>
<a href="http://www.redcross.org.uk/"><IMG SRC="http://www.snkcreative.com/FMP_images/britishredcross.png" BORDER="0"></a>
<a href="http://www.heartaid.org/"><IMG SRC="http://www.snkcreative.com/FMP_images/heart_aid_logo.png" BORDER="0"></a><br/>
For more information about <a href="mailto:AidappTeam@gmail.com"> Aidapp team </a> please visit <a href="http://maimm.arts.ac.uk/degree_show/0910/">MA Interactive Media degree show website </a> <br />
<br />
<br />
Copyright (C) 2010 | Aidapp | All rights reserved.
  
</span>



</body>
</html>
--PHP-alt-<?php echo $random_hash; ?>--
<?
//copy current buffer contents into $message variable and delete current output buffer
$message = ob_get_clean();

  
  
$subject = "Contact Us";
$email = "Aidappteam@gmail.com";
$headers = "From: $email \r\nReply-To: $email";
$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\""; 

$sent = mail($to, $subject, $message, $headers) ;
if($sent) {print "Thanks! Your mail was sent successfully."; }
else {print "We encountered an error sending your mail"; } 
  
?>
