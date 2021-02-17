<?php
vc_map(array(
    "name" => 'Google Maps',
    "base" => "maps",
    "category" => esc_html__('Extra Elements', 'ruya'),
    "icon" => "tb-icon-for-vc fa fa-map-marker",
    "description" => esc_html__('Google Maps API', 'ruya'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__('API Key', 'ruya'),
            "param_name" => "api",
            "value" => '',
            "description" => esc_html__('Enter you api key of map, get key from (https://console.developers.google.com)', 'ruya')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Address', 'ruya'),
            "param_name" => "address",
            "value" => 'New York, United States',
            "description" => esc_html__('Enter address of Map', 'ruya')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Coordinate', 'ruya'),
            "param_name" => "coordinate",
            "value" => '',
            "description" => esc_html__('Enter coordinate of Map, format input (latitude, longitude)', 'ruya')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Click Show Info window', 'ruya'),
            "param_name" => "infoclick",
            "value" => array(
                esc_html__("Yes, please", 'ruya') => true
            ),
            "group" => esc_html__("Marker", 'ruya'),
            "description" => esc_html__('Click a marker and show info window (Default Show).', 'ruya')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Marker Coordinate', 'ruya'),
            "param_name" => "markercoordinate",
            "value" => '',
            "group" => esc_html__("Marker", 'ruya'),
            "description" => esc_html__('Enter marker coordinate of Map, format input (latitude, longitude)', 'ruya')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Marker Title', 'ruya'),
            "param_name" => "markertitle",
            "value" => '',
            "group" => esc_html__("Marker", 'ruya'),
            "description" => esc_html__('Enter Title Info windows for marker', 'ruya')
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__('Marker Description', 'ruya'),
            "param_name" => "markerdesc",
            "value" => '',
            "group" => esc_html__("Marker", 'ruya'),
            "description" => esc_html__('Enter Description Info windows for marker', 'ruya')
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__('Marker Icon', 'ruya'),
            "param_name" => "markericon",
            "value" => '',
            "group" => esc_html__("Marker", 'ruya'),
            "description" => esc_html__('Select image icon for marker', 'ruya')
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => esc_html__('Marker List', 'ruya'),
            "param_name" => "markerlist",
            "value" => '',
            "group" => esc_html__("Multiple Marker", 'ruya'),
            "description" => esc_html__('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', 'ruya')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Info Window Max Width', 'ruya'),
            "param_name" => "infowidth",
            "value" => '200',
            "group" => esc_html__("Marker", 'ruya'),
            "description" => esc_html__('Set max width for info window', 'ruya')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Map Type", 'ruya'),
            "param_name" => "type",
            "value" => array(
                "ROADMAP" => "ROADMAP",
                "HYBRID" => "HYBRID",
                "SATELLITE" => "SATELLITE",
                "TERRAIN" => "TERRAIN"
            ),
            "description" => esc_html__('Select the map type.', 'ruya')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style Template", 'ruya'),
            "param_name" => "style",
            "value" => array(
                "Default" => "",
                "Subtle Grayscale" => "Subtle-Grayscale",
                "Shades of Grey" => "Shades-of-Grey",
                "Blue water" => "Blue-water",
                "Pale Dawn" => "Pale-Dawn",
                "Blue Essence" => "Blue-Essence",
                "Apple Maps-esque" => "Apple-Maps-esque",
            ),
            "group" => esc_html__("Map Style", 'ruya'),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Zoom', 'ruya'),
            "param_name" => "zoom",
            "value" => '13',
            "description" => esc_html__('zoom level of map, default is 13', 'ruya')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Width', 'ruya'),
            "param_name" => "width",
            "value" => 'auto',
            "description" => esc_html__('Width of map without pixel, default is auto', 'ruya')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Height', 'ruya'),
            "param_name" => "height",
            "value" => '350px',
            "description" => esc_html__('Height of map without pixel, default is 350px', 'ruya')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Scroll Wheel', 'ruya'),
            "param_name" => "scrollwheel",
            "value" => array(
                esc_html__("Yes, please", 'ruya') => true
            ),
            "group" => esc_html__("Controls", 'ruya'),
            "description" => esc_html__('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', 'ruya')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Pan Control', 'ruya'),
            "param_name" => "pancontrol",
            "value" => array(
                esc_html__("Yes, please", 'ruya') => true
            ),
            "group" => esc_html__("Controls", 'ruya'),
            "description" => esc_html__('Show or hide Pan control.', 'ruya')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Zoom Control', 'ruya'),
            "param_name" => "zoomcontrol",
            "value" => array(
                esc_html__("Yes, please", 'ruya') => true
            ),
            "group" => esc_html__("Controls", 'ruya'),
            "description" => esc_html__('Show or hide Zoom Control.', 'ruya')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Scale Control', 'ruya'),
            "param_name" => "scalecontrol",
            "value" => array(
                esc_html__("Yes, please", 'ruya') => true
            ),
            "group" => esc_html__("Controls", 'ruya'),
            "description" => esc_html__('Show or hide Scale Control.', 'ruya')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Map Type Control', 'ruya'),
            "param_name" => "maptypecontrol",
            "value" => array(
                esc_html__("Yes, please", 'ruya') => true
            ),
            "group" => esc_html__("Controls", 'ruya'),
            "description" => esc_html__('Show or hide Map Type Control.', 'ruya')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Street View Control', 'ruya'),
            "param_name" => "streetviewcontrol",
            "value" => array(
                esc_html__("Yes, please", 'ruya') => true
            ),
            "group" => esc_html__("Controls", 'ruya'),
            "description" => esc_html__('Show or hide Street View Control.', 'ruya')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Over View Map Control', 'ruya'),
            "param_name" => "overviewmapcontrol",
            "value" => array(
                esc_html__("Yes, please", 'ruya') => true
            ),
            "group" => esc_html__("Controls", 'ruya'),
            "description" => esc_html__('Show or hide Over View Map Control.', 'ruya')
        )
    )
));