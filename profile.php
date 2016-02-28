<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
if(isset($_POST['submit']))
{
	$userevents = mysql_query("select id from events where user = '{$_SESSION['user']}'");
	if($userevents)
	{
		
		}
	
	}
?>
<body style="background-image:url(images/back.png); background-repeat:repeat;">
<div class="container">
<header style="height:200px; width:100%; margin-top:0px; opacity:50%; color:#FFFFFF;">
<nav><table border="1" cellpadding="20px" width="100%" height="150px"><tr><td width="10%"><img src="" width="100px" height="100px" /></td><td width="10%"><img src="" width="100px" height="100px"  /></td><td>Name</td></tr></table></nav>
</header>
<div class="main">

</div>
</div>
</body>
</html>