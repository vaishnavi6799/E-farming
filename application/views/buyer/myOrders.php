<div class="panel-group">
 <label>MY ORDERS</label>
  <?php foreach ($orders as $a): ?>
  <div class="panel panel-default">
    <div class="panel-heading">
    	<strong>Order placed on</strong><br>
    	<small><?php echo $a['date']?></small>
    </div>
    <div class="panel-body">		
		<div class="col-sm-8">
			<p class="b"><strong class="b">NAME: </strong><?php echo $a['name']?><br>
			<strong class="b">Selected Quantity: </strong><?php echo $a['quantity_selected']?>	<br>
			<strong class="b">Total Price: </strong><?php echo $a['quantity_selected']*$a['price']?><br>
		</div>
		<div class="col-sm-4">
			<img src="<?php echo site_url(); ?>assets/images/crops/<?php echo $a['crop_image']; ?>" style="width:75%">	
		</div>
    </div>
  </div>
  <?php endforeach; ?>
</div>