<?php

$results = querysearch();

if(!$_POST){
	if(!$_GET){$rentalperiod="0";}
	else{$rentalperiod = $_GET['rentalperiod'];}
}
else{$rentalperiod = $_POST['rentalperiod'];}

if($rentalperiod == "4"){
	$searchtype = "propertySearchLettings"; $salelet = "To Let"; $priceperiod=" Per Month";
}
else{
	$searchtype = "propertySearchSales"; $salelet = "For Sale";
}

$pageCurrent = $results->$searchtype->properties->pages->attributes()->page;
    $pageCount = $results->$searchtype->properties->pages->attributes()->pageCount;     
    $perPage =  $results->$searchtype->properties->pages->attributes()->perPage;
	$rentalPeriod = $results->$searchtype->properties->attributes()->rentalperiod;
	$continuePage = 3;
	$count = 'count';
	$propcount = intval($results->$searchtype->properties->pages->attributes()->$count);
	$dezrezproperty = $results->$searchtype->properties->property;
	$qstring = $_SERVER['QUERY_STRING'];
	$entireurl = $qstring;
	
	//prop types array
	$proptypes = array(
		"10" => "Apartment",
		"58" => "Low Density Apartment",
		"59" => "Studio Apartment",
		"57" => "Building Plot",
		"60" => "Business",
		"56" => "Cluster",
		"70" => "Commercial",
		"61" => "Corner Townhouse",
		"40" => "Detached Barn Conversion",
		"15" => "Detached Bungalow",
		"39" => "Detached Chalet",
		"23" => "Detached Cottage",
		"30" => "Detached Country House",
		"5" => "Detached House",
		"29" => "Detached Town House",
		"52" => "Duplex Apartment",
		"33" => "East Wing Country House",
		"17" => "End Link Bungalow",
		"7" => "End Link House",
		"12" => "End Terrace Bungalow",
		"36" => "End Terrace Chalet",
		"20" => "End Terrace Cottage",
		"2" => "End Terrace House",
		"26" => "End Terrace Town House",
		"47" => "First Floor Converted Flay",
		"44" => "First Floor Purpose Built Flat",
		"50" => "First & Second Floor Mainsonette",
		"9" => "Flat",
		"49" => "Ground & First Floor Maisonette",
		"46" => "Ground Floor Converted Flat",
		"43" => "Ground Floor Purpose Built Flat",
		"66" => "Link Detached",
		"53" => "Mansion",
		"68" => "Maisonette",
		"42" => "Mews Style Barn Conversion",
		"18" => "Mid Link Bungalow",
		"8" => "Mid Link House",
		"13" => "Mid Terrace Bungalow",
		"37" => "Mid Terrace Chalet",
		"21" => "Mid Terrace Cottage",
		"3" => "Mid Terrace House",
		"27" => "Mid Terrace Town House",
		"31" => "North Wing Country House",
		"51" => "Penthouse Apartment",
		"54" => "Q-Type",
		"41" => "Remote Detached Barn Conversion",
		"16" => "Remote Detached Bungalow",
		"24" => "Remote Detached Cottage",
		"6" => "Remote Detached House",
		"48" => "Second Floor Converted Flat",
		"45" => "Second Floor Purpose Built Flat",
		"14" => "Semi Detached Bungalow",
		"38" => "Semi Detached Chalet",
		"22" => "Semi Detached Cottage",
		"4" => "Semi Detached House",
		"28" => "Semi Detached Town House",
		"69" => "Shell",
		"32" => "South Wing Country House",
		"67" => "Studio",
		"11" => "Terraced Bungalow",
		"35" => "Terraced Chalet",
		"19" => "Terraced Cottage",
		"1" => "Terraced House",
		"25" => "Terraced Town House",
		"55" => "T-Type",
		"65" => "Village House",
		"62" => "Detached Villa",
		"63" => "link-Detached Villa",
		"64" => "Semi-Detached Villa",
		"34" => "West Wing Country House",
		"71" => "Retirement Flat",
		"72" => "Bedsit",
		"73" => "Park Home/Mobile Villa",
	);	

	
include('pages.php');
	
foreach ($dezrezproperty as $property){
$apikey = get_option('dezrez_api');
$eaid = get_option('dezrez_eaid');
$floorplan = "http://www.dezrez.com/DRApp/DotNetSites/WebEngine/property/pictureResizer.aspx?eaid=".
$eaid."&apikey=".$apikey."&pid=".$property['id']."&bid=".$property['bid']."&picture=10";


switch($property['sold'])
	{
		case "0":
		if($property['UO_LA'] == "true")
		{
			if ($rentalperiod == "0" || $rentalperiod == "")
			{
			$salerent = "For Sale";
			$status = "Under Offer";	
			}
			else
			{
			$salerent = "To Let";
			$status = "Let Agreed";
			}
		}
		else
		{
		 if ($rentalperiod == "0" || $rentalperiod == "")
			{
			$status = "For Sale" ;	
			}
			else
			{
			$status = "To Let";
			}
		}
		break;
		case "1":
		$status = "Reduced";
		break;
		case "2":
		$status = "Sold STC";
		break;
	}
//PROPERTY RESULT HTML HERE
include 'templates/resultstemplate.php';
}
//	END PROPERTY HTML CODE

include('pages.php');

?>