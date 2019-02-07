
<?php echo form_open('users/login');  ?>
<div class="container-fluid" style="padding-top: 100px; ">
	

	<div class="col-md-6 col-md-offset-3">
		<div class="well">
		<h2 class="text-center"><b><?= $title?></b></h2>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Enter Username" name="username" value="<?php echo set_value('username'); ?>">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Enter Password" name="password" value="<?php echo set_value('password'); ?>">
		</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		
	</div>
</div>
</div>
<?php echo form_close(); ?>