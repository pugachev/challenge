// Initialize and add the map
let map;

async function initMap() {

//     const myLatLng = { lat: 34.66819402479193, lng: 135.16770751655454 };
//     //@ts-ignore
//     const { Map } = await google.maps.importLibrary("maps");
//     const { AdvancedMarkerView } = await google.maps.importLibrary("marker");
//     const map = new google.maps.Map(document.getElementById("map"), {
//       zoom: 18,
//       center: myLatLng,
//     });
// //   const marker = new AdvancedMarkerView({
// //     map: map,
// //     pposition: myLatLng,
// //     title: "aaa",
// //   });

  // The location of Uluru
  const position = { lat: 34.66814375205347, lng: 135.16499024012973 };
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

  // The map, centered at Uluru
  map = new Map(document.getElementById("map"), {
    zoom: 18,
    center: position,
    mapId: "DEMO_MAP_ID",
  });

//   new google.maps.Marker({
//     position: { lat: 34.66819402479193, lng: 135.16770751655454 },
//     map,
//     title: "ワイ宅",
//   });

  // The marker, positioned at Uluru
  const marker = new AdvancedMarkerView({
    map: map,
    position: { lat: 34.66819402479193, lng: 135.16770751655454 },
    title: "ワイ宅",
  });

  const marker2 = new AdvancedMarkerView({
    map: map,
    position: { lat: 34.66791523922963, lng: 135.16540144350788 },
    title: "ドトール",
  });

  // const marker3 = new AdvancedMarkerView({
  //   map: map,
  //   position: { lat: 34.657527777778, lng: 135.14607222222 },
  //   title: "東急プラザ(旧ジョイプラ)",
  // });


  const beachFlagImg = document.createElement('img');
  beachFlagImg.src = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
  
  const beachFlagMarkerView = new google.maps.marker.AdvancedMarkerView({
      map,
      position: { lat: 34.657527777778, lng: 135.14607222222 },
      content: beachFlagImg,
      title: '東急プラザ(旧ジョイプラ)',
  });

}

initMap();
