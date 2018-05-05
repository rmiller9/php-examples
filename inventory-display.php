	<div class="new_items clearfix"> <h4>Featured Items</h4>
		<?php
			foreach($rows as $value){ 
					if($value['featured']){?>
				<div class="item col-xs-12">
					<div class="image col-xs-12 col-sm-6">
						<a href="detail.php?id=<?php echo $value['id']?>"><img src="images/inventory/<?php
						echo $value['featured_image'];
					?>" alt="<?php echo $value['title'] ?>"></a>
					</div>				
					<div class="description col-xs-12 col-sm-6">
						<h2><a href="detail.php?id=<?php echo $value['id']?>"><?php echo $value['title']?>&nbsp;»</a></h2>
					<?php echo htmlspecialchars_decode($value['excerpt'])?>				
					<h3><?php if($value['status']==1){ ?>
						For Sale: $<?php echo $value['price'];}
					else{ echo "SOLD";}?></h3>
						<div class="seemore">
							<a href="" class="blacklink">See All <?php echo $value['color'];?> Vintage <?php echo $value['line'];?><sup>&copy;</sup> Pottery<span class="forsale">&nbsp;»</span></a><br>
							<a href="" class="blacklink">See All Vintage <?php echo $value['line']?><sup>&copy;</sup> <?php  if($value['shape']!==""){echo $value['shape']. "s";}?><span class="forsale">&nbsp;»</span></a><br>							
						</div>
					</div>
				</div><!-- <?php echo $value['id']; ?> -->											

			</div><!-- new items -->
			<?php } //if end?>
		<?php } //foreach end ?>
				<div class="regular_items"> <h4>Vintage Fiesta Pottery for Sale | Priced Low to High</h4>
			<?php				
					foreach($rows as $value){ 
				if(!$value['featured']){?>
					<div class="item col-xs-12">
						<div class="image col-xs-12 col-sm-6">
							<a href="detail.php?id=<?php echo $value['id']?>"><img src="images/inventory/<?php
							echo $value['featured_image'];
						?>" alt="<?php echo $value['title'] ?>"></a>
						</div>				
						<div class="description col-xs-12 col-sm-6">
							<h2><a href="detail.php?id=<?php echo $value['id']?>"><?php echo $value['title']?>&nbsp;»</a></h2>
						<?php echo htmlspecialchars_decode($value['excerpt'])?>				
						<h3><?php if($value['status']==1){ ?>
						For Sale: $<?php echo $value['price'];}
				else{ echo "SOLD";}?></h3>
						<div class="seemore">
							<a href="" class="blacklink">See All <?php echo $value['color'];?> Vintage <?php echo $value['line'];?><sup>&copy;</sup> Pottery<span class="forsale">&nbsp;»</span></a><br>
							<a href="" class="blacklink">See All Vintage <?php echo $value['line']?><sup>&copy;</sup> <?php  if($value['shape']!==""){echo $value['shape']. "s";}?><span class="forsale">&nbsp;»</span></a><br>							
						</div>
					</div>
				</div><!-- <?php echo $value['id']; ?> -->								
		<?php } //if end ?>
	<?php } //foreach end ?>
			</div><!-- regular items -->
	</div><!-- featured items end -->