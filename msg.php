
<?php
if(isset($_GET['from']) && isset($_GET['to']))
{
$from=$_GET['from'];
$to=$_GET['to'];
$con=mysql_connect("localhost","root","");
mysql_select_db("test",$con);
$query="SELECT * FROM `chat`";
$re=mysql_query($query,$con);
$msg=array();

while($rows=mysql_fetch_row($re))
{

$msg=$rows;
if($rows[1]==$from)
echo "<div class='user'>Me : </div>"."<label class='msg'> $rows[3]</label><div class='time'>".hai($rows[4])."</div><hr>" ;
/*if($rows[1]==$to)
echo "<tr><th>$rows[2] :</th>"."<td> $rows[3]</td></tr>" ;
else*/
else
echo "<div class='user'>$rows[1] :</div>"."<label class='msg'> $rows[3]</label><div class='time'>".hai($rows[4])."</div><hr>" ;
}
if(empty($msg) || $msg[3]=='')echo "No messages to display";
}


?>

<?php
function hai($date)
{
$time = strtotime($date);
    $time = time() - $time; // to get the time since that moment

    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'min',
        1 => 'sec',
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'\'s ago':' ago');
	//return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'\'s ago':' ago');
	   
}

}
?>
