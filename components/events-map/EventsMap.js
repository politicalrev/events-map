import GoogleMapsLoader from 'google-maps';

window.__TPR = {};
const TPR_EVENTS = window.__TPR.events = {}; 

const loadMapsAPI = new Promise( (resolve, reject) => {
	GoogleMapsLoader.KEY = 'AIzaSyD7Fem2tboGL7mit0d7qWOiYW7bdfB8bLc'
	GoogleMapsLoader.load( google => resolve(google) );
});

const initMap = (google) => {

	const mapEl = document.createElement('div');
	const OPTIONS = { scrollwheel: false };

  const US = [
		{ lat: 49.38, long: -66.94 },
    { lat: 25.82, long: -124.39 }
	];


	mapEl.id = 'events-map';
	mapEl.style.width = '100%';
	mapEl.style.height = '400px';

	document.getElementById('tpr-events-map-wrapper').appendChild(mapEl);
	
  const map = new google.maps.Map(mapEl, OPTIONS);
  const boundsObj = new google.maps.LatLngBounds();

	// for(let event of US){
	// 	let latLng = new google.maps.LatLng(event.lat*1, event.long*1);

	// 	let marker = new google.maps.Marker({
 //      position: latLng,
 //      title:"Hello World!",
 //      visible: true,
 //      map: map
	//   });
	// }


  setMapState(map, boundsObj, US);

};

const setMapState = async (map, boundsObj, events) => {
	const latLngArray = []

	for(let event of events){
		let latLng = new google.maps.LatLng(event.lat*1, event.long*1);

		placeMarker(map, latLng);
		boundsObj.extend(latLng);
	}

	map.fitBounds(boundsObj);

	// Promise.all(events.map( event => {
	// 	let latLng = { lat: event.lat*1, lng: event.long*1 };
		
	// 	boundsObj.extend(latLng);
	// 	const jah = await placeMarker(map, latLng);

	// })).then( () => {
	// });
}


const updateBounds = (boundsObj, event) => {
	

	
};

const placeMarker = function(map, event) {
	let latLng = new google.maps.LatLng(event.lat*1, event.long*1);


	// return new Promise( resolve => {
		let thisMap = map;
	  let marker = new google.maps.Marker({
      position: latLng,
      title:"Hello World!",
      visible: true,
      map: thisMap
	  });

	  marker.setMap(thisMap);

		// console.log(map);



	 //  resolve();
  // });

};




loadMapsAPI.then( google => initMap(google) );

///////TESTING////////////
const MOCK_API_ENDPOINT = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/39469/MOCK_DATA.json';

const asyncGet = new Promise( (resolve, reject) => {

  $.get( MOCK_API_ENDPOINT, (events) => {

		resolve();
  });  
});

asyncGet.then(function(){
	setMapState
}) 
///////TESTING////////////

