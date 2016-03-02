<?php
//	LATEST PROPERTIES SHORTCODE SCRIPT

function latest_short($atts)
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
	
 $latest2_apikey = get_option('dezrez_api');
    $latest2_eaid = get_option('dezrez_eaid');
//	QUERY DEZREZ FEED

	$latest2_xmlR = "http://www.dezrez.com/DRAPP/DotNetSites/WebEngine/Property/latestproperties.aspx?apikey=" . $latest2_apikey . "&EAID=" . $latest2_eaid . "&XSLT=-1&number=" . $number . '&rentalperiod=' . $rp;
   
	$latest2_xml = new DOMDocument;
	$latest2_xml->load( $latest2_xmlR );

//	THE FILE PATH TO THE XSLT FILE REQUIRED TO DISPLAY THE THUMBS, YOU MAY ALTER THIS FILE IN ANY HTML EDITOR. HOWEVER OD NOT ALTER THE FILE NAME OR THE BELOW LINE OF CODE OR YOU WILL BREAK THE PLUGIN.
	$latest2_root = get_site_url();
	
	$relative = get_option('dezrez_relative');
	if($relative == 'no')
	{
	$latest2_url =  $latest2_root . '/wp-content/plugins/dezrez/widgets/latestproperties.xslt';
	}
	
	if($relative == 'yes')
	{	
	$latest2_url =  './widgets/latestproperties.xslt';
	}
	
	
		$latest2_xsl = new DOMDocument;
	$latest2_xsl->load($latest2_url);
	
	$latest2_proc = new XSLTProcessor;
	$latest2_proc->importStyleSheet($latest2_xsl);
	
	$latest2_results = $latest2_proc->transformToXML($latest2_xml);
	
	$siteurl2 = site_url();
	$latest2_results = str_replace('%siteurl%', $siteurl2 ,$latest2_results);

	return $latest2_results;

}

add_shortcode('latestprop','latest_short');

?>