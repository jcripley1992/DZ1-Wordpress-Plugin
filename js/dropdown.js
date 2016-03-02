window.onload = function(){
	

if (document.getElementById("test2")){
document.getElementById("test2").onclick=function()
{
	document.getElementById("minpricebox").innerHTML = " <label class='select'><select name='minPrice' id='minPrice'><option value='0'>Min price</option><option value='200'>200 PCM</option><option value='300'>300 PCM</option><option value='400'>400 PCM</option><option value='500'>500 PCM</option><option value='600'>600 PCM</option><option value='700'>700 PCM</option><option value='800'>800 PCM</option><option value='900'>900 PCM</option><option value='1000'>1000 PCM</option><option value='1500'>1500 PCM</option><option value='2000'>2000 PCM</option></select></label>"
	
document.getElementById("maxpricebox").innerHTML = " <label class='select'><select name='maxPrice' id='maxPrice'><option value='0'>Max price</option><option value='200'>200 PCM</option><option value='300'>300 PCM</option><option value='400'>400 PCM</option><option value='500'>500 PCM</option><option value='600'>600 PCM</option><option value='700'>700 PCM</option><option value='800'>800 PCM</option><option value='900'>900 PCM</option><option value='1000'>1000 PCM</option><option value='1500'>1500 PCM</option><option value='2000'>2000 PCM</option></select></label>"
};

document.getElementById("test1").onclick=function()
{
	document.getElementById("minpricebox").innerHTML = "<select id='minPrice' name='minPrice'><option value='0'>Min price</option><option value='50000'>£50,000</option><option value='100000'>£100,000</option><option value='150000'>£150,000</option><option value='200000'>£200,000</option><option value='250000'>£250,000</option><option value='300000'>£300,000</option><option value='350000'>£350,000</option><option value='400000'>£400,000</option><option value='500000'>£500,000</option><option value='750000'>£750,000</option><option value='1000000'>£1,000,000</option><option value='99999999'>+£1,000,000</option></select>"
		document.getElementById("maxpricebox").innerHTML = "<select id='maxPrice' name='maxPrice'><option value='0'>Max price</option><option value='50000'>£50,000</option><option value='100000'>£100,000</option><option value='150000'>£150,000</option><option value='200000'>£200,000</option><option value='250000'>£250,000</option><option value='300000'>£300,000</option><option value='350000'>£350,000</option><option value='400000'>£400,000</option><option value='500000'>£500,000</option><option value='750000'>£750,000</option><option value='1000000'>£1,000,000</option><option value='99999999'>+£1,000,000</option></select>"	
};// JavaScript Document
}
}

function go() 
{
window.location=document.getElementById("perpagefilter").value;
}