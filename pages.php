<?php
//	START PAGINATION


if($pageCount > $continuePage)
	{
	?> 

<div class="col-xs-12">

<ul class="pagination pagination_nojax">

			<?php
				if(intval($pageCurrent) > 10)
				{
			?>
			<li>
				<a href="?<?php echo $entireurl;?>&page=<?php echo($pageCurrent-10);?>">
						&laquo; <?php echo($pageCurrent-10);?>
				</a>
            </li>	

			<?php
				}
			?>



			<?php
				if($pageCurrent > 1)
				{
			?>


			<li>
				<a href="?<?php echo $entireurl;?>&page=<?php echo($pageCurrent-1);?>">
					   &lsaquo; prev
				</a>
			</li>

			<?php
				}
			?>


			<?php
			
				$activeClass = 'ui-btn-active ui-state-persist';

				foreach ($results->$searchtype->properties as $properties) 
				{

					if(intval($pageCurrent) + 3 < $pageCount )
					{
						for ($i = intval($pageCurrent); $i <= intval($pageCurrent) + $continuePage; $i++)
						{
							?>

							<li class="<?php if($i == intval($pageCurrent)){echo "active";} ?>">
								<a  href="?<?php echo $entireurl;?>&page=<?php echo($i);?>">
										<?php echo($i);?>
								</a>
							</li>

							<?php 
						}	
					}



					else
					{

						for ($i = intval($pageCurrent); $i <= intval($pageCurrent) + $pageCount - intval($pageCurrent); $i++)
						{

							?>


							<li class="<?php if($i == intval($pageCurrent)){echo "active";} ?>">
								<a href="?<?php echo $entireurl;?>&page=<?php echo($i);?>">
										<?php echo($i);?>
								</a>
							</li>


							<?php
						}

					}

				}
			?>



			<?php
				if(intval($pageCurrent) < intval($pageCount))
				{
			?>


			<li>
				<a href="?<?php echo $entireurl;?>&page=<?php echo($pageCurrent+1);?>">
						next &rsaquo; 
				</a>
			</li>

			<?php
				}

			?>


			<?php

				if(intval($pageCurrent) < intval($pageCount) - 10)


				{

			?>


			<li>
				<a href="?<?php echo $entireurl;?>&page=<?php echo($pageCurrent+10);?>">

						<?php echo($pageCurrent+10);?> &raquo; 

				</a>	
			</li>


			<?php



				}



			?>



		</ul></div>



		<?php



		}



		else // PAGES ARE LESS THAN $continuePage



		{



		?>



		

<div class="col-xs-12">

		<ul class="pagination pagination_nojax" > <!-- LESS THAN $continuePage -->



			<?php



				if($pageCurrent > 1)



				{



			?>


			<li>
				<a href="?<?php echo $entireurl;?>&page=<?php echo($pageCurrent-1);?>">
						&laquo;
				</a>
            </li>

			<?php

				}

			?>

			<?php

				$activeClass = 'ui-btn-active ui-state-persist';

echo $results->$searchtype->properties;

				foreach ($results->$searchtype->properties as $properties) 

				{ 

					for ($i = 1; $i <= $pageCount; $i++)

					{

			?>
			<li class="<?php if($i == intval($pageCurrent)){echo "active";} ?>">
				<a  href="?<?php echo $entireurl;?>&page=<?php echo($i);?>">

						<?php echo($i);?>

				</a>
			</li>
			 <?php           

					}					 

				}

			?>

			<?php

				if(intval($pageCurrent) < intval($pageCount))

				{

			?>
			<li>
				<a  href="?<?php echo $entireurl;?>&page=<?php echo($pageCurrent+1);?>">
						next &rsaquo;				
				</a> 
			</li>
			<?php

				}

			?>

		</ul> 

        </div>

	<?php

	}
	?>