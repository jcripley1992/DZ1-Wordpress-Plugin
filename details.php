<?php
$details = queryfull();
$property = $details->propertyFullDetails->property;

$lease = $property['leaseType'];
$image = $property->media->picture;
$floorplan = $details->xpath('//media/picture[@category="floorplan"]');
$primary = $details->xpath('//media/picture[@category="primary"]');
$eer = $details->xpath('//media/picture[@id="EER"]');
$epccurrent = $property->homeinformationpack->info->hip['eer_c'];
$brochure = $details->xpath('//media/document[@source="document-location-url"]');
$floorplan = $floorplan[0];
$address = $property->address;
$sa1 = $address->sa1;
$sa2 = $address->sa2;
$town = $address->town;
$city = $address->city;
$county = $address->county;
$pc = $address->postcode;
$description = $property->text->description;
$floor = $property->text->areas->area;
$lat = $property['latitude'];
$long = $property['longitude'];
$apikey = get_option('dezrez_api');

if($property['rentalperiod'] == 3){
	$pricetype = " p/Week";
}
if($property['rentalperiod'] == 4){
	$pricetype = " p/Month";
}

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



switch ($lease){

case "1":
$lease = 'Not Applicable';
break;
case "3":
$lease = 'Freehold';
break;
case "5":
$lease = 'Freehold (to be confirmed)';
break;
case "2":
$lease = 'Leasehold';
break;
case "4":
$lease = 'Leasehold (to be confirmed)';
break;
case "6":
$lease = 'To be Advised';
break;
case "7":
$lease = 'Share of Leasehold';
break;
case "8":
$lease = 'Share of Freehold';
break;
case "9":
$lease = 'Flying Freehold';
break;
case "11":
$lease = 'Leasehold (Share of Freehold)';
break;
}

switch ($epccurrent){
case ($epccurrent < 21 || $epccurrent == ""):
$epc = "G";
break;	
case ($epccurrent > 20 && $epccurrent < 39):
$epc = "F";
break;	
case ($epccurrent > 38 && $epccurrent < 55 ):
$epc = "E";
break;	
case ($epccurrent > 54 && $epccurrent < 69):
$epc = "D";
break;	
case ($epccurrent > 68 && $epccurrent < 81):
$epc = "C";
break;	
case ($epccurrent > 80 && $epccurrent < 92):
$epc = "B";
break;
case ($epccurrent > 91):
$epc = "A";
break;	
}

	// STATUS
	switch($property['sold'])
	{
		case "0":
		if($property['UO_LA'] == "true")
		{
			if ($property['sale'] == "true")
			
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
		 if ($property['sale'] == "true")
			
			{
			$status = "For Sale";	
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
		$status = "Sold Subject To Contract";
		break;
	}

include 'templates/detailtemplate.php';
?>