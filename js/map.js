function myMap() {
	var ground = new google.maps.LatLng(19.1230576, 72.8223155);

	var map = new google.maps.Map(document.getElementById('map'), {
		center: ground,
		zoom: 16,
	});

	var coordInfoWindow = new google.maps.InfoWindow();
	coordInfoWindow.setContent(createInfoWindowContent(ground, map.getZoom()));
	coordInfoWindow.setPosition(ground);
	coordInfoWindow.open(map);

	map.addListener('zoom_changed', function () {
		coordInfoWindow.setContent(createInfoWindowContent(ground));
		coordInfoWindow.open(map);
	});
}

function createInfoWindowContent(latLng) {
	"use strict";
	return [
		'Sport Club',
		'LatLng: ' + latLng,
	].join('<br>');
}
