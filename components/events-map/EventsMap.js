import GoogleMapsLoader from 'google-maps';

const API_KEY = 'AIzaSyD7Fem2tboGL7mit0d7qWOiYW7bdfB8bLc';
const wrapperEl = document.getElementById('tpr-events-map-wrapper');


const loadMapsAPI = ( [key, wrapperEl] ) => {
	return new Promise( (resolve, reject) => {
		GoogleMapsLoader.KEY = key;

		GoogleMapsLoader.load( google => {
			(typeof google !== 'undefined') ? resolve( [google, wrapperEl] ) : reject('GoogleMapsLoader error');
		});
	});
};

const initMap = ( [google, wrapperEl] ) => {
	return new Promise( (resolve, reject) => {

		const mapEl = document.createElement('div');

		mapEl.id = 'events-map';
		mapEl.style.width = '100%';
		mapEl.style.height = '400px';

		const OPTIONS = { scrollwheel: false };

		const events = [
			{ lat: 49.38, long: -66.94 },
			{ lat: 25.82, long: -124.39 }
		];

		wrapperEl.appendChild(mapEl);
		
		const map = new google.maps.Map(mapEl, OPTIONS);
		resolve([map, events]) 

	});
};

const setBounds = ( [map, events] ) => {
	return new Promise( (resolve, reject) => {
		const boundsObj = new google.maps.LatLngBounds();

		for(let event of events){
			const latLng = new google.maps.LatLng(event.lat*1, event.long*1);
			boundsObj.extend(latLng);
		}

		map.fitBounds(boundsObj);

		resolve([map, events]);
	})
};

const placeMarkers = ( [map, events] ) => {
	return new Promise( (resolve, reject) => {
		for(let event of events){
			const latLng = new google.maps.LatLng(event.lat*1, event.long*1);		
			const marker = new google.maps.Marker({
				position: latLng,
				map: map
			});
			resolve([map, events])
		}
	});
};



	///////TESTING////////////
	const asyncGet = ( [map] ) => {
		const MOCK_API_ENDPOINT = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/39469/MOCK_DATA.json';
		return new Promise( (resolve, reject) => {
		  $.get( MOCK_API_ENDPOINT, (events) => {
				resolve( [map, events] );
		  });
		})
	}
	///////TESTING////////////


if( typeof wrapperEl === 'object' ) {
	
	loadMapsAPI([API_KEY, wrapperEl])
		.then( initMap )
		.then( asyncGet )
		.then( setBounds )
		.then( placeMarkers )
		.catch( err => console.log(err) ) 

};
