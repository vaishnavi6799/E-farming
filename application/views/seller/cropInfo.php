<?php echo validation_errors(); ?>


<div class="well">
	<?php echo form_open('seller/index/'.$id); ?>	
	<form class="form-inline" action="/action_page.php">
    <div class="form-group">
      <label>Add Crop Name to Know about it by the Agricultural Officer</label>
      <input type="text" class="form-control" placeholder="Crop Name" name="name">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
  <?php echo form_close(); ?>
</div>
<div class="well">
	
</div>
</div>
<!--
<div class="row">	
	<div class="col-md-4">
		<h3>Crops by all users</h3>
		<?php foreach($allcrops as $crop): ?>
			<?php echo $crop['name']; ?><br>
		<?php endforeach; ?>
	</div>
	<div class="row">
		<?php foreach ($products as $product): ?>
			<?php echo $product['name']; ?><br>
			<?php echo $product['quantity']; ?><br>
			<?php echo $product['product_desc']; ?><br>
		<?php endforeach; ?>
	</div> 
</div>
-->