<?php

//	FEATURED PROPERTIES SHORTCODE SCRIPT

function featured_short($atts)
{
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

 $featured2_apikey = get_option('dezrez_api');
    $featured2_eaid = get_option('dezrez_eaid');
//	QUERY DEZREZ FEED

	$featured2_xmlR = "http://www.dezrez.com/DRAPP/DotNetSites/WebEngine/Property/featuredproperties.aspx?apikey=" . $featured2_apikey . "&EAID=" . $featured2_eaid . "&XSLT=-1&number=" . $number . '&rentalperiod=' . $rp;
   
	$featured2_xml = new DOMDocument;
	$featured2_xml->load( $featured2_xmlR );

//	THE FILE PATH TO THE XSLT FILE REQUIRED TO DISPLAY THE THUMBS, YOU MAY ALTER THIS FILE IN ANY HTML EDITOR. HOWEVER OD NOT ALTER THE FILE NAME OR THE BELOW LINE OF CODE OR YOU WILL BREAK THE PLUGIN.
	$featured2_root = get_site_url();
	
	$relative = get_option('dezrez_relative');
	if($relative == 'no')
	{
	$featured2_url =  $featured2_root . '/wp-content/plugins/dezrez/widgets/featuredproperties.xslt';
	}
	
	if($relative == 'yes')
	{	
	$featured2_url =  './widgets/featuredproperties.xslt';
	}
	
	
		$featured2_xsl = new DOMDocument;
	$featured2_xsl->load($featured2_url);
	
	$featured2_proc = new XSLTProcessor;
	$featured2_proc->importStyleSheet($featured2_xsl);
	
	$featured2_results = $featured2_proc->transformToXML($featured2_xml);
	$siteurl2 = site_url();
	$featured2_results = str_replace('%siteurl%', $siteurl2 ,$featured2_results);

	return $featured2_results;


}

add_shortcode('featuredprop','featured_short');

?>