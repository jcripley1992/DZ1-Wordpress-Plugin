  <div class="box" id="left">
        <div class="featuredproperty">
          <div class="propertyimage">
            <a href="<?php echo site_url(). '/property-details?pid=' . $pid;?>">
              <img src="<?php echo $img;?>"/>
            </a>
          </div>
          <br />
                   <div class="DezrezPrice"><?php echo $price;?></div>
          <div class="address"><?php echo $address;?></div>
          <br />
          <div class="description">
          <?php echo $description;?>
          </div>
          <br />
          <div class="moredetails">
            <a href="<?php echo site_url(). '/property-details?pid=' . $pid;?>">
              Read more
            </a>
          </div>
        </div>
      </div>