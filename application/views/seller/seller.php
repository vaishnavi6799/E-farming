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
	<?php echo form_open_multipart('seller/sale/'.$id); ?>
	  <label>Add Crop For Sale</label>
		<div class="form-group">
			<label>select the crop</label>
			<select class="form-control" name="crop_id">
				<?php foreach($crops as $crop): ?>
		        	<option value="<?php echo $crop['id']; ?>"><?php echo $crop['name']; ?></option>
		    	<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Quantity</label>	
			<input type="text" name="quantity" class="form-control" placeholder="quantity" value="<?php echo set_value('quantity'); ?>">		
		</div>
		<div class="form-group">
			<label>Enter Price Per Quantity</label>	
			<input type="text" name="price" placeholder="price" class="form-control" value="<?php echo set_value('price'); ?>">		
		</div>
		<div class="form-group">
			<label>Product Description</label>	
			<textarea name="product_desc" id="editor" rows="5"></textarea>
				
		</div>
		<div class="form-group">
	  		<label>Upload Image</label>
	  		<input type="file" name="userfile" class="form-control" size="20">
  		</div>
		<button type="submit" class="btn btn-success">submit</button>
		<?php echo form_close(); ?>
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