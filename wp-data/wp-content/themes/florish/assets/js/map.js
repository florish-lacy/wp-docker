jQuery(document).ready(function(){
 
 window.initMap = initMap();
 var script = document.createElement('script');
 script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBqxHeRDjgzm72wXzGKE1oxS4lgyT3K6uM&callback=initMap&libraries=places&v=weekly';
 script.defer = true;
 script.async = true;
 
 var circle;
 var map;
 function initMap() {
     var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
       map = new google.maps.Map(document.getElementById('map'), {
       center: centerCoordinates,
       //mapId: "8e0a97af9386fef",
       zoom: 5
       });
       var card = document.getElementById('pac-card');
       var input = document.getElementById('pac-input');
   
       var infowindowContent = document.getElementById('infowindow-content');
       
       //map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

       var autocomplete = new google.maps.places.Autocomplete(input);
       var infowindow = new google.maps.InfoWindow();
       infowindow.setContent(infowindowContent);
       
       var marker = new google.maps.Marker({
         map: map
       });
   
  
   circle = new google.maps.Circle({
      map: map,
      strokeColor: "#FF0000",
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: "#FF0000",
          fillOpacity: 0.35,
          center: centerCoordinates,
          radius: 10 * 1609.34,
      
   });

       autocomplete.addListener('place_changed', function() {
          document.getElementById("location-error").style.display = 'none';
           infowindow.close();
           marker.setVisible(false);
           var place = autocomplete.getPlace();
           if (!place.geometry) {
               document.getElementById("location-error").style.display = 'inline-block';
               document.getElementById("location-error").innerHTML = "Cannot Locate '" + input.value + "' on map";
               return;
           }
           
           map.fitBounds(place.geometry.viewport);
           marker.setPosition(place.geometry.location);
       circle.setCenter(place.geometry.location);
           marker.setVisible(true);
           circle.setVisible(true);
         
           infowindowContent.children['place-icon'].src = place.icon;
           infowindowContent.children['place-name'].textContent = place.name;
           infowindowContent.children['place-address'].textContent = input.value;
           infowindow.open(map, marker);


        //  for (var i = 0; i < place.address_components.length; i++) {
              //   for (var j = 0; j < place.address_components[i].types.length; j++) {
              //       if (place.address_components[i].types[j] == "postal_code") {
              //         console.log(place.address_components[i].long_name);
              //           document.getElementById("zipcode").value = place.address_components[i].long_name;
              //       }
              //     }
              //   }

           document.getElementById("latitude").value = place.geometry.location.lat();
           document.getElementById("longitude").value = place.geometry.location.lng();
           document.getElementById("fulladdress").value = place.formatted_address;
       });

       
        map.setOptions({ styles: [
          {
            elementType: "geometry",
            stylers: [{ color: "#f5f5f5" }],
          },
          {
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }],
          },
          {
            elementType: "labels.text.fill",
            stylers: [{ color: "#616161" }],
          },
          {
            elementType: "labels.text.stroke",
            stylers: [{ color: "#f5f5f5" }],
          },
          {
            featureType: "administrative.land_parcel",
            elementType: "labels.text.fill",
            stylers: [{ color: "#bdbdbd" }],
          },
          {
            featureType: "poi",
            elementType: "geometry",
            stylers: [{ color: "#eeeeee" }],
          },
          {
            featureType: "poi",
            elementType: "labels.text.fill",
            stylers: [{ color: "#757575" }],
          },
          {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [{ color: "#e5e5e5" }],
          },
          {
            featureType: "poi.park",
            elementType: "labels.text.fill",
            stylers: [{ color: "#9e9e9e" }],
          },
          {
            featureType: "road",
            elementType: "geometry",
            stylers: [{ color: "#ffffff" }],
          },
          {
            featureType: "road.arterial",
            elementType: "labels.text.fill",
            stylers: [{ color: "#757575" }],
          },
          {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{ color: "#dadada" }],
          },
          {
            featureType: "road.highway",
            elementType: "labels.text.fill",
            stylers: [{ color: "#616161" }],
          },
          {
            featureType: "road.local",
            elementType: "labels.text.fill",
            stylers: [{ color: "#9e9e9e" }],
          },
          {
            featureType: "transit.line",
            elementType: "geometry",
            stylers: [{ color: "#e5e5e5" }],
          },
          {
            featureType: "transit.station",
            elementType: "geometry",
            stylers: [{ color: "#eeeeee" }],
          },
          {
            featureType: "water",
            elementType: "geometry",
            stylers: [{ color: "#c9c9c9" }],
          },
          {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{ color: "#9e9e9e" }],
          },
        ] 
      });
       

   }

  

   jQuery('#radius').on('change', function() {
    var miles = this.value;
    jQuery('#radious_miles').val(this.value);
    circle.setRadius(miles * 1609.34);
    map.fitBounds(circle.getBounds());
  });

  jQuery('#radious_miles').on('blur', function() {
    jQuery('#radius').val(this.value);
    var miles = this.value;
    circle.setRadius(miles * 1609.34);
    map.fitBounds(circle.getBounds());
  });

  jQuery('#save_market').on('click', function() {
    if (confirm('Are you sure want to add market?')) {
      if(jQuery('#market_name').val() == ''){
        jQuery('#field-error').text('Please enter market name');
      }else if(jQuery('#latitude').val() == ''){
        jQuery('#location-error').text('Please select market location');
        jQuery('#field-error').text('');
      }else if(jQuery('#radious_miles').val() == ''){
        jQuery('#miles-field-error').text('Please enter miles');
      }else if(jQuery('#take_rate').val() == ''){
        jQuery('#rate-field-error').text('Please enter take rate %');
      }else{
        //alert('dhghdg');
        jQuery('#added_market').click();
      }
      
  } 

  });


 
   document.head.appendChild(script);

   jQuery(document).on('click', '#update_market', function(){
  
    if (confirm('Are you sure want to update market?')) {
      if(jQuery('#market_name1').val() == ''){
        jQuery('#field-error').text('Please enter market name');
      }else if(jQuery('#latitude1').val() == ''){
        jQuery('#location-error').text('Please select market location');
        jQuery('#field-error').text('');
      }else if(jQuery('#radious_miles1').val() == ''){
        jQuery('#miles-field-error').text('Please enter miles');
      }else if(jQuery('#take_rate1').val() == ''){
        jQuery('#rate-field-error').text('Please enter take rate %');
      }else{
       // alert('dhghdg');
        jQuery('#update_markets').click();
      }
      
  } 

  });

});

