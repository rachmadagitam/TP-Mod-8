<html>  
<head>  
	<title>Add Place</title>  
</head>  
<body>  
<div id="map_canvas" style="width:100%; height:100%;"></div>  
</body>  
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>  
<script type="text/javascript">  
	(function() {  // fungsi untuk dijalankan ketika halaman web dubuka  
		var infowindow = null;  
		initialize(); // mengeksekusi fungsi initialize()  
	})();
	function initialize() {  
	// Baris berikut digunakan untuk mengisi marker atau tanda titik di peta  
		var sites = [];  
		var centerMap = new google.maps.LatLng(-5.387625, 105.249326); // mengatur pusat peta  
        var myOptions = {  
		    zoom: 13, // level zoom peta  
	        center: centerMap, // setting pusat peta ke centerMap  
	        mapTypeId: google.maps.MapTypeId.ROADMAP //menentukan tipe peta  
	    }  
   
		var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); //menempatkan peta pada div dengan ID map_canvas di html  
		setMarkers(map, sites); // memanggil fungsi setMarker untuk menandai titik di peta.       
	        infowindow = new google.maps.InfoWindow({  
	           content: "loading..."  
	        });  
		    var bikeLayer = new google.maps.BicyclingLayer();  
			bikeLayer.setMap(map); //memnunculkan peta         
			
		function setMarkers(map, markers) {  
			//berikut merupakan perulangan untuk membaca masing masing titik yang telah kita definisikan di sites[];  
			for (var i = 0; i < markers.length; i++) {  
				var sites = markers[i];  
		        var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);  
		        var marker = new google.maps.Marker({  
				    position: siteLatLng,  
		            map: map,  
		            title: sites[0],  
		            zIndex: sites[3],  
		            html: sites[4]     
	        	}); 
	          	var contentString = "Some content";  
	         	// berikut merupakan fungsi untuk mengatur agar keterangan marker muncuk ketika mouse diarahkan ke marker (mouse over)  
	         	google.maps.event.addListener(marker, "mouseover", function () {               
	            infowindow.setContent(this.html);  
	            infowindow.open(map, this);  
		        });  
        	}  

	    }     
</script>  
</html>  