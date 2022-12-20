<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 1);
$to = "norma@edgroupchb.com,amansjot@gmail.com"; 
$subject = "ED Group verification link"; 

$message = " 
<html> 
<head> 
<title>ED Group verification link</title> 
</head> 
<body> 
<h3>Congratulations! Your account for email <span style='color:blue'>norma@grupoechb.com</span> has been verified!</h3> 
<p>Click on the following link to automatically login to your account:</p> 
<table> 
<tr> 
<th>Firstname</th> 
<th>Lastname</th> 
</tr> 
<tr> 
<td>John</td> 
<td>Doe</td> 
</tr> 
</table> 
</body> 
</html> 
"; 

// Always set content-type when sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

// More headers 
$headers .= 'From: <uscompliance@edgroupchb.com>' . "\r\n"; 

$result=mail($to,$subject,$message,$headers); 
if( $result == true ) { 
    echo "Message sent successfully..."; 
    }else { 
    echo "Message could not be sent..."; 
    }
?>