'use strict'

/*
Load New Event Posts

Search Existing Based on Query

Add New Event Based on Form

Check to make sure there isn't any input that's been type while the client was loading

have PHP based search as a fallback if JS isn't working

Im going to add the category events, and thought that it might also make sense to add a state tag if it exists

should probably make a hash based on date location to check against for the purposes of avoiding duplication

make sure when posts are created that they are also published at some point

*/

console.log('Yo!')

// const MOCK_API_ENDPOINT = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/39469/MOCK_DATA.json';

// const asyncGet = new Promise(
//     (resolve, reject) => {
//         $.get( MOCK_API_ENDPOINT, (events) => resolve(events) );  
//     }
// );

// wp.api.loadPromise.done( () => {


//     asyncGet.then((events)=>{
    	
//     	for(event of events){

//     		const postObj = {
// 				'title'   : event.summary,
// 				'content' : "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque consectetur sunt sequi eaque ex nesciunt aliquam sint accusamus quaerat asperiores, iure nostrum necessitatibus illo quae eveniet quis, odit est repellendus.",
// 				'excerpt' : event.title,
// 				'tags'   : [event.state],

// 				// 'author'  : event.first_name + ' ' + event.last_name,
				
// 				// "meta": {
// 				// 	'avatar'     : event.avatar,
// 				// 	'city'       : event.city,
// 				// 	'email'      : event.email,
// 				// 	'lat'        : event.lat,
// 				// 	'long'       : event.long,
// 				// 	'phone'      : event.phone,
// 				// 	'state'      : event.state,
// 				// 	'summary'    : event.summary
// 				// }
// 			};

// 			// console.log(postObj)

    		
// 			var post = new wp.api.models.Post(postObj);

// 			post.setCategories( [ 'events' ]  );

// 			post.save();

// 			// return

//     	}
//     })




// });

// // const placeMarker = (mapID, position) => {
// //     let marker = new google.maps.Marker({
// //         position: position,
// //         map: mapID
// //     });
// // }

// // const mapFunctions = (bounds, mapID, event) => {
// //     let position = { lat: event.lat*1, lng: event.long*1 }
    
// //     bounds.extend(position);
    
// //     placeMarker(mapID, position);
// // }


// // const buildListItem = (event) => {
// //     return `<li>
// //     <span class="title">${event.title}</span>
// //     <span class="summary">${event.summary}</span>
// // </li>`;
// // }


// // const initMap = () => {
// //     asyncGet.then((events)=>{
        
// //         const MAP_EL = document.getElementById('map');
// //         const listTarget = document.getElementsByClassName('event-list')[0];
// //         const options = {
// //             scrollwheel: false,
// //         }
// //         const bounds = new google.maps.LatLngBounds();
// //         const map = new google.maps.Map(MAP_EL, options);
        
// //         let listItems = ''
        
// //         for(var event of events){
// //             mapFunctions(bounds, map, event); 
            
// //             listItems += buildListItem(event); 
// //         }
        
// //         map.fitBounds(bounds);
        
        
// //         listTarget.innerHTML=listItems;
        

// //     })
// // }




