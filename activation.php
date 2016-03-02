<?php
//	ACTIVATION MODULE

//	WRITE SCRIPT INCLUDE OPTION<br />
$url = site_url();
$options = get_option('ssjr3_settings');
$options['header_scripts_input'] = '<link href="' . $url . '/wp-content/plugins/dezrez/lightbox/css/lightbox.css" rel="stylesheet" /><script src="' . $url . '/wp-content/plugins/dezrez/lightbox/js/lightbox-2.6.min.js"></script>';

update_option('ssjr3_settings', $options);

//PAGE ARRAYS

$searchform = array();
$searchform['post_title'] = 'Property Search';
$searchform['post_name'] = 'property-search';
$searchform['post_content'] = '[searchform]';
$searchform['post_status'] = 'publish';
$searchform['post_author'] = 1;
$searchform['post_type'] = 'page';

$vendorlogin = array();
$vendorlogin['post_title'] = 'Vendor Login Area';
$vendorlogin['post_name'] = 'vendor-login';
$vendorlogin['post_content'] = '[vendorlogin]';
$vendorlogin['post_status'] = 'publish';
$vendorlogin['post_author'] = 1;
$vendorlogin['post_type'] = 'page';

$resultspage = array();
$resultspage['post_title'] = 'Search Results';
$resultspage['post_name'] = 'search-results';
$resultspage['post_content'] = '[searchresults]';
$resultspage['post_status'] = 'publish';
$resultspage['post_author'] = 1;
$resultspage['post_type'] = 'page';

$propdetails = array();
$propdetails['post_title'] = 'Property Details';
$propdetails['post_name'] = 'property-details';
$propdetails['post_content'] = '[propertydetails]';
$propdetails['post_status'] = 'publish';
$propdetails['post_author'] = 1;
$propdetails['post_type'] = 'page';


//	TRIGGERS TO CREATE THE ABOVE PAGES



$title = 'Property Search';
//you can use post_types too
$ptype='';

global $wpdb;
global $post;
$args = array( 'post_type' => $ptype);
$allPosts = get_posts($args);
$smthh='no';
foreach( $allPosts as $page )
{
    if( $smthh == 'no' && ($page->post_name == $title ||  $page->post_title == $title) )
    {$smthh='yes'; break; }
}


if ( $smthh == 'yes' )
{ 
   
}

else
{

    // You can insert the post too
    wp_insert_post( $searchform );
}

///////////////////////////////////////


$title2 = 'Vendor Login Area';
//you can use post_types too
$ptype='';

global $wpdb;
global $post;
$args = array( 'post_type' => $ptype);
$allPosts = get_posts($args);
$smthh='no';
foreach( $allPosts as $page )
{
    if( $smthh == 'no' && ($page->post_name == $title2 ||  $page->post_title == $title2) )
    {$smthh='yes'; break; }
}


if ( $smthh == 'yes' )
{ 
   
}

else
{
    

    // You can insert the post too
    wp_insert_post( $vendorlogin );
}


/////////////////////////////////////////////////////////////



$title3 = 'Search Results';
//you can use post_types too
$ptype='';

global $wpdb;
global $post;
$args = array( 'post_type' => $ptype);
$allPosts = get_posts($args);
$smthh='no';
foreach( $allPosts as $page )
{
    if( $smthh == 'no' && ($page->post_name == $title3 ||  $page->post_title == $title3) )
    {$smthh='yes'; break; }
}


if ( $smthh == 'yes' )
{ 
   
}

else
{
    // You can insert the post too
    wp_insert_post( $resultspage );
}


///////////////////////////////////////////////////////////////




$title4 = 'Property Details';
//you can use post_types too
$ptype='';

global $wpdb;
global $post;
$args = array( 'post_type' => $ptype);
$allPosts = get_posts($args);
$smthh='no';
foreach( $allPosts as $page )
{
    if( $smthh == 'no' && ($page->post_name == $title4 ||  $page->post_title == $title4) )
    {$smthh='yes'; break; }
}


if ( $smthh == 'yes' )
{ 
   
}

else
{
    // You can insert the post too
    wp_insert_post( $propdetails );
}
?>