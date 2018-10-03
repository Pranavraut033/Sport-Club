var selected_ele;

function select(ele_id) {
	"use strict";
	if (selected_ele) {
		if (selected_ele.id === ele_id) {
			clear();
			return false;
		} else {
			selected_ele.classList.remove("selected");
			selected_ele.getElementsByClassName("tile-background")[0].classList.remove("selected");
			selected_ele.classList.add("deselected");
			selected_ele.getElementsByClassName("tile-background")[0].classList.add("deselected");
		}
	}
	document.getElementById("next_btn").style.display = "inline";

	selected_ele = document.getElementById(ele_id);
	selected_ele.classList.add("selected");
	selected_ele.getElementsByClassName("tile-background")[0].classList.add("selected");
	selected_ele.classList.remove("deselected");
	selected_ele.getElementsByClassName("tile-background")[0].classList.remove("deselected");
}

function clear() {
	"use strict";

	selected_ele.classList.remove("selected");
	selected_ele.getElementsByClassName("tile-background")[0].classList.remove("selected");
	selected_ele.classList.add("deselected");
	selected_ele.getElementsByClassName("tile-background")[0].classList.add("deselected");

	document.getElementById("next_btn").style.display = "none";
	selected_ele = null;
}

window.addEventListener('scroll', function () {
	"use strict";
	var nav = document.getElementById('nav');
	if (document.documentElement.scrollTop || document.body.scrollTop > window.innerHeight) {
		nav.classList.add('nav-colored');
		nav.classList.remove('nav-transparent');
	} else {
		nav.classList.add('nav-transparent');
		nav.classList.remove('nav-colored');
	}
});

// LIB

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
		coordInfoWindow.setContent(createInfoWindowContent(ground, map.getZoom()));
		coordInfoWindow.open(map);
	});
}
var TILE_SIZE = 256;

function createInfoWindowContent(latLng, zoom) {
	"use strict";
	return [
		'Sport Club',
		'LatLng: ' + latLng,
	].join('<br>');
}
