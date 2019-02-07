 <?php echo validation_errors(); ?>
 <?php echo form_open('a_off/process/'.$key); ?> <!-- to upload file(multipart) -->
 <div class="row">
   <div class="col-md-4 col-md-offset-4">
     <h2 class="text-center"><b><?= $title?></b></h2>
     <p>process</p>
      <div class="form-group">
      <label>soil</label>
      <input type="text" class="form-control"  placeholder="soil" name="soil" value="<?php echo set_value('soil'); ?>" >
    </div>
     <div class="form-group">
      <label>climate</label>
      <input type="text" class="form-control"  placeholder="Climate" name="climate" value="<?php echo set_value('climate'); ?>">
    </div>  
     <div class="form-group">
      <label>fertilizer</label>
      <input type="text" class="form-control"  placeholder="fertilizer" name="fertilizer" value="<?php echo set_value('fertilizer'); ?>">
    </div>  
     <div class="form-group">
      <label>pesticide</label>
      <input type="text" class="form-control"  placeholder="pesticide" name="pesticide" value="<?php echo set_value('pesticide'); ?>">
    </div>  
     <div class="form-group">
      <label>new tech</label>
      <input type="text" class="form-control"  placeholder="new tech" name="new_tech" value="<?php echo set_value('new_tech'); ?>">
    </div>  
    <div class="form-group">
      <label>select fertilizer</label> <br>
      <?php foreach($fertilizers as $f):?>
      <label><input type="checkbox" name="fer_name[]" value="<?php echo $f['id'] ?>"><?php echo $f['fer_name'] ?></label>
      <br> 
      <?php endforeach?>
    </div>  
    <div class="form-group">
      <label>select pesticides</label> <br>
      <?php foreach($pesticides as $p):?>
      <label><input type="checkbox" name="pest_name[]" value="<?php echo $p['id'] ?>"><?php echo $p['pest_name'] ?></label>
      <br> 
      <?php endforeach?>
    </div>  
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
   </div>
 </div>    
<?php echo form_close(); ?>

