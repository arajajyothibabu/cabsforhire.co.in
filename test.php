<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Testing...</title>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=places"></script>
</head>

<body>
<form action="javascript:void(0);" name="form1" id="form1">
    <input type="text" name="location" class="textbox" id="location" value="" />
    <input type="submit" value="Submit" class="submit" />
</form>
<div id="map-canvas"></div>
<script type="text/javascript">
    //Autocomplete variables
    var input = document.getElementById('location');
    var searchform = document.getElementById('form1');
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
</body>
</html>