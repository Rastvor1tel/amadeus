//2gis map
var twoGis_map_container = 'map-2gis';
var twoGis_cont = $('#' + twoGis_map_container);  
//var CMS__TPL_PATH = '/wp-content/themes/azbn7theme';  
var CMS__TPL_PATH = '/local/templates/amadeus';
//var CMS__TPL_PATH = '';  
if(twoGis_cont.length) { 
	var twoGis_map_data = JSON.parse(twoGis_cont.attr('data-map') || '{}');
	var map;
	var mapCoord = twoGis_map_data.center;
	var mapZoom = twoGis_map_data.zoom;
	var placeholderCoord = twoGis_map_data.placemarks.coord;
	var iconUrl = CMS__TPL_PATH + '/img/svg/icon-map.svg';
	var iconRetinaUrl = CMS__TPL_PATH + '/img/svg/icon-map.svg';
	var iconSize = [70, 90];
	var iconAnchor = [35, 90]; 
	DG.then(function () {
		map = DG.map(twoGis_map_container, {
			center: mapCoord,
			zoom: mapZoom,
			scrollWheelZoom: false,
			fullscreenControl: false
		});
		var myIcon = DG.icon({
			iconUrl: iconUrl,
			iconRetinaUrl: iconRetinaUrl,
			iconSize: iconSize,
			iconAnchor: iconAnchor,
			popupAnchor: [0, 0]
		});

		if(twoGis_map_data.placemarks.length) {
			for(var i = 0; i < twoGis_map_data.placemarks.length; i++) {
				var popHeading = '<div class="map__popup-heading">'+twoGis_map_data.placemarks[i].heading+'</div>';	
				var obj_popup = DG.popup({
					className: 'map__popup',
				}).setContent(popHeading);

				DG.marker(twoGis_map_data.placemarks[i].coord, {icon: myIcon}).addTo(map).bindPopup(obj_popup);
			}
		}
	});
	$(document.body).on('click.azbn7', '[data-office]', null, function(event){
		event.preventDefault();
		var btn = $(this);
		var coord = btn.attr('data-coord');
		var coord_arr = coord.split(',');
		console.dir(coord_arr);
		var lat = parseFloat((coord_arr[0] || '').trim());
		var lng = parseFloat((coord_arr[1] || '').trim());
		$('[data-office]').removeClass('is--active');
		$(this).addClass('is--active');
		map.setView(
			[lat,  lng]
		);
	});
}