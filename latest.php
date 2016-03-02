<?php

//	latest PROPERTIES SHORTCODE SCRIPT

//	GET ATTRIBUTES FROM TAG
	$number = $atts['number'];
	$lettings = $atts['lettings'];
	if($number == NULL)
	{
		$number = '6';	
	}
	if($lettings == 'yes')
	{
		$rp = '4';	
	}
	else
	{
		$rp = '0';
	}

 $apikey = get_option('dezrez_api');
    $eaid = get_option('dezrez_eaid');
//	QUERY DEZREZ FEED

	$latest2_xmlR = "http://www.dezrez.com/DRAPP/DotNetSites/WebEngine/Property/latestproperties.aspx?apikey=" . $apikey . "&EAID=" . $eaid . "&XSLT=-1&number=" . $number . '&rentalperiod=' . $rp;
	
if (ini_get('allow_url_fopen')) { $latestprop = simplexml_load_file($latest2_xmlR);
} else {
	$ch = curl_init($latest2_xmlR);    
    curl_setopt($ch, CURLOPT_HEADER, false);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    $xml_raw = curl_exec($ch);    
    $latestprop = simplexml_load_string($xml_raw);
}
//	echo $latest2_xmlR;
	if($rp == '0'){$latesttype="getLatestSalesProperties";}else{$latesttype="getLatestLettingsProperties";}
	$latest = $latestprop->$latesttype->properties;	
	foreach ($latest->property as $property){
	// DECLARE VARIABLES FOR PROPERTY ATTRIBUTES / FIELDS	
	$pid = $property['id'];
	$bid = $property['bid'];
	if($rp == "0"){
	$price = $property['price'];}
	else
	{
	$multiplier = 30.41667;
	$perday = $property['priceVal'];
	$price = '£'.bcmul($perday,$multiplier,0).' PCM';	
	}
	$bedrooms = $property['bedrooms'];	$bathrooms = $property['bathrooms'];  $receptions = $property['receptions']; $gardens = $property['gardens'];
	$sa1 = $property->sa1; $sa2 = $property->sa2; $town->$property->town; $city=$property->city; $postcode=$property->postcode; $address=$property->useAddress;
	$description = $property->summaryDescription;
	$img = 'http://www.dezrez.com/DRApp/DotNetSites/WebEngine/property/pictureResizer.aspx?eaid='.$eaid.'&apikey='.$apikey.'&pid='.$pid.'&bid='.$bid.'&picture=1&width=252';
	include 'templates/latest.php';		
	}
?>