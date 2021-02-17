<?php 
/* Loads etline-Icon Font. */
add_filter( 'vc_iconpicker-type-etline', 'vc_iconpicker_type_etline' );

/**
 * etline-Icon icons/
 *
 * @param $icons - taken from filter - vc_map param field settings['source'] provided icons (default empty array).
 * If array categorized it will auto-enable category dropdown
 *
 * @since 4.4
 * @return array - of icons for iconpicker, can be categorized, or not.
 */
function vc_iconpicker_type_etline( $icons ) {
	$etline_icons = array(
        array( "icon-mobile" => __( "mobile", "js_composer" ) ),
	    array( "icon-laptop" => __( "laptop", "js_composer" ) ),
        array( "icon-desktop" => __( "desktop", "js_composer" ) ),
	    array( "icon-tablet" => __( "tablet", "js_composer" ) ),
	    array( "icon-phone" => __( "phone", "js_composer" ) ),
	    array( "icon-document" => __( "document", "js_composer" ) ),
	    array( "icon-documents" => __( "documents", "js_composer" ) ),
	    array( "icon-search" => __( "search", "js_composer" ) ),
	    array( "icon-clipboard" => __( "clipboard", "js_composer" ) ),
	    array( "icon-newspaper" => __( "newspaper", "js_composer" ) ),
	    array( "icon-notebook" => __( "notebook", "js_composer" ) ),
	    array( "icon-browser" => __( "browser", "js_composer" ) ),
	    array( "icon-book-open" => __( "book-open", "js_composer" ) ),
	    array( "icon-calendar" => __( "calendar", "js_composer" ) ),
	    array( "icon-presentation" => __( "presentation", "js_composer" ) ),
        array( "icon-picture" => __( "picture", "js_composer" ) ),
	    array( "icon-pictures" => __( "pictures", "js_composer" ) ),
	    array( "icon-video" => __( "video", "js_composer" ) ),
	    array( "icon-camera" => __( "camera", "js_composer" ) ),
	    array( "icon-camera" => __( "camera", "js_composer" ) ),
	    array( "icon-printer" => __( "printer", "js_composer" ) ),
	    array( "icon-toolbox" => __( "toolbox", "js_composer" ) ),
	    array( "icon-briefcase" => __( "briefcase", "js_composer" ) ),
	    array( "icon-wallet" => __( "wallet", "js_composer" ) ),
	    array( "icon-gift" => __( "gift", "js_composer" ) ),
	    array( "icon-bargraph" => __( "bargraph", "js_composer" ) ),
	    array( "icon-ruya" => __( "ruya", "js_composer" ) ),
	    array( "icon-expand" => __( "expand", "js_composer" ) ),
	    array( "icon-focus" => __( "focus", "js_composer" ) ),
	    array( "icon-edit" => __( "edit", "js_composer" ) ),
	    array( "icon-adjustments" => __( "adjustments", "js_composer" ) ),
	    array( "icon-ribbon" => __( "ribbon", "js_composer" ) ),
	    array( "icon-hourglass" => __( "hourglass", "js_composer" ) ),
	    array( "icon-lock" => __( "lock", "js_composer" ) ),
	    array( "icon-megaphone" => __( "megaphone", "js_composer" ) ),
	    array( "icon-shield" => __( "shield", "js_composer" ) ),
	    array( "icon-trophy" => __( "trophy", "js_composer" ) ),
	    array( "icon-flag" => __( "flag", "js_composer" ) ),
	    array( "icon-map" => __( "map", "js_composer" ) ),
	    array( "icon-puzzle" => __( "puzzle", "js_composer" ) ),
	    array( "icon-basket" => __( "basket", "js_composer" ) ),
	    array( "icon-envelope" => __( "envelope", "js_composer" ) ),
	    array( "icon-streetsign" => __( "streetsign", "js_composer" ) ),
	    array( "icon-telescope" => __( "telescope", "js_composer" ) ),
	    array( "icon-gears" => __( "gears", "js_composer" ) ),
	    array( "icon-key" => __( "key", "js_composer" ) ),
	    array( "icon-paperclip" => __( "paperclip", "js_composer" ) ),
	    array( "icon-attachment" => __( "attachment", "js_composer" ) ),
	    array( "icon-pricetags" => __( "pricetags", "js_composer" ) ),
	    array( "icon-lightbulb" => __( "lightbulb", "js_composer" ) ),
	    array( "icon-layers" => __( "layers", "js_composer" ) ),
	    array( "icon-pencil" => __( "pencil", "js_composer" ) ),
	    array( "icon-tools" => __( "tools", "js_composer" ) ),
	    array( "icon-tools-2" => __( "tools-2", "js_composer" ) ),
	    array( "icon-scissors" => __( "scissors", "js_composer" ) ),
	    array( "icon-paintbrush" => __( "paintbrush", "js_composer" ) ),
	    array( "icon-magnifying-glass" => __( "magnifying-glass", "js_composer" ) ),
	    array( "icon-circle-compass" => __( "circle-compass", "js_composer" ) ),
	    array( "icon-linegraph" => __( "linegraph", "js_composer" ) ),
	    array( "icon-mic" => __( "mic", "js_composer" ) ),
	    array( "icon-strategy" => __( "strategy", "js_composer" ) ),
	    array( "icon-beaker" => __( "beaker", "js_composer" ) ),
	    array( "icon-caution" => __( "caution", "js_composer" ) ),
	    array( "icon-recycle" => __( "recycle", "js_composer" ) ),
	    array( "icon-anchor" => __( "anchor", "js_composer" ) ),
	    array( "icon-anchor" => __( "anchor", "js_composer" ) ),
	    array( "icon-profile-male" => __( "profile-male", "js_composer" ) ),
	    array( "icon-profile-female" => __( "profile-female", "js_composer" ) ),
	    array( "icon-bike" => __( "bike", "js_composer" ) ),
	    array( "icon-wine" => __( "wine", "js_composer" ) ),
	    array( "icon-hotairballoon" => __( "hotairballoon", "js_composer" ) ),
	    array( "icon-glob" => __( "glob", "js_composer" ) ),
	    array( "icon-genius" => __( "genius", "js_composer" ) ),
	    array( "icon-map-pin" => __( "map-pin", "js_composer" ) ),
	    array( "icon-dial" => __( "dial", "js_composer" ) ),
	    array( "icon-chat" => __( "chat", "js_composer" ) ),
	    array( "icon-heart" => __( "heart", "js_composer" ) ),
	    array( "icon-cloud" => __( "cloud", "js_composer" ) ),
	    array( "icon-upload" => __( "upload", "js_composer" ) ),
	    array( "icon-download" => __( "download", "js_composer" ) ),
	    array( "icon-traget" => __( "traget", "js_composer" ) ),
	    array( "icon-hazardous" => __( "hazardous", "js_composer" ) ),
	    array( "icon-piechart" => __( "piechart", "js_composer" ) ),
	    array( "icon-speedometer" => __( "speedometer", "js_composer" ) ),
	    array( "icon-global" => __( "global", "js_composer" ) ),
	    array( "icon-compass" => __( "compass", "js_composer" ) ),
	    array( "icon-lifesaver" => __( "lifesaver", "js_composer" ) ),
	    array( "icon-clock" => __( "clock", "js_composer" ) ),
	    array( "icon-aperture" => __( "aperture", "js_composer" ) ),
	    array( "icon-quote" => __( "quote", "js_composer" ) ),
	    array( "icon-scope" => __( "scope", "js_composer" ) ),
	    array( "icon-alarmclock" => __( "alarmclock", "js_composer" ) ),
	    array( "icon-refresh" => __( "refresh", "js_composer" ) ),
	    array( "icon-happy" => __( "happy", "js_composer" ) ),
	    array( "icon-sad" => __( "sad", "js_composer" ) ),
	    array( "icon-facebook" => __( "facebook", "js_composer" ) ),
	    array( "icon-twitter" => __( "twitter", "js_composer" ) ),
	    array( "icon-googleplus" => __( "googleplus", "js_composer" ) ),
	    array( "icon-googleplus" => __( "googleplus", "js_composer" ) ),
	    array( "icon-tumblr" => __( "tumblr", "js_composer" ) ),
	    array( "icon-linkedin" => __( "linkedin", "js_composer" ) ),
	    array( "icon-dribbble" => __( "dribbble", "js_composer" ) ),
	);
	return array_merge( $icons, $etline_icons );
} ?>