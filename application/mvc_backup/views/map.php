<?php
//print_r($markers);die;
?>
<div class="container">

    <div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
        <div class="career_box1_sub"></div>
        <h1 style="text-align:center;" class="service_box1_text1 animate_bottom">Media</h1>
    </div>

    <div class="media_box2 pad0 grid-100 mobile-grid-100 tablet-grid-100">

        <?php
        /* lat/lng data will be added to this array */
        $locations = array();

        foreach ($markers as $row) {
            $locations[] = array('name' => $row->name, 'lat' => $row->lat, 'lng' => $row->lng);
        }


        /* Convert data to json */
        $markers = json_encode($locations);
        ?>
        <script type='text/javascript'>
<?php
echo "var markers=$markers;\n";
?>

            function initMap() {

                var latlng = new google.maps.LatLng(-33.92, 151.25);
                var myOptions = {
                    zoom: 10,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: false
                };

                var map = new google.maps.Map(document.getElementById("peta"), myOptions);
                var infowindow = new google.maps.InfoWindow(), marker, lat, lng;
                var json = JSON.parse(markers);

                for (var o in json) {

                    lat = json[ o ].lat;
                    lng = json[ o ].lng;
                    name = json[ o ].name;

                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(lat, lng),
                        name: name,
                        map: map
                    });
                    google.maps.event.addListener(marker, 'click', function (e) {
                        infowindow.setContent(this.name);
                        infowindow.open(map, this);
                    }.bind(marker));
                }
            }
        </script>
        <div style="height: 500px" id="peta"></div>

        <!--        <div class="grid-container pad0">
                    <style>
                        /* Always set the map height explicitly to define the size of the div
                         * element that contains the map. */
                        #map {
                            height: 100%;
                        }
                        /* Optional: Makes the sample page fill the window. */
                        html, body {
                            height: 100%;
                            margin: 0;
                            padding: 0;
                        }
                    </style>
                    <div style="height: 500px" id="map"></div>
                    <script>
                        var map;
                        function initMap() {
                            map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 16,
                                center: new google.maps.LatLng(-33.91722, 151.23064),
                                mapTypeId: google.maps.MapTypeId.map
                            });
        
                            var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
                            var icons = {
                                parking: {
                                    icon: iconBase + 'parking_lot_maps.png'
                                },
                                library: {
                                    icon: iconBase + 'library_maps.png'
                                },
                                info: {
                                    icon: iconBase + 'info-i_maps.png'
                                }
                            };
        
                            var features = [
        <?php foreach ($markers as $row) { ?>
                                                    {
                                                        position: new google.maps.LatLng('<?php echo $row->lat ?>', '<?php echo $row->lng ?>'),
                                                        type: 'info'
                                                    },
        <?php } ?>
        
                            ];
        
                            // Create markers.
                            features.forEach(function (feature) {
                                var marker = new google.maps.Marker({
                                    position: feature.position,
                                    icon: icons[feature.type].icon,
                                    map: map
                                });
                            });
                        }
                    </script>-->
        <script async defer
        <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbkiR1Rbp26eUAzT6cWmhLmua7LiO5yBQ&callback=initMap"></script>
            </script>
        </div>

    </div>
</div>
