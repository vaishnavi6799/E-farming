<h2><?= $title  ?></h2>

<label>LIST OF AGRICULTURAL OFFICERS REGISTERED</label>
<div class="table-responsive">
<table class="table table-bordered">
	<thead class="thead thead-id">
	<tr>
		<th>Name</th>
		<th>Contact</th>
		<th>Email</th>
		<th>Address</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($a_offs as $a): ?>	
	
	<tr>
		<td><p><?php echo $a['firstname']?> <?php echo $a['lastname']?></p></td>
		<td><p><?php echo $a['contact']?></p></td>
		<td><p><?php echo $a['email']?></p></td>
		<td><?php echo $a['localAddress']?> <?php echo $a['state']?> <?php echo $a['country']?> <?php echo $a['pincode']?></td>
	</tr>
	
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<label>LIST OF SELLERS REGISTERED</label>
<div class="table-responsive">
<table class="table table-bordered">
	<thead class="thead thead-id">
	<tr>
		<th>Name</th>
		<th>Contact</th>
		<th>Email</th>
		<th>Address</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($sellers as $seller): ?>	
	
	<tr>
		<td><p><?php echo $seller['firstname']?> <?php echo $seller['lastname']?></p></td>
		<td><p><?php echo $seller['contact']?></p></td>
		<td><p><?php echo $seller['email']?></p></td>
		<td><?php echo $seller['localAddress']?> <?php echo $seller['state']?> <?php echo $seller['country']?> <?php echo $seller['pincode']?></td>
	</tr>
	
	<?php endforeach; ?>
	</tbody>
</table>
</div>

<label>LIST OF BUYERS REGISTERED</label>
<div class="table-responsive">
<table class="table table-bordered">
	<thead class="thead thead-id">
	<tr>
		<th>Name</th>
		<th>Contact</th>
		<th>Email</th>
		<th>Address</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($buyers as $b): ?>	
	
	<tr>
		<td><p><?php echo $b['firstname']?> <?php echo $b['lastname']?></p></td>
		<td><p><?php echo $b['contact']?></p></td>
		<td><p><?php echo $b['email']?></p></td>
		<td><?php echo $b['localAddress']?> <?php echo $b['state']?> <?php echo $b['country']?> <?php echo $b['pincode']?></td>
	</tr>
	
	<?php endforeach; ?>
	</tbody>
</table>
</div>