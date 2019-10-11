
<div class="pages-container">
  <div class="pages-inner-container">


    <div class="row">
      <div class="col-12 col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex justify-content-center">
          <h4 class="text-uppercase" style="color: #34ca9d">contact us</h4>
        </div>
      </div>    
    </div>

    <div class="row">

    <?php foreach($contactus->result() as $data): ?>
      <div class="col-12 col-md-4 col-lg-4 col-xl-4">
        
        <div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-center">
              <img alt="<?php echo $data->TITLE; ?>" class="contact-logo" src="<?php echo base_url('assets/images/').$data->IMAGE; ?>" >
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-center">
              <span class="text-center"><?php echo $data->DESCRIPTION; ?></span>
            </div>
          </div>
        </div>

      </div>
    <?php endforeach; ?>
    
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="col-lg-12 col-md-21 col-sm-12 col-xs-12">
          <div id="mapd">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=false&key=AIzaSyCHrrMtxxFPWa5ad1eAIzpm_vrdooqr81M"></script>
            <div id="map" style="width:100%; min-height:350px;"></div>    
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script>
var geocoder = new google.maps.Geocoder();
var marker = null;
var map = null;
function initialize() {
      var $latitude = document.getElementById('latitude');
      var $longitude = document.getElementById('longitude');
      
      var zoom = 16;

      // var LatLng = new google.maps.LatLng('https://goo.gl/maps/cATcbCEi');
      var LatLng = new google.maps.LatLng(-6.117511,106.7872833);

      var mapOptions = {
        zoom: zoom,
        center: LatLng,
        panControl: false,
        zoomControl: false,
        scaleControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      map = new google.maps.Map(document.getElementById('map'), mapOptions);
      if (marker && marker.getMap) marker.setMap(map);
      marker = new google.maps.Marker({
        position: LatLng,
        map: map,
        title: 'Drag Me!',
        draggable: true
      });

      google.maps.event.addListener(marker, 'dragend', function(marker) {
        var latLng = marker.latLng;
        $latitude.value = latLng.lat();
        $longitude.value = latLng.lng();
      });


    }
    initialize();
    $("#findbutton").click(function (e) {
        var address = $("#Postcode").val();
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                $(latitude).val(marker.getPosition().lat());
                $(longitude).val(marker.getPosition().lng());
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
        e.preventDefault();
    });
</script>