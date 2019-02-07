 <h2><?=$title ?></h2>

<div class="well">
	
		crops already described<br>
		<?php foreach($cropsInfo as $crop): ?>
			<b><?php echo $crop['name']; ?><br></b>
			<?php echo $crop['text']; ?><br>		
		<?php endforeach; ?>
		
	
</div>

 <?php echo validation_errors(); ?>
 <?php echo form_open('a_off/process1/'.$key); ?>
 <div class="well">
   crops to be described<br>
		<?php foreach($crops as $crop): ?>			
			<a href="<?php echo base_url(); ?>a_off/process1/<?php echo $crop['id']; ?>"><?php echo $crop['name']; ?><br></a>
		<?php endforeach; ?>
     <h2 class="text-center"><b><?= $title?></b></h2>
     <p>process</p>
     <div class="form-group">
			<label>Product Description</label>	
			<textarea name="text" id="editor" rows="5"></textarea>
				
		</div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
   
 </div>    
<?php echo form_close(); ?>

