google.maps.event.addDomListener(window,"load",function(){


	var coordenadas={lat: -12.0750, lng: -77.0435};
	mapa = new google.maps.Map(document.getElementById("_mapa"),{zoom:17,center:coordenadas});

	

	var autocomplete1 = document.getElementById("partida_reserva");
	var autocomplete2 = document.getElementById("destino_reserva");

	var opciones = {

		componentRestrictions:{country:'pe'}
	}

	search1 = new google.maps.places.Autocomplete(autocomplete1,opciones);
	search1.bindTo("bounds",mapa);

	search2 = new google.maps.places.Autocomplete(autocomplete2,opciones);
	search2.bindTo("bounds",mapa);

	 marker = new google.maps.Marker({

	 	map:mapa
	 });

	var objconfig_dr = {
				map:mapa
			}

	var ds = new google.maps.DirectionsService();
	var dr = new google.maps.DirectionsRenderer(objconfig_dr);

	search1.addListener('place_changed',function(){

			var origen = search1.getPlace();
			//console.log(origen);
			
			var destino = document.getElementById("destino_reserva").value;
			if(destino != ""){

					var objconfig_ds={
						origin:origen.formatted_address,
						destination:destino,
						travelMode:google.maps.TravelMode.DRIVING
					}

				ds.route(objconfig_ds,fnrouter);

			}else{

				if(origen.geometry.viewport){

					mapa.fitBounds(origen.geometry.viewport)
					//console.log(origen.geometry.viewport);
					//console.log("viewport");
				}else{
					mapa.setCenter(origen.geometry.location);
					mapa.setZoom(18);
				}
				marker.setPosition(origen.geometry.location);
				marker.setVisible(true);
				//console.log(origen.geometry.location);
			}
	})


	search2.addListener('place_changed',function(){

			var destino = search2.getPlace();

			var origen = document.getElementById("partida_reserva").value;
			if(origen != ""){
				//alert(origen);
					marker.setVisible(false);
					var objconfig_ds={
						origin:origen,
						destination:destino.formatted_address,
						travelMode:google.maps.TravelMode.DRIVING
					}

				ds.route(objconfig_ds,fnrouter);
			}

	})

	var set_ubicacion = document.getElementById("mi_ubicacion");

		set_ubicacion.onclick=function(){
			
			if(navigator.geolocation){
				
				navigator.geolocation.getCurrentPosition(function(position){
					var lat = position.coords.latitude;
					var lon = position.coords.longitude;
					buscarDireccion(lat,lon,marker);
					//console.log(lat+" "+lon) 
				})

			}else{
				alert("no se pudo completar la accion");
			}

		}

	function fnrouter(resultado,status){

		if(status == 'OK'){ 
			//alert("ok ");
			dr.setDirections(resultado);

		}else{
			alert("error");
		}
	}


		 function buscarDireccion(lat,lon,marker){
	    	var geocoder = new google.maps.Geocoder();

	    	var ubicacion = {lat:parseFloat(lat),lng:parseFloat(lon)};
	    	var destino = document.getElementById("destino_reserva").value;

	    	geocoder.geocode({'location':ubicacion},function(results,status){
	    		if(status === google.maps.GeocoderStatus.OK){

	    			var resultados = results[0].formatted_address;
	    			var caja = document.getElementById("partida_reserva");
	    			caja.value = resultados;

	    			if(destino != ""){
	    				var objconfig_ds={
							origin:caja.value,
							destination:destino,
							travelMode:google.maps.TravelMode.DRIVING
						}

						ds.route(objconfig_ds,fnrouter);
	    			}

	    		}else{

	    			var mensaje="";
	    			if(status === "ZERO_RESULTS"){
	    				mensaje = "no hubo resultados para la direccion ingresada";
	    			}else if(status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR"){
	    				mensaje = "Error general del mapa"; 
	    			}else if(status === "INVALID_REQUEST"){
	    				mensaje="Error de la web";
	    			}
	    			alert(mensaje);
	    		}
	    	})

	    }


});





	    	
