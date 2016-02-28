<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(isset($_SESSION['uname']))
 redirect_to("index.php");
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CabsForHire</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js" ></script>
	<meta name="keywords" content="bookmycab, cars for hire, online cars, cabs on line">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="js/functions.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="css/styles.css" />
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
  		<li><a href="Calculator.html">Calculator</a></li>
  		<li><a href="signup.php">Signup</a></li>
  		<li class="active"><a href="#">Login</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
if(isset($_POST['login']))
{
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	$queryresult = mysql_query("select * from owner where username = '{$uname}' and password = '{$pwd}'");
	confirm_query($queryresult);
			if (mysql_num_rows($queryresult) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysql_fetch_array($queryresult);
				if(notnull($found_user['name'])) $_SESSION['name'] = $found_user['name'];
				else $_SESSION['name'] = "User";
				$_SESSION['uname'] = $found_user['username'];
				redirect_to("index.php");
			}
			else{
			$message = "Username/password combination incorrect.<br />
			Please make sure your caps lock key is off and try again.";
		}
}
?>

<?php
if(isset($_POST['send']))
{
	$to = $_POST['mail'];
	$query = mysql_query("select * from owner where username = '{$to}'");
	confirm_query($query);
	if($query)
	{
		$subject = "Reset Password";
		$msg = "Click the follwing link to reset your password : \n\n"."http://www.cabsonhire.co.in/resetpassword.php?id={$to}";
		$msg .= "\n\n\nregards\n\nCabsonhire.co.in";
		$header = "mail from ". "aascarvizag@gmail.com";
		$sendmail = mail($to, $subject, $msg, $header);
		if($sendmail)
		$message = "Check your mail to reset your password";
		else
		$message = "Try again..!";
	}
	else
		$message = "No account exists with this mail..!";
	}
?>
<div class="container">

    <?php if (!empty($message)) {echo "<p id='err' class=\"message\">" . $message . "</p>";} ?>
<div class="row">

<div class="col-md-8">
<h2 align="center">Only Cab Owners</h2>
<img src="images/cabs.jpg" class="img-responsive" />
</div>
<div class="col-md-4 pull-right">
<h2 align="center">Login</h2>
<form role="form" action="login.php" method="post" onSubmit="return validate();" name="loginform">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="mail" id="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="pwd" class="form-control" id="pwd" required>
  </div>
  <div class="form-group">
    <input type="checkbox"><label>Remember me</label>
  </div>
  <button type="submit" class="btn">Submit</button>
</form>
</div>
</div>
</div>
<script type="text/javascript">
	function validate()
		{
			var uname = document.loginform.mail.value;
			var pwd = document.loginform.pwd.value;
			var regmail=new RegExp("^[a-z A-Z 0-9]+@[a-z]+.com");
			var msg="";
			if(uname.match(regmail) != uname)
			msg+="invalid mail";
			if(pwd.length<6)
			msg+="& invalid Password";
			if(msg == "")
			{
			return true;
			}
			else
			{
				alert(msg);
				return false;
			}
		}
	
	function validate1()
		{
			var uname = document.f1.mail.value;
			var regmail=new RegExp("^[a-z A-Z 0-9]+@[a-z]+.com");
			var msg="";
			if(uname.match(regmail) != uname)
			msg+="Invalid mail";
			if(msg == "")
			{
			return true;
			}
			else
			{
				$("#err").show();
				msg +="<img align='right' src='images/remove.png' width='15px' height='15px'>";
				document.getElementById("err").innerHTML = msg;
				 return false;
			}
		}
		
	$("#error").click(function(){
			$("#error").hide(500);
			});
	$("#err").click(function(){
			$("#err").hide(500);
			});
	$("#forgot").click(function(){
			$(".enter_mail").show(500);
			});
        </script>
</body>
</html>