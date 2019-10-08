<style type="text/css">
    #accordion label.col-sm-2.control-label {
    margin: 7px 0 0;
    padding: 0 15px 0 0;
    width: 25%;
    }
    #accordion .panel-title > a {
        color: inherit;
        display: inline-block;
        width: 100%;  
        text-align: left;
    }
    #accordion .panel-body {
        text-align: left;
    }
    #accordion .col-sm-10 {width: 75%;}
    #accordion .form-horizontal .control-label {text-align:left;}
    .account-address .table > tbody > tr > td {vertical-align: middle; border:none; padding:13px;}

    .checkout-cart #accordion .panel-title {  padding: 0;}
    #accordion .panel-title, .checkout-cart #accordion .panel-title > a { padding: 10px;}
    #accordion #collapse-shipping label.col-sm-2.control-label { padding: 0 15px;}

</style>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<div class="container">
  <div class="content gutter">
      <section class="product-push homepage" data-module="productpush, view360" style="padding: 0px;background: #fff;padding-top: 30px;">
          <div class="row" style="padding: 15px;">
              <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
              <h1 class="mb-xs-3 mb-md-4 mb-lg-5 h5-display"><span style="color: #ef7002;">CONTACT US</span></h1><br/>
                  <hr>
                  <div class="googlemap-position"></div>
                  <div class="contact-block clearfix row" id="contactForm">
                    <ul class="row">

                      <?php if($contactus!=null){ foreach ($contactus as $key) { ?>
                       <center><li class="col-xs-12 col-sm-4">
                      <div class="">
                      <?php if($key->IMAGE!=''){ ?>
                      <img style="max-width:200px;height:70px;" src="<?php echo base_url(); ?>assets/img/contactus/<?php   echo $key->IMAGE; ?>"/></br>
                      <?php } ?>
                      <h3><?php echo $key->TITLE; ?></h3>
                      <?php echo $key->DESCRIPTION; ?>
                      </div></br> <hr>
                      </li></center>
                      <?php }} ?>


                    </ul> 
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
                <script type="text/javascript">
                //<![CDATA[
                    var contactForm = new VarienForm('contactForm', true);
                //]]>
                </script>
              </div>
          </div>
      </section>
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
