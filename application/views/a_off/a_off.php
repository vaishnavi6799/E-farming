 <h2><?=$title ?></h2>

<div class="well">
	
		crops already described<br>
		<?php foreach($cropsInfo as $crop): ?>
			<b><?php echo $crop['name']; ?><br></b>
			<?php echo $crop['text']; ?><br>		
		<?php endforeach; ?>
		
	
</div>

 
 <div class="well">
   crops to be described<br>
		<?php foreach($crops as $crop): ?>			
			<a href="<?php echo base_url(); ?>a_off/process1/<?php echo $crop['id']; ?>"><?php echo $crop['name']; ?><br></a>
		<?php endforeach; ?>
    
 </div>    


