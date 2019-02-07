<!DOCTYPE html>
<html>
<head>
	<title>E-Farming</title>

	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
</head>
<style>
	.navbar-default{
		background-color: white; 		 
	}
	.table-bordered{
		border: 1px solid black;
		background-color: #f2f2f2;
	}
	.td-id{
		padding: 100px;
		width: 25%;

	}

	.thead-id{
		background-color: black;
		color: grey;
	}
	#c{
		background-color: #4d9900;
	}
	a {
    color: black;
		}
	.t{
		color: black;	
		background-repeat: no-repeat;
	}
	.hero-image {
  background-image: url("<?php echo base_url(); ?>assets/images/crops/bg1.jpeg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-color: #cccccc;
  height: 500px;
  background-position: center;  
  background-size: cover;
  position: relative;
  font-family: 'Arial', 'courier';
}
  /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
        /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
	
p.b {
    font-family: Arial, Helvetica, sans-serif;
    
    color: black;
    text-transform: capitalize;
}
p.a {
    font-family: Arial, Helvetica, sans-serif;    
    color: green;
    text-transform: capitalize;
    font-variant: small-caps;
    font-weight: bold;
}
strong.b{
 color: black;	
}
.navbar-brand {
  margin: 0px;
  padding: 0px;
}
#logo {
  height: 100px;
  vertical-align: middle;
}
 .carousel-inner img {   
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
   .footer {
  	background-image: url("<?php echo base_url(); ?>assets/images/crops/foot.jpg");
  	background-size: 100%; 
   position: fixed;
   left: 0;
   bottom: 0;
   padding-top: 15px; 
   width: 100%;
   height: 8%;
   background-color: #c2f0c2;
   color: grey;
   font-weight: bold; 
   text-align: center;
}
</style>
<body class="hero-image">
	
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>farm"><img src="<?php echo base_url(); ?>assets/images/crops/icon.png"style="max-width:100px;max-height:100px; margin-top: -30px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    
      <ul class="nav navbar-nav">
        <?php if($this->session->userdata('logged_in')): ?>
			<?php if($this->session->userdata('user_id') == 4): ?>
				<li><a href="<?php echo base_url(); ?>buyer"><p class="a">Home</p></a></li>
			<?php endif; ?>								
		<?php endif; ?>
      </ul>
       <ul class="nav navbar-nav">
        <?php if($this->session->userdata('logged_in')): ?>
			<?php if($this->session->userdata('user_id') == 2): ?>
				<li><a href="<?php echo base_url(); ?>a_off"><p class="a">Home</p></a></li>
			<?php endif; ?>								
		<?php endif; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <?php if(!$this->session->userdata('logged_in')): ?>
					<li><a href="<?php echo base_url(); ?>users/login"><p class="a">Login</p></a></li>
					<li><a href="<?php echo base_url(); ?>users/register"><p class="a">Register</p></a></li>
					<?php endif; ?>
					<!--<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>SIGN UP</b><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url(); ?>users/register"><p class="b">Admin</p></a></li>
							<li><a href="<?php echo base_url(); ?>users/register"><p class="b">Agriculturer Officer</p></a></li>
							<li><a href="<?php echo base_url(); ?>users/register"><p class="b">Seller</p></a></li>
							<li><a href="<?php echo base_url(); ?>users/register"><p class="b">Buyer</p></a></li>						
						</ul>					
					</li>-->
					<?php
					$u_id = $this->session->userdata('u_id');
					
					?>
					<?php if($this->session->userdata('logged_in')): ?>
						<?php if($this->session->userdata('user_id') == 4): ?>
							<li><a href="<?php echo base_url(); ?>buyer/myOrders"><p class="a">My Orders</p></a></li>
						<?php endif; ?>
						<?php if($this->session->userdata('user_id') == 3): ?>
							<li><a href="<?php echo base_url(); ?>seller/cropInfo/<?php echo $u_id ?>"><p class="a">Crop info</p></a></li>
						<?php endif; ?>
					<li><a href="<?php echo base_url(); ?>users/logout"><p class="a">Logout</p></a></li>
					<?php endif; ?>
      </ul>
    </div>
  </div>
</nav>


	<div class="container" style="margin-top:75px;margin-bottom:75px">
		<!--  flash messages -->

		<?php if($this->session->flashdata('user_registered')): ?> 

			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>

		<?php endif; ?>

		<?php if($this->session->flashdata('user_logged_in')): ?> 

			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_in').'</p>'; ?>

		<?php endif; ?>

		<?php if($this->session->flashdata('login_failed')): ?> 

			<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>

		<?php endif; ?>

		<?php if($this->session->flashdata('user_logout')): ?> 

			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logout').'</p>'; ?>

		<?php endif; ?>

		<?php if($this->session->flashdata('crop_added')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('crop_added').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('crop_for_sale')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('crop_for_sale').'</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('product_ordered')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('product_ordered').'</p>'; ?>
		<?php endif; ?>