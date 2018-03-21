
window.onload = function () {
	importarray(outcomes, battlenames, locations);
}
function importarray(){
}



var stratton=new google.maps.LatLng(50.836, -4.519);
var worcester=new google.maps.LatLng(52.18875, -2.220833)
var edgehill=new google.maps.LatLng(52.13997, -1.48416)
var naseby=new google.maps.LatLng(52.41561, -0.99529)
var newbury=new google.maps.LatLng(51.389836, -1.344594)
var marston_moor=new google.maps.LatLng(53.9637, -1.2619)
var hopton_heath=new google.maps.LatLng(52.835,-2.067)
var centre_of_map=new google.maps.LatLng(52.65, -1.264692)
var marker1;
var marker2;
var marker3;
var marker4;
var marker5;
var marker6;

/*function getData(pageName){
	var posting = $.post("php/script.php", {
		page_name: pageName
	});
	posting.done(function(data){
		alert(data);
	});
	posting.fail(function(){
		alert("failed");
	});
}
$(document).ready(function(){
	getData("home");
});*/

function initialize(test)
{


var mapProp = {
  center:centre_of_map,
  zoom:7,
  draggable: false,
  disableDefaultUI: true,
  scrollwheel: false,
  navigationControl: false,
  mapTypeControl: false,
  scaleControl: false,
  disableDoubleClickZoom: true,
  mapTypeId:google.maps.MapTypeId.SATELLITE
  };
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker1=new google.maps.Marker({
  position:stratton,
  icon:'axe.png'
  });
var marker2=new google.maps.Marker({
  position:worcester,
  icon:'axe.png'
  });
var marker3=new google.maps.Marker({
  position:edgehill,
  icon:'axe.png'
  });
var marker4=new google.maps.Marker({
  position:naseby,
  icon:'axe.png'
  });
var marker5=new google.maps.Marker({
  position:newbury,
  icon:'axe.png'
  });
var marker6=new google.maps.Marker({
  position:marston_moor,
  icon:'axe.png'
  });
 var marker7=new google.maps.Marker({
  position:hopton_heath,
  icon:'axe.png'
  });
var infowindow1 = new google.maps.InfoWindow({
	content: '<h2>' + battlenames[3] + '</h2>' + '<h3>' + locations[3] + '</h3>'+ '<h4>' + outcomes[3] + '</h4>'
  });
var infowindow2 = new google.maps.InfoWindow({
	content: '<h2>' + battlenames[4] + '</h2>' + '<h3>' + locations[4] + '</h3>'+ '<h4>' + outcomes[4] + '</h4>'
				
  });
var infowindow3 = new google.maps.InfoWindow({
	content: '<h2>' + battlenames[1] + '</h2>' + '<h3>' + locations[1] + '</h3>'+ '<h4>' + outcomes[1] + '</h4>'
				
  });
var infowindow4 = new google.maps.InfoWindow({
	content: '<h2>' + battlenames[2] + '</h2>' + '<h3>' + locations[2] + '</h3>'+ '<h4>' + outcomes[2] + '</h4>'
				
  });
var infowindow5 = new google.maps.InfoWindow({
	content: '<h2>' + battlenames[5] + '</h2>' + '<h3>' + locations[5] + '</h3>'+ '<h4>' + outcomes[5] + '</h4>'
				
  });
var infowindow6 = new google.maps.InfoWindow({
	content: '<h2>' + battlenames[0] + '</h2>' + '<h3>' + locations[0] + '</h3>'+ '<h4>' + outcomes[0] + '</h4>'
				
  });
var infowindow7 = new google.maps.InfoWindow({
	content: '<h2>' + battlenames[6] + '</h2>' + '<h3>' + locations[6] + '</h3>'+ '<h4>' + outcomes[6] + '</h4>'
				
  });
  
google.maps.event.addListener(marker1, 'mouseover', function(){
infowindow2.close();
infowindow3.close();
infowindow4.close();
infowindow5.close();
infowindow6.close();
infowindow7.close();
infowindow1.open(map,marker1);
});
google.maps.event.addListener(marker1, 'mouseout', function(){
infowindow1.close();
});
google.maps.event.addListener(marker1, 'dblclick', function(){
map.setZoom(13);
map.setCenter(marker1.getPosition())
infowindow2.close();
infowindow3.close();
infowindow4.close();
infowindow5.close();
infowindow6.close();
infowindow7.close();
infowindow1.open(map,marker1);
window.open("Stratton/index.html","_self")
});







google.maps.event.addListener(marker2, 'mouseover', function(){
infowindow1.close();
infowindow3.close();
infowindow4.close();
infowindow5.close();
infowindow6.close();
infowindow7.close();
infowindow2.open(map,marker2);
q = 5;
});
google.maps.event.addListener(marker2, 'mouseout', function(){
infowindow2.close();
});
google.maps.event.addListener(marker2, 'dblclick', function(){
map.setZoom(13);
map.setCenter(marker2.getPosition())
infowindow1.close();
infowindow3.close();
infowindow4.close();
infowindow5.close();
infowindow6.close();
infowindow7.close();
infowindow2.open(map,marker2);
window.open("Worcester/index.html","_self")
});







google.maps.event.addListener(marker3, 'mouseover', function(){
infowindow1.close();
infowindow2.close();
infowindow4.close();
infowindow5.close();
infowindow6.close();
infowindow7.close();
infowindow3.open(map,marker3);
q = 2;
});
google.maps.event.addListener(marker3, 'mouseout', function(){
infowindow3.close();
});
google.maps.event.addListener(marker3, 'dblclick', function(){
map.setZoom(13);
map.setCenter(marker3.getPosition())
infowindow1.close();
infowindow2.close();
infowindow4.close();
infowindow5.close();
infowindow6.close();
infowindow7.close();
infowindow3.open(map,marker3);
window.open("Edge_Hill/index.html","_self")
});














google.maps.event.addListener(marker4, 'mouseover', function(){
infowindow1.close();
infowindow2.close();
infowindow3.close();
infowindow5.close();
infowindow6.close();
infowindow7.close();
infowindow4.open(map,marker4);
q = 3
});
google.maps.event.addListener(marker4, 'mouseout', function(){
infowindow4.close();
});
google.maps.event.addListener(marker4, 'dblclick', function(){
map.setZoom(13);
map.setCenter(marker4.getPosition())
infowindow1.close();
infowindow2.close();
infowindow3.close();
infowindow5.close();
infowindow6.close();
infowindow7.close();
infowindow4.open(map,marker4);
window.open("Naseby/index.html","_self")
});



















google.maps.event.addListener(marker5, 'mouseover', function(){
infowindow1.close();
infowindow2.close();
infowindow3.close();
infowindow4.close();
infowindow6.close();
infowindow7.close();
infowindow5.open(map,marker5);
q = 6;
});
google.maps.event.addListener(marker5, 'mouseout', function(){
infowindow5.close();
});
google.maps.event.addListener(marker5, 'dblclick', function(){
map.setZoom(13);
map.setCenter(marker5.getPosition())
infowindow1.close();
infowindow2.close();
infowindow3.close();
infowindow4.close();
infowindow6.close();
infowindow7.close();
infowindow5.open(map,marker5);
window.open("Newbury/index.html","_self")
});















google.maps.event.addListener(marker6, 'mouseover', function(){
infowindow1.close();
infowindow2.close();
infowindow3.close();
infowindow4.close();
infowindow5.close();
infowindow7.close();
infowindow6.open(map,marker6);
q = 1;
});
google.maps.event.addListener(marker6, 'mouseout', function(){
infowindow6.close();
});
google.maps.event.addListener(marker6, 'dblclick', function(){
map.setZoom(13);
map.setCenter(marker6.getPosition())
infowindow1.close();
infowindow2.close();
infowindow3.close();
infowindow4.close();
infowindow5.close();
infowindow7.close();
infowindow6.open(map,marker6);
window.open("Marston_Moor/index.html","_self")
});


google.maps.event.addListener(marker7, 'mouseover', function(){
infowindow1.close();
infowindow2.close();
infowindow3.close();
infowindow4.close();
infowindow5.close();
infowindow6.close();
infowindow7.open(map,marker7);
q = 1;
});
google.maps.event.addListener(marker7, 'mouseout', function(){
infowindow7.close();
});
google.maps.event.addListener(marker7, 'dblclick', function(){
map.setZoom(13);
map.setCenter(marker7.getPosition())
infowindow1.close();
infowindow2.close();
infowindow3.close();
infowindow4.close();
infowindow5.close();
infowindow6.close();
infowindow7.open(map,marker7);
window.open("Hopton_Heath/index.html","_self")
});



marker1.setMap(map);
marker2.setMap(map);
marker3.setMap(map);
marker4.setMap(map);
marker5.setMap(map);
marker6.setMap(map);
marker7.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);




