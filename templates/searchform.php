<script>
function lettingsdrop()
{
document.getElementById("minpricebox").innerHTML = '<label class="select"><select name="minPrice" id="minPrice"><option value="0">Min price</option><option value="200">200 PCM</option><option value="300">300 PCM</option><option value="400">400 PCM</option><option value="500">500 PCM</option><option value="600">600 PCM</option><option value="700">700 PCM</option><option value="800">800 PCM</option><option value="900">900 PCM</option><option value="1000">1000 PCM</option><option value="1500">1500 PCM</option><option value="2000">2000 PCM</option></select></label>';
	
document.getElementById("maxpricebox").innerHTML = ' <label class="select"><select name="maxPrice" id="maxPrice"><option value="0">Max price</option><option value="200">200 PCM</option><option value="300">300 PCM</option><option value="400">400 PCM</option><option value="500">500 PCM</option><option value="600">600 PCM</option><option value="700">700 PCM</option><option value="800">800 PCM</option><option value="900">900 PCM</option><option value="1000">1000 PCM</option><option value="1500">1500 PCM</option><option value="2000">2000 PCM</option></select></label>'
}

function salesdrop()
{
	document.getElementById("minpricebox").innerHTML = '<select id="minPrice" name="minPrice"><option value="0">Min price</option><option value="50000">£50,000</option><option value="100000">£100,000</option><option value="150000">£150,000</option><option value="200000">£200,000</option><option value="250000">£250,000</option><option value="300000">£300,000</option><option value="350000">£350,000</option><option value="400000">£400,000</option><option value="500000">£500,000</option><option value="750000">£750,000</option><option value="1000000">£1,000,000</option><option value="99999999">+£1,000,000</option></select>'
		document.getElementById("maxpricebox").innerHTML = '<select id="maxPrice" name="maxPrice"><option value="0">Max price</option><option value="50000">£50,000</option><option value="100000">£100,000</option><option value="150000">£150,000</option><option value="200000">£200,000</option><option value="250000">£250,000</option><option value="300000">£300,000</option><option value="350000">£350,000</option><option value="400000">£400,000</option><option value="500000">£500,000</option><option value="750000">£750,000</option><option value="1000000">£1,000,000</option><option value="99999999">+£1,000,000</option></select>'	
}
</script>

<form class="form1-1 form1" id="form3" action="<?php echo get_site_url();?>/search-results" method="GET" name="searchForm">
<table>
<tbody>
<tr>
<td width="58"><label class="text"> <span>Sales: </span> </label></td>
<td width="30"><input id="rentalperiod" type="radio" name="rentalperiod" value="0" onclick="salesdrop()" /></td>
<td width="75">Lettings</td>
<td width="69"><input id="rentalperiod2" type="radio" name="rentalperiod" value="4" onclick="lettingsdrop()"/></td>
</tr>
<tr>
<td colspan="2"><label class="text"> <span>Area: </span> </label></td>
<td colspan="2"><input id="searchTown" type="text" /></td>
</tr>
<tr>
<td colspan="2"><label class="text"> <span>Min price:</span> </label></td>
<td colspan="2" id="minpricebox"><select id="minPrice" name="minPrice"><option value="0">Min price</option><option value="50000">£50,000</option><option value="100000">£100,000</option><option value="150000">£150,000</option><option value="200000">£200,000</option><option value="250000">£250,000</option><option value="300000">£300,000</option><option value="350000">£350,000</option><option value="400000">£400,000</option><option value="500000">£500,000</option><option value="750000">£750,000</option><option value="1000000">£1,000,000</option><option value="99999999">+£1,000,000</option></select></td>
</tr>
<tr>
<td colspan="2"><label class="text"> <span>Max price:</span> </label></td>
<td colspan="2" id="maxpricebox"><select id="maxPrice" name="maxPrice"><option value="0">Max price</option><option value="50000">£50,000</option><option value="100000">£100,000</option><option value="150000">£150,000</option><option value="200000">£200,000</option><option value="250000">£250,000</option><option value="300000">£300,000</option><option value="350000">£350,000</option><option value="400000">£400,000</option><option value="500000">£500,000</option><option value="750000">£750,000</option><option value="1000000">£1,000,000</option></select></td>
</tr>
<!--<tr>
<td colspan="2"><label class="text"> <span>City: </span> </label></td>
<td colspan="2"><label class="input">
<input id="searchCity" type="text" />
</label></td>
</tr>-->
<tr>
<td colspan="2"><label class="text"> <span>Any Address/Location: </span> </label></td>
<td colspan="2"><label class="input">
<input id="searchAllAddress" type="text" />
</label></td>
</tr>
<tr>
<td colspan="2"><label class="text"> <span>Property Type</span> </label></td>
<td colspan="2"><p>
  <select id="propertyType" name="propertyType">
    <option value="">Any</option>
    <option value="0">Flats</option>
    <option value="1">Houses</option>
    <option value="9">Semi Detatched</option>
    <option value="10">Detatched</option>
    <option value="11">Terraced</option>
    <option value="6">Bungalow</option>
    <option value="2">Business</option>
  </select>
</p>
  <p>
    <label for="rentalperiod"></label>
  </p></td>
</tr>
<tr>
<td colspan="2">
<div class="searchholder"><a class="searchButton" href="javascript:document.searchForm.submit();"><span>Search</span></a></div></td>
</tr>
</tbody>
</table>
</form>

<p>
Full List of Search Form Parameters Here: <a href="http://dezrez.com/webguide/xmlguide.asp">http://dezrez.com/webguide/xmlguide.asp</a>
</p>