<?php
if(isset($_GET['from']))
$from=$_GET['from'];
$to="venkat";
?>
<html>
<head>
<style>
body{background:#eee;}
.chat-box{width:500px;border:3px solid gray;background-color:#eee;border-radius:5px;}
.msg{width:500px;background-color:#eee;border-radius:5px;}
textarea{font-size:13pt;width:495px;height:120px;padding:5px;}
.time{color:green;font-size:10pt;text-align:right;width:450px;margin:0px;}
.user{color:red;text-align:left;text-indent:50px;margin:0px;font-size:11pt;}
.msg{text-indent:70px;margin:0px;font-size:11pt;}
hr{width:75%}
</style>
<script>
alert(b);

function key(){
 var key = event.which;//(evt.which) ? evt.which : event.keyCode;
if(key==13)
{
var a=document.frm.sender.value;
createObj(a);
document.frm.sender.value=null;
return true;
}
else
return true;
}
var obj;
function createObj(a)
{
if(window.ActiveXObject)
{
obj=new ActiveXObject("Microsoft.XMLHTTP");
}
else
{
obj=new XMLHttpRequest();
}
obj.open("GET","get.php?from=<?=$from?>&to=<?=$to?>&text="+a,true);
obj.send();
obj.onreadystatechange=update;
}
function update()
{
if(obj.readyState==4)
{
document.getElementById("message").innerHTML=obj.responseText;
}
}

function load()
{
if(window.ActiveXObject)
{
obj=new ActiveXObject("Microsoft.XMLHTTP");
}
else
{
obj=new XMLHttpRequest();
}
alert("called"+a);
obj.open("GET","msg.php?from=<?=$from?>&to=<?=$to?>",true);
obj.send();
obj.onreadystatechange=update;
setTimeout("load()",5000);
}

</script>
</head>
<body onload="load()">
<center>
	<div class="chat-box">
		<form method="post" name="frm">
			

			<div class="send">
				<textarea name="sender" onkeypress="return key()" placeholder="what's on your mind..."></textarea>
			</div>
		
<div class="msg">
			
				<div id="message">
				
				&nbsp;
				
				</div>
			</div>
			</form>
	</div>
</center>
</body>
</html>
