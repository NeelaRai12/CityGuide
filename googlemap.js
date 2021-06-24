function loadMap() {
	var kathmandu = {lat: 27.7172, lng: 85.3240};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: kathmandu
    });
}
/*
function loadMap() {
	map = new google.maps.Map(document.getElementById('map'), {
	  center: {lat: 27.3240, lng: 86.5047},
	  zoom: 8
	});
}
*/