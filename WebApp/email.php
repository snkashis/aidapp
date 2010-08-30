<?php  
  
    include ("config.php");    
    $to = trim($_GET['email']);
    //echo $to;
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

$random_hash = md5(date('r', time())); 

ob_start(); //Turn on output buffering
?>
--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

This is the text version

--PHP-alt-<?php echo $random_hash; ?><?php echo "\n"; ?>
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit


<html>
<head>    

<STYLE>
 .headerTop { background-color:#000000; border-top:0px solid #000000; border-bottom:0px solid #f0c6bd; text-align:right; }
 .adminText { font-size:10px; color:#FFFFCC; line-height:200%; font-family:verdana; text-decoration:none; }
 .headerBar { background-color:#FFFFFF; border-top:0px solid #FFFFFF; border-bottom:0px solid #333333; }
 .title { font-size:22px; font-weight:bold; color:#336600; font-family:arial; line-height:110%; }
 .subTitle { font-size:11px; font-weight:normal; color:#666666; font-style:italic; font-family:arial; }
 td { font-size:12px; color:#000000; line-height:150%; font-family:trebuchet ms; }
 .footerRow { background-color:#FFFFCC; border-top:10px solid #FFFFFF; }
 .footerText { font-size:10px; color:#333333; line-height:100%; font-family:verdana; }
 a { color:#FF0000; color:#FF6600; color:#FF6600; }
</STYLE>

</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor= '#cecdcd'>

<table width="100%" cellpadding="10" cellspacing="0" class="backgroundTable" bgcolor='#cecdcd' >
<tr>
<td valign="top" align="center">

<table width="550" cellpadding="0" cellspacing="0">
<tr>
<td style="background-color:#f0c6bd;border-bottom:1px solid #333333; border-top:0px solid #000000; text-align:right;" align="center"><span style="font-size:10px;color:#0000000;line-height:200%;font-family:verdana;text-decoration:none;">Email not displaying correctly? <a href="*|ARCHIVE|*" style="font-size:10px;color:#000000;line-height:200%;font-family:verdana;text-decoration:none;">View it in your browser.</a></span></td>

</tr>
 
<tr>
<td style="background-color:#FFFFFF;border-top:0px solid #FFFFFF;border-bottom:0px solid #333333;"><center><a href=""><IMG id=editableImg1 SRC="http://www.snkcreative.com/FMP_images/header.png" BORDER="0" title="Your Company"  alt="Your Company" align="center"></a></center></td>
</tr>

<tr>
<td style="background-color:#FFFFFF">
<br>
<p style= "font-size:22px;font-weight:bold;color:#adadad;font-family:helvetica neue;line-height:110%;">Congratulations!</p>
<p style="background-color:#FFFFFF; font-size:14px; color:#adadad; font-family:helvetica neue">You have just completed a tutorial in basic life support, we hope you feel more prepared if someone needs CPR. Please see the results of your practical quiz below: <?php echo $resp_shake;
echo $resp_shout;
?>
</td></p>
</tr>

<tr>
<td style="background-color:#FFFFFF;border-top:0px solid #FFFFFF;border-bottom:0px solid #333333;"><center><img src="http://www.snkcreative.com/FMP_images/results.png" width="550" height="250" border="0" margin-padding="2"></a></center></td>
</tr>

<tr>
<td style="background-color:#FFFFFF">
<p style="background-color:#FFFFFF; font-size:14px; color:#adadad; font-family:helvetica neue">Remember you do not need to be certified to help save a life but there are many other emergencies where you can make a difference. <br>
<br>Sincerely, the Aidapp Team
</td></p>
</tr>

<tr>
<td style="background-color:#f4d6cf;border-top:14px solid #FFFFFF;" valign="top">
<span style="font-size:12px;color:#505050;line-height:100%;font-family:verdana;">
Please take a moment to look at the organisations below to attend a first aid course and learn other life saving skills: <br>
<a href="http://www.epionemedical.com/"><IMG id=EPIONE SRC="http://www.snkcreative.com/FMP_images/epionelogo.png" BORDER="0"></a><br>
For more information about <a href="mailto: "AidappTeam@gmail.com"> Aidapp team </a> please visit <a href="http://maimm.arts.ac.uk/degree_show/0910/">MA Interactive Media degree show website </a> <br />
<br />
<br />
Copyright (C) 2010 | Aidapp | All rights reserved.
<a href="*|FORWARD|*">Forward</a> this email to a friend
  
</span>
</td>
</tr>


</table>


</td>
</tr>

</table>


</body>
</html>
--PHP-alt-<?php echo $random_hash; ?>--
<?
//copy current buffer contents into $message variable and delete current output buffer
$message = ob_get_clean();

  
  
$subject = "Contact Us";
$email = "Aidappteam@gmail.com";
//$message = "Hello this is a test";
//$headers = "From: $email";
$headers = "From: $email \r\nReply-To: $email";
$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\""; 

$sent = mail($to, $subject, $message, $headers) ;
if($sent) {print "Your mail was sent successfully"; }
else {print "We encountered an error sending your mail"; } 
  
  
?>  