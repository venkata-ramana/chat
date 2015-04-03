<head>
<style>
.user{width:150px;color:red;}
.msg{width:350px;color:green}
</style>
</head>
<?php
if(isset($_GET['text']) && isset($_GET['from']) && isset($_GET['to']) )
{
$from=$_GET['from'];
$to=$_GET['to'];
$text=$_GET['text'];
$con=mysql_connect("localhost","root","");
mysql_select_db("test",$con);
$date=date('Y-m-d');
$time=date('h:i:s');
$timestamp=$date." ".$time;
$query="INSERT INTO `chat`(`from`,`to`,`msg`,`time`) VALUES ('$from','$to','$text','$timestamp')"; //CURRENT_TIMESTAMP is redundant
$re=mysql_query($query,$con);
header("location:msg.php?from=$from&to=$to");
}
?>
