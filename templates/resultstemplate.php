<div class="title-effect">   	
        <table class="dezresult" cellpadding="0" cellspacing="0" width="100%">
        	<tr>
            	<td align="left" valign="top" width="180">
                    <div id="mainPic">
                        <a title="view the full details" href="<?php echo site_url();?>/property-details?pid=<?php echo $property['id'];?>" class="propertyImage">
                                <img border="0" class="dezrez-thumb" src="http://lb.dezrez.com/Imaging/PictureResizer.ASP?PropertyID=<?php echo $property['id'];?>&amp;AgentID=<?php echo $property['eaid'];?>&amp;BranchID=<?php echo $property['bid'];?>&amp;width=160&amp;Category=Primary&amp;Position=1&amp;NoError=ON&amp;awaiting=on"/>
                        </a>
                        <h6><?php echo $property['bedrooms'];?> bedrooms</h6>
                        <h6><?php echo $property['bathrooms'];?> bathrooms</h6>
                        <h6><?php echo $property['receptions'];?> receptions</h6>

                    </div>
                </td>
                <td align="left" valign="right">
                	<table cellpadding="0" cellspacing="0" width="100%">
                    	<tr>
                        	<td>
                            	<a title="view the full details" href="<?php echo site_url();?>/property-details?pid=<?php echo $property['id'];?>" class="searchaddress"><h4><?php echo $proptypes[intval($property->attributes()->propertyType)]; ?> in <?php echo $property->sa1;?>,</h3> <h5><?php echo $property->town;?></h4></a>
                            </td>
                            <td align="right" class="searchaddress">
                            	<h3><?php echo $property['price'] . $priceperiod;?></h3>
                            </td>
                        </tr>
                    </table>
                    <div class="searchdescription">
                    	<?php echo $property->summaryDescription;?>
                    </div>	
                    <div style="margin:20px 0;" align="right">
                    	<a title="view the full details" href="<?php echo site_url();?>/property-details?pid=<?php echo $property['id'];?>&amp;sessionGUID=<?php echo $guid;?>" class="continue button small default">
                            Full details
                        </a>
                    </div>
                </td>
            </tr>
        </table>     
        <hr />
    </div>