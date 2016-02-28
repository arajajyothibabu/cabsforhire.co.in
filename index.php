<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
    <link href="css/styles.css" media="all" rel="stylesheet" type="text/css" />
    <script src="js/functions.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <script type="text/javascript" src="js/caption-transition-builder-controller.min.js"></script>
            <style type="text/css">
     #map-canvas {
        height: 400px;
		width: 400px;
        margin: 0px;
        padding: 0px;
      }
	  #map-canvas1 {
        height: 400px;
		width: 400px;
        margin: 0px;
        padding: 0px;
      }
	  
      .controls {
        margin-top: 16px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        padding: 0 11px 0 13px;
        width: 400px;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        text-overflow: ellipsis;
      }

      #pac-input:focus {
        border-color: #4d90fe;
        margin-left: -1px;
        padding-left: 14px;  /* Regular padding-left + 1. */
        width: 401px;
		
      }
	  
	   #pac-input1 {
        background-color: #fff;
        padding: 0 11px 0 13px;
        width: 400px;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        text-overflow: ellipsis;
      }

      #pac-input1:focus {
        border-color: #4d90fe;
        margin-left: -1px;
        padding-left: 14px;  /* Regular padding-left + 1. */
        width: 401px;
      }
	  
      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
}

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
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

//call for right serch box

function initialize1() {

  var markers = [];
	  var map = new google.maps.Map(document.getElementById('map-canvas1'), {
		mapTypeId: google.maps.MapTypeId.ROADMAP
	  });

  var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(-33.8902, 151.1759),
      new google.maps.LatLng(-33.8474, 151.2631));
  map.fitBounds(defaultBounds);

  // Create the search box and link it to the UI element.
  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input1'));
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

google.maps.event.addDomListener(window, 'load', initialize1);


</script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body bgcolor="#FFFF99">
<div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="">Home</a></li>
  		<li><a href="Calculator.html">Calculator</a></li>
  		<li><a href="signup.php">Signup</a></li>
  		<li><a href="login.php">Login</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron">
<h1 align="center">CabsForHire</h1>
<!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
                <div style="position: relative; width:945px; height: 300px; overflow: hidden;" id="slider1_container">
                    <!-- Loading Screen -->
                    <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                        <div style="filter: inherit; position: absolute; display: block;
                            background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                        </div>
                        <div style="position: absolute; display: block; background: url(images/loading.gif) no-repeat center center;
                            top: 0px; left: 0px;width: 100%;height:100%;">
                        </div>
                    </div>

                    <div u="slides" style="cursor: move; position: absolute; width: 945px; height: 300px;left:0px;top:0px; overflow: hidden;">
                        <!-- Slide -->
                        <div>
                            <img u="image" src="images/1.jpg">
                            <img u="caption" t="0" style="position:absolute;left:200px;top:40px;width:80px;height:80px;" src="images/s1.png">
                            <div u=caption t="0" d=-200 class="captionOrange"  style="position:absolute; left:350px; top: 65px; width:500px; height:30px;"> 
                                Select your Origin and Destinations
                            </div> 
                            <div u=caption t="0" d=-200 class="captionOrange"  style="position:absolute; left:110px; top: 235px; width:500px; height:30px;"> 
                                Then check for avalaibility of cabs
                            </div> 
                            <img u="caption" t="0" d=-200 style="position:absolute;left:680px;top:210px;width:80px;height:80px;" src="images/s2.png">
                        </div>
                        <!-- Slide -->
                        <div>
                            <img u="image" src="images/2.jpg">
                            <img u="caption" t="0" style="position:absolute;left:200px;top:40px;width:80px;height:80px;" src="images/s3.png">
                            <div u=caption t="0" d=-200 class="captionOrange"  style="position:absolute; left:350px; top: 65px; width:500px; height:30px;"> 
                                Pick your Mobile after having feasible fare
                            </div> 
                            <div u=caption t="0" d=-200 class="captionOrange" style="position:absolute; left:110px; top: 235px; width:500px; height:30px;"> 
                                Don't hesitate to make a call..! 
                            </div> 
                            <img u="caption" t="0" d=-200 style="position:absolute;left:680px;top:210px;width:80px;height:80px;" src="images/s4.png">
                        </div>
                    </div>
                </div>
                <!-- Jssor Slider End -->
    <script>
        caption_transition_controller_starter("slider1_container");
    </script> 
</div>
    <form action="index.php" name="f" method="post" onSubmit="return valid();">

   <div class="row">
        <div class="col-sm-6">
        <input id="pac-input"  name="from" type="text" placeholder="From nearest City">
   		<div id="map-canvas"></div>
        </div>
        <div class="col-sm-6">
        <input id="pac-input1" name="to" type="text" placeholder="To nearest City">
    	<div id="map-canvas1"></div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
            <span align="center"><input type="submit" name="check" value="Check Availability"/></span>
            </div>
            <div class="col-sm-4">
            </div>
    </div>
    </form>
    <?php 
	if(isset($_POST['check']))
	{
		if(notnull($_POST['from']) && notnull($_POST['to']))
		{
					$from = urlencode($_POST['from']);
					$to = urlencode($_POST['to']);
					$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
					$data = json_decode($data);
					//$time = 0;
					$distance = 0;
					foreach($data->rows[0]->elements as $road) {
						//$time += $road->duration->value;
						$distance += $road->distance->value;
					}
				$qry = mysql_query("select * from owner where city = '{$_POST['from']}'");
				if($qry)
				{
							$i = 1;
							while($qr = mysql_fetch_array($qry))
							{
								if($i == 1)
								echo '<fieldset style=" border-radius:10px;background-color:#FFFFCC;"><div class="row"><div class="col-sm-2">S.no</div><div class="col-sm-4">Name/Travels Name</div><div class="col-sm-2">Fare</div><div class="col-sm-4">Contact</div></div>';
								
								$fare = ceil($distance/1000)*$qr['price'];
								echo '<div class="row"><div class="col-sm-2">'.$i.'</div><div class="col-sm-4">'.$qr['name'].'</div><div class="col-sm-2">'.$fare.'</div><div class="col-sm-4">'.$qr['mobile'].'</div></div>';
								$i += 1;
								}
							if($i == 1) $message = "No Cabs available, select another nearer city..!";
							else echo '</fieldset>';
					}
					else
					{
						$message = "No cabs Available, try different destination..!";
						}
			}
			else 
			{
				$message = "Select something to Check..!";
				}
		}
	?>
    <?php if (!empty($message)) {echo "<p id='err' class=\"message\">" . $message . "</p>";} ?>
</div>
</body>
<script type="text/javascript">
	function valid()
	{
			if(document.f.from.value=="" || document.f.to.value == "")
			{
			alert("Select something to Check..!");
			return false;
			}
			return true;
		}
    </script>
</html>