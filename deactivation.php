<?php
//	DEACTIVATION SCRIPT - DO NOT CHANGE
//	WILL DELETE THE DEZREZ PAGES ON DEACTIVATION / UNINSTALL OF THE PLUGIN
	$force_delete = true;
	$resultspostid = get_page_by_path('search-results' , ARRAY_A , 'page');
	$lettingspostid = get_page_by_path('vendor-login' , ARRAY_A , 'page');
	$salespostid = get_page_by_path('property-search' , ARRAY_A , 'page');
	$detailspostid = get_page_by_path('property-details' , ARRAY_A , 'page');

 wp_delete_post( $resultspostid['ID'], $force_delete );
 wp_delete_post( $lettingspostid['ID'], $force_delete );
 wp_delete_post( $salespostid['ID'], $force_delete );
 wp_delete_post( $detailspostid['ID'], $force_delete );
?>