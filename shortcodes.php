<?php

//SHORTCODE FILE

//	SHORTCODES ARE DEFINED HERE
//	E.G. OF USE
//	[SALESEARCH] SHORTCODE WILL DISPLAY THE FORM FOR SALES SEARCH
//	YOU CAN EDIT THESE HERE BUT IT IS NOT RECOMMENDED
function register_shortcodes(){
add_shortcode('searchform', 'searchform');
add_shortcode('searchresults', 'results');
add_shortcode('propertydetails', 'fulldetails');
add_shortcode('vendorlogin', 'vendorlogin');
add_shortcode('featuredprop', 'featured');
add_shortcode('latestprop', 'latest');}
?>
