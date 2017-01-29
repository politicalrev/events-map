import GoogleMapsLoader from 'google-maps';


const loadMaps = new Promise( (resolve, reject) => {
	GoogleMapsLoader.KEY = 'AIzaSyD7Fem2tboGL7mit0d7qWOiYW7bdfB8bLc'
	GoogleMapsLoader.load( google => resolve(google) );
});

const updateBounds = (bounds, locArr) => {

	for (let latLng in locArr){
		console.log(locArr[latLng]);
		bounds.extend(locArr[latLng]);
	}

}

const initMap = (google) => {

	const mapEl = document.createElement('div');
    const listTarget = document.getElementsByClassName('event-list')[0];
    const OPTIONS = {
        scrollwheel: false,
    };
    const initialLatLngs = [
		{ lat: 49.38, lng: -66.94 },
	    { lat: 25.82, lng: -124.39 }
	];

    const map = new google.maps.Map(mapEl, OPTIONS);
    const bounds = new google.maps.LatLngBounds();

	mapEl.id = 'events-map';
	mapEl.style.width = '100%';
	mapEl.style.height = '400px';

	document.getElementById('tpr-events-map-wrapper').appendChild(mapEl);

    updateBounds(bounds, initialLatLngs);

    map.fitBounds(bounds);
};

loadMaps.then( google => initMap(google) );
