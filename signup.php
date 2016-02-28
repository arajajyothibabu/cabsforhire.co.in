<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(isset($_SESSION['uname']))
 redirect_to("index.php");
 ?>
<html>
<head>
<title>Cabs for Hire</title>
	<meta name="description" content="bookmycab, cars for hire, online cars, cabs on line">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js" ></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Register for Cabs for Hire</title>
    <script src="javascripts/functions.js" type="text/javascript"></script>
	<script type="text/javascript" src="javascripts/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="javascripts/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="css/styles.css" />
    <script type="text/javascript" src="javascripts/caption-transition-builder-controller.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script type="text/javascript">
function initialize() {

  var markers = [];
  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(-33.8902, 151.1759),
      new google.maps.LatLng(-33.8474, 151.2631));
  map.fitBounds(defaultBounds);

  // Create the search box and link it to the UI element.
  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */(input));

  // [START region_getplaces]
  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }

    // For each place, get the icon, place name, and location.
    markers = [];
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });

      markers.push(marker);

      bounds.extend(place.geometry.location);
    }

    map.fitBounds(bounds);
  });
  // [END region_getplaces]

  // Bias the SearchBox results towards places that are within the bounds of the
  // current map's viewport.
  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
</head>

<body>
<?php
// code for registration..!
if(isset($_POST['signup']))
{
$name = $_POST['name'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd1'];
$mobile = $_POST['mobile'];
$price = $_POST['price'];
$city = $_POST['city'];
$state = $_POST['state'];
$license = $_POST['license'];
if(notnull($name) && notnull($uname) && notnull($pwd) && notnull($mobile))
{
	$qr = mysql_query("INSERT into owner values('','{$uname}','{$pwd}','{$name}','','{$mobile}','{$license}','{$price}','{$city}','{$state}','')");
	if($qr)
	{
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['uname'] = $_POST['uname'];
		redirect_to("index.php");
		
	}
	else
		$message = "Registration Failed..!";
	}
else
{
	$message = "Registration Failed, Try again..!";
	}
	}
else
{
	}
    ?>
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
  		<li class="active"><a href="">Signup</a></li>
  		<li><a href="login.php">Login</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="row">
<h2 align="center">Registration<span style="font-size:9px">only for Cab Owners</span></h2>
</div>
        <?php if (!empty($message)) {echo "<p id='err' class=\"message\">" . $message . "</p>";} ?>
       <div class="row">
       <div class="col-md-6">
       
            <form role="form" action="signup.php" id="form" method="post" name="signupform" onSubmit="return validatereg();" >
			      
           
				 <div class="form-group">
					<label for="name">Travels Name:<span style="color:#F00">*</span></label>
					<input type="text" name="name" class="form-control" placeholder="company/user" maxlength="50" value="" /><td rowspan="7"><p id="err"></p></td>
				</div>
                <div class="form-group">
					<label>Username<span style="color:#F00">*</span></label>
					<td>:<input type="text" name="uname" class="form-control" placeholder="your email" maxlength="50" value=""/></td>
				</div>
				<div class="form-group">
					<label>Password<span style="color:#F00">*</span></label>
					<input type="password" class="form-control" name="pwd1" maxlength="30" value="" />
				</div>
                <div class="form-group">
					<label>Re-enter Password<span style="color:#F00">*</span></label>
					<input type="password" class="form-control" name="pwd2" maxlength="30" value="" />
				</div>
                <div class="form-group">
					<label>License Number</label>
					<input type="text" class="form-control" name="license" maxlength="20" value="" />
				</div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
					<label>Fare <span style="font-size:12px">per KM</span></label>
					<input type="number" class="form-control" name="price" value="" />
				</div>
                <div class="form-group">
					<label>Mobile<span style="color:#F00">*</span></label>
					<input type="text" class="form-control" name="mobile" maxlength="50" value="" />
				</div>
                <div class="form-group">
					<label>Place<span style="color:#F00">*</span></label>
                    <input type="text" name="city" class="form-control" id="location" placeholder="your city" value="" />
                    <div id="map-canvas"></div>
<script type="text/javascript">
    //Autocomplete variables
    var input = document.getElementById('location');
    var searchform = document.getElementById('form');
    var place;
    var autocomplete = new google.maps.places.Autocomplete(input);
 
    //Google Map variables
    var map;
    var marker;
 
    //Add listener to detect autocomplete selection
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        place = autocomplete.getPlace();
        //console.log(place);
    });
 
    //Add listener to search
    searchform.addEventListener("submit", function() {
        var newlatlong = new google.maps.LatLng(place.geometry.location.lat(),place.geometry.location.lng());
        map.setCenter(newlatlong);
        marker.setPosition(newlatlong);
        map.setZoom(12);
 
    });
     
    //Reset the inpout box on click
    input.addEventListener('click', function(){
        input.value = "";
    });
 
 
 
    function initialize() {
      var myLatlng = new google.maps.LatLng(51.517503,-0.133896);
      var mapOptions = {
        zoom: 1,
        center: myLatlng
      }
      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
 
      marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Main map'
      });
    }
 
    google.maps.event.addDomListener(window, 'load', initialize);
 
</script>
				</div>
                <div class="form-group">
					<label>State/Province<span style="color:#F00">*</span></label>
					<input type="text" class="form-control" name="state" list="states">
							<datalist id="states">
							<?php states(); ?>
                            </datalist>
                </div>
                <div class="form-group">
                <label for="submit">&nbsp;</label>
				<input type="submit" style="color:#FFF; background-color:#00CC33;" class="form-control" value="Register">
                </div>
			</form>
       </div>
</div>
<!--<div class="row">
<div class="col-sm-12">
            <div id="map-canvas" align="center"></div>
            </div>
</div>-->
</div>
<script>
function validatereg()
		{
			var name = document.signupform.name.value;
			var uname = document.signupform.uname.value;
			var mobile = document.signupform.mobile.value;
			var pwd1 = document.signupform.pwd1.value;
			var city = document.signupform.city.value;
			var regname=new RegExp("[a-z A-Z]+");
			var regpwd=new RegExp("[a-z A-Z 0-9 @ # $ ! ? _]+");
			var regmail=new RegExp("^[a-z A-Z 0-9]+@[a-z]+.com");
			var regmob = new RegExp("^[0-9] , [0-9]+"); 
			var msg="";
			if(name == "" || uname == "" || pwd1 == "" || mobile == "" || city == "")
				msg += "Please Enter * marked fields";
			else 
			{
				if(name.match(regname)!= name || name.length<6)
					msg+="invalid Name,Length <6 characters<br>";
				if(mobile.length<10  && mobile.match(regmob) != mobile)
					msg+="Invalid Phone Number<br>";
				if(uname.match(regmail) != uname)
					msg+="invalid mail<br>";
				if(document.signupform.pwd1.value != document.signupform.pwd2.value)
					msg+="Password didn't match..!<br>";
				else if(pwd1.match(regpwd)!= pwd1||pwd1.length<6 && pwd1 == "")
					msg+="invalid password<br>password must have more than 6 chars<br>should not contain <br>{^,~,`,',+,-,|,\,/,>,<,:,;,*,(,)}";
			}
				if(msg === "")
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
	
	$("#err").click(function(){
			$("#err").hide(500);
			});	

</script>
</body>   
</html>