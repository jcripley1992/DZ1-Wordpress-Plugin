<?php		
function slider($atts)
{
//	GET ATTRIBUTES FROM TAG
	if ($atts['number']){
	$number = $atts['number'];
	}
	if ($atts['lettings']){
	$lettings = $atts['lettings'];
	}	
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
	
 $slider_apikey = get_option('dezrez_api');
    $slider_eaid = get_option('dezrez_eaid');
//	QUERY DEZREZ FEED

$slider_xmlR = 'http://www.dezrez.com/DRAPP/DotNetSites/WebEngine/Property/latestproperties.aspx?apikey=' . $slider_apikey . '&EAID=' . $slider_eaid . '&XSLT=-1&number=' . $number . '&rentalperiod=' . $rp;
$slideresults=simplexml_load_file($slider_xmlR);
if ($rp == '4'){
$slideresults2 = $slideresults->getLatestLettingsProperties->properties;
}
if ($rp == '0')
{
$slideresults2 = $slideresults->getLatestSalesProperties->properties;
}
echo '<div class="banner">
    <ul>';

foreach($slideresults2->children() as $property)
   {
   echo '<li>'.$property->sa1.'<img src="http//lb.dezrez.com/Imaging/PictureResizer.ASP?PropertyID='.$property->attributes()->id.'&amp;AgentID='.$property->attributes()->eaid.'&amp;BranchID='.$property->attributes()->bid.'&amp;width=220&amp;Category=Primary&amp;Position=1&amp;NoError=ON&amp;awaiting=on"/></li>';
   }
   
echo '</ul>
</div>';
}
	add_shortcode('slider','slider');

	?>