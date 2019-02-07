<div class="panel-group">
 <label>LIST OF PRODUCTS</label>
  <?php foreach ($products as $a): ?>
  	<?php if(($a['quantity']-$a['quantity_selected_by_all_users'])>0): ?>
  <div class="panel panel-success">
    <div class="panel-heading">Stock Available</div>
    <div class="panel-body">		
		<div class="col-sm-8">
			<p class="b"><strong class="b">NAME: </strong><?php echo $a['name']?><br>
			
			<strong class="b">stock left: </strong><?php echo $a['quantity']-$a['quantity_selected_by_all_users']?><br>			
			<strong class="b">Price Per Quantity: </strong><?php echo $a['price']?><br>
			<strong class="b">Product Description: </strong><?php echo $a['product_desc']?></p>
			<strong>About a Farmer</strong><br>
			<strong>Farmer Name:</strong><?php echo $a['firstname']?> <?php echo $a['lastname']?><br>
			<strong>Address: </strong>
			<?php echo $a['localAddress']?><br>
			<?php echo $a['state']?><br>
			<?php echo $a['country']?><br>
			<?php echo $a['pincode']?><br>
			<?php echo $a['email']?><br>
			<?php echo $a['contact']?><br>
			<a href="<?php echo base_url(); ?>buyer/placeorder/<?php echo $a['product_id']?>" class="btn btn-default">Place Order</a>
		</div>
		<div class="col-sm-4">
			<img src="<?php echo site_url(); ?>assets/images/crops/<?php echo $a['crop_image']; ?>" style="width:100%">	
		</div>
    </div>
  </div>
<?php endif; ?>
<?php if(($a['quantity']-$a['quantity_selected_by_all_users'])<=0): ?>
	<div class="panel panel-danger">
    <div class="panel-heading">Stock Left</div>
    <div class="panel-body">		
		<div class="col-sm-8">
			<p class="b"><strong class="b">NAME: </strong><?php echo $a['name']?><br>
			
			<strong class="b">stock left: </strong><?php echo $a['quantity']-$a['quantity_selected_by_all_users']?><br>			
			<strong class="b">Price Per Quantity: </strong><?php echo $a['price']?><br>
			<strong class="b">Product Description: </strong><?php echo $a['product_desc']?></p>
			<a href="<?php echo base_url(); ?>buyer/placeorder/<?php echo $a['product_id']?>" class="btn btn-default" disabled>Place Order</a>
		</div>
		<div class="col-sm-4">
			<img src="<?php echo site_url(); ?>assets/images/crops/<?php echo $a['crop_image']; ?>" style="width:100%">	
		</div>
    </div>
  </div>
<?php endif; ?>
  <?php endforeach; ?>

  
</div>