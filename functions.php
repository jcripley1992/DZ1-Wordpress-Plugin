<?php
//////////////////////////////////////////
//REGISTER JS DROPDOWN BOX SCRIPT
//////////////////////////////////////////

//	CUSTOM SHORTCODE FOR SITEURL - EVERY TIME YOU WANT
//	TO DISPLAY THE SITE URL IN A POST TYPE %SITEURL%

function replace_content($dzsite)
{
$siteurl2 = site_url();
$dzsite = str_replace('%siteurl%', $siteurl2 ,$dzsite);
return $dzsite;
}


function pagifix( $query ) {
    if( 'search-results' == $query->query_vars['pagename'] )
        remove_filter( 'template_redirect', 'redirect_canonical' );
}

//	QUERY SEARCH FEED USING CURL / FOPEN
function querysearch()
{
$apikey = get_option('dezrez_api');
$eaid = get_option('dezrez_eaid');
$xmlR = "http://www.dezrez.com/DRApp/DotNetSites/WebEngine/property/Default.aspx?apikey=" . $apikey . "&EAID=" . $eaid . "&XSLT=-1&";
	if ($_POST) 
	{
		foreach($_POST as $item => $value)
		{
			$xmlR = $xmlR . $item . "=" . urlencode($value) . "&";
		}
	}
	else
	{
		foreach($_GET as $item => $value)
		{
			if($item != $_GET['page'])$qstring = str_replace	("view=list","",$qstring);
			{
			$xmlR = $xmlR . $item . "=" . urlencode($value) . "&";
			}
		}
	}
// CURL FIX
if (ini_get('allow_url_fopen')) { $dezrezdata = simplexml_load_file($xmlR); 
} else {
	$ch = curl_init($xmlR);    
    curl_setopt($ch, CURLOPT_HEADER, false);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    $xml_raw = curl_exec($ch);    
    $dezrezdata = simplexml_load_string($xml_raw);
}
	return $dezrezdata;	
}

function queryfull()
{
$apikey = get_option('dezrez_api');
$eaid = get_option('dezrez_eaid');
$xmlR = "http://www.dezrez.com/DRApp/DotNetSites/WebEngine/property/Property.aspx?apikey=" . $apikey . "&EAID=" . $eaid . "&XSLT=-1&"; 	
	foreach($_GET as $item => $value)
	{
		$xmlR = $xmlR . $item . "=" . urlencode($value) . "&";
	} 
if (ini_get('allow_url_fopen')) { $dezrezdata = simplexml_load_file($xmlR); 
} else {
	$ch = curl_init($xmlR);    
    curl_setopt($ch, CURLOPT_HEADER, false);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    $xml_raw = curl_exec($ch);    
    $dezrezdata = simplexml_load_string($xml_raw);
}
	return $dezrezdata;
}

//////////////////////////////////////////
//SHORTCODE PROCESSING
//////////////////////////////////////////
function fulldetails(){
include 'details.php';
}
function results(){
include 'results.php';
}
function searchform(){
include 'templates/searchform.php';
}

function vendorlogin($atts){
$apikey = get_option('dezrez_api');
$eaid = get_option('dezrez_eaid');
include 'templates/vendorlogin.php';
}

function featured($atts){
include 'featured.php';	
}

function latest($atts){
include 'latest.php';	
}
//////////////////////////////////////////
//ACTTIVATION 
//////////////////////////////////////////
function deactivate()
{
include 'deactivation.php';	
}
function activate()
{
include 'activation.php';	
}

function dezrez_display_settings() {
	if ($_GET['settings-updated'] == "true")
	{
	echo '<div class="updated">
        <p>Settings Updated!</p>
    </div>';
	}
    $apikey = get_option('dezrez_api');
    $agentid = get_option('dezrez_eaid');
		
    $html = '</pre>
<div class="wrap"><form action="options.php" method="post" name="options">
' . wp_nonce_field('update-options') . '
<table width="449" cellpadding="10">
<tbody>
<tr>
<td colspan="2" align="left" scope="row">
<p><img src="../wp-content/plugins/dezrez/images/logo.png" /></p>
  <h2>Welcome to the Dezrez Wordpress Plugin</h2>
  <p>Enter the below values is as provided by the dezrez branding team. These are <strong>required</strong> in order to work.</p>
  <p>To obtain these details or for support with this plugin call 0845 465 22 22 and select option 2.</p>
  <p><a href="http://test.dezrez.com/wordpress/documentation" target="_blank"><img src="../wp-content/plugins/dezrez/images/doc.png"/></a><a href="http://dezrez.com/webguide" target="_blank"><img src="../wp-content/plugins/dezrez/images/guide.png"/></a></p>
 </td></tr>
<td width="101" align="left" >
 <label>Agent ID</label></td>
<td width="348" align="left" ><input name="dezrez_eaid" type="text" value="' . $agentid . '" size="20" maxlength="20" /></td>
</tr>
<tr>
<td width="101" align="left">
 <label>API KEY</label></td>
<td width="348" align="left"><input name="dezrez_api" type="text" value="' . $apikey . '" size="60" maxlength="60" /></td>
</tr>
</tbody>
</table>
<br>
 <input type="hidden" name="action" value="update" />

 <input type="hidden" name="page_options" value="dezrez_eaid,dezrez_api" />

 <input type="submit" name="Submit" value="Update Dezrez Settings" /></form></div>
<pre>
';

    echo $html;
}

function create_dezrez_admin(){
    add_menu_page( 'Dezrez Options', 'Dezrez', 'administrator', 'dezrez_settings', 'dezrez_display_settings');
}

?>