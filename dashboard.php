<?php


// STATS APP - GET TOTAL NUMBER OF PROPERTIES
// TEST WEBFEED
// SHOW API STATUS

//	GET AGENT ID FOR STATS APP

    $apikey = get_option('dezrez_api');
    $eaid = get_option('dezrez_eaid');
	$url = site_url();

//	GET DATA FOR STATS APP

$xmlR = "http://www.dezrez.com/DRApp/DotNetSites/WebEngine/property/Default.aspx?apikey=" . $apikey . "&EAID=" . $eaid . "&XSLT=-1&perpage=32000";

$xmlR4 = "http://www.dezrez.com/DRApp/DotNetSites/WebEngine/property/Default.aspx?apikey=" . $apikey . "&EAID=" . $eaid . "&XSLT=-1&perpage=32000&rentalperiod=4";

	if($eaid == '')
	{
	$html = '<img src="../wp-content/plugins/dezrez/images/logo.png" /><h3>Click below to set up your dezrez plugin</h3><br><a href="' . $url . '/wp-admin/admin.php?page=dezrez_settings"><div class="button button-primary">Setup</div></a>';
	}
	
	if($eaid != '')
	{
	
	;
	
	if (ini_get('allow_url_fopen')) { $letstats=simplexml_load_file($xmlR4); $stats=simplexml_load_file($xmlR);
                                                                                    
	} else {
				$ch = curl_init($xmlR);    
				curl_setopt($ch, CURLOPT_HEADER, false);    
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
				$xml_raw = curl_exec($ch);    
				$stats = simplexml_load_string($xml_raw);
				
				$ch = curl_init($xmlR4);    
				curl_setopt($ch, CURLOPT_HEADER, false);    
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
				$xml_raw = curl_exec($ch);    
				$letstats = simplexml_load_string($xml_raw);
	}

	
	$apistatus = $stats->apiKey;
	if($apistatus == 'API key ok.')
	{
	$salearr = $stats->propertySearchSales->properties->pages->attributes();
	$salenum = $salearr["count"];
	
	
	$letarr = $letstats->propertySearchLettings->properties->pages->attributes();
	$letnum = $letarr["count"];
	
	}
	}
	
// Hide Standard Wordpress Widgets

add_action('wp_dashboard_setup', 'remove_widgets' );

function remove_widgets()
{
global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);	
}


//	LIST WIDGET CONTENT
function prop_stats() {

//	DECLARE GLOBALS
global $url, $stats, $letstats, $apistatus, $salenum, $letnum, $html;
$total = $letnum + $salenum;
//	WIDGET CODE
if($html == '')
{
$html = '
<link href="'. plugins_url( 'css/jquery.circliful.css' , __FILE__ ) .'" rel="stylesheet" type="text/css" />

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="'. plugins_url( 'js/jquery.circliful.min.js' , __FILE__ ) .'"></script>
<script>
$( document ).ready(function() {
		$("#letstat").circliful();
		$("#salestat").circliful();
    });
</script>
<div id="salestat" style="display:inline-block; float:left;" data-dimension="193" data-text="'.$salenum.' Sales" data-info="Sales" data-width="30" data-fontsize="20" data-fgcolor="#F97229" data-bgcolor="#eee" data-total="'.$total.'" data-part="'.$salenum.'" data-border="inline"></div>
<div id="letstat" style="display:inline-block;" data-dimension="193" data-text="'.$letnum.' Lettings" data-info="Lettings" data-width="30" data-fontsize="20" data-fgcolor="#61a9dc" data-bgcolor="#eee" data-total="'.$total.'" data-part="'.$letnum.'" data-border="inline"></div>
<br><a href="' . $url . '/wp-admin/admin.php?page=dezrez_settings"><div class="button button-primary">Dezrez Settings</div></a>';
}
echo $html;
} 

function dezrez_advert() {
	// Display whatever it is you want to show
	echo '<iframe src="http://test.dezrez.com/wpadvert_test/index.html" width="390" scrolling="no" height="375" style="overflow:hidden;"></iframe>';
} 

// ADD WIDGETS INDEX FUNCTION
function add_widgets() {
	wp_add_dashboard_widget('dezrez_widget', 'Your Property Stats', 'prop_stats');
	wp_add_dashboard_widget('dezrez_advert', 'Dezrez', 'dezrez_advert');
}

// HOOK TO ADMIN
add_action('wp_dashboard_setup', 'add_widgets' );

?>