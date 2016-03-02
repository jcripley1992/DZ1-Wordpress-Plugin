<?php

//	REFER TO DETAILS.php (the top) for a list of php variables you can echo, most are used below.

// E.G. FOR Lattitude and Longittude use $lat and $long

?>
  <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="left" class="searchaddress">
                   <h4><?php echo $proptypes[intval($property->attributes()->propertyType)]; ?> in <?php echo $sa1;?></h4><h5><?php echo $town;?></h5>
                </td>
                <td align="right" class="searchaddress">
                    <div class="DezrezPrice"><h3><?php echo $property['price'] . $pricetype;?></h3></div>
                    <h4><?php echo $status;?></h4>
                </td>
            </tr>
        </table>
        
        <hr />
        
        <div id="mainPic" class="imgLarge">
        <img style="width:50%; float:left" src="<?php echo $primary[0];?>&width=950"/>
        </div>
        <div id="des1" style="width:49%; float:right; padding-left:2px;"><h4>Summary Description</h4><?php echo $description[0];?>
        </div>
        <div id="spec" style="width:49%; float:right;"><a href="<?php echo $eer[0];?>" target="_new"><img src="<?php echo $eer[0];?>" style="width:120px; float:right;" /></a><h6><?php echo $property['bedrooms'];?> bedrooms</h6>
                        <h6><?php echo $property['bathrooms'];?> bathrooms</h6>
                        <h6><?php echo $property['receptions'];?> receptions</h6><h3 style="display:inline;">EPC RATING: </h3> <h4 style="display:inline;"><?php echo $epc;?></h4><br />
<h3 style="display:inline;">Tenure: </h3> <h4 style="display:inline;"><?php echo $lease;?></h4>
</div>
        <div id="thumbs" style="width:50%;">
        <!--<ul>-->
	<?php
	
	//THUMBNAIL CODE, MODIFY THE RED HTML ONLY, if you want to make an unordered list for jquery slider just uncomment the commented code.
						$i = "0";
						$count = 1;	
						foreach ($image as $img) 
						{
							if($img->attributes()->category == 'primary' || $img->attributes()->category == 'secondary')
							{
								$i = $i . $count;
								$imgs .= 
								'
								<!--<li>-->	
									<a target="_new" href="'.$img.'&width=800&rotation=0"><img style="width:19%;" style="" id="image-' . $i . '" src="' . $img.'&width=200&rotation=0' . '" /></a>
								<!--</li>-->	
								';
								$count++;
								$i = "0";
							}
						}
					?>
                  	<?php echo $imgs; ?> 
                    <!--</ul>-->
        </div>
        <hr />
        <br />
        
        
        <div class="clear"/><div id="buttons" style="float:right;">
        <a href="http://www.dezrez.com/DRApp/DotNetSites/WebEngine/property/PropertyRequest.aspx?apikey=<?php echo $apikey;?>&eaid=<?php echo $property['eaid'];?>&bid=<?php echo $property['bid'];?>&pid=<?php echo $property['id'];?>&requesttype=242" target="_new"><div style="display:inline;" class="continue button default">Arrange A viewing</div></a> <a href="http://www.dezrez.com/DRApp/DotNetSites/WebEngine/property/PropertyRequest.aspx?apikey=<?php echo $apikey;?>&eaid=<?php echo $property['eaid'];?>&bid=<?php echo $property['bid'];?>&pid=<?php echo $property['id'];?>&requesttype=220" target="_new"><div style="display:inline;" class="continue button small default">Request a callback</div></a> <a href="http://www.dezrez.com/DRApp/DotNetSites/WebEngine/property/PropertyRequest.aspx?apikey=<?php echo $apikey;?>&eaid=<?php echo $property['eaid'];?>&bid=<?php echo $property['bid'];?>&pid=<?php echo $property['id'];?>&requesttype=32" target="_new"><div style="display:inline;" class="continue button small default">Request a Brochure</div></a>
        </div>
        <h1>Room Details</h1>
        
        <hr />
        
        <div>
            <div class="roomParticulars" style="float:none !important;">
<?php foreach ($floor as $floors){?>

<div class="floortitle"><h4><?php echo $floors->attributes()->title;?></h4></div>

<?php foreach($floors->feature as $feature) {
   echo "<h6>" . $feature->heading . "</h6>" . "<p>" . $feature->description . "</p>";
   }

 }?>
            </div>
        </div>
        
        <hr />
        
        <div class="footer">
            <div class="dezrez">
                <a target="_blank" href="http://www.dezrez.com">
                    <img border="0" src="http://www.dezrez.com/webguide/images/logos/dezrez_driven_by.gif" alt="dezrez estate agency software" title="dezrez estate agency software"/>
                </a>
            </div>
        </div>
        
    </div>