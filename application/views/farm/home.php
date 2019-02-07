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
 
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-color:white;
  height: 500px;
  background-position: center;  
  background-size: cover;
  position: relative;
  font-family: 'Arial', 'courier';
}
	
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
p.home {
    font-family: Arial, Helvetica, sans-serif;    
    color: darkgrey;
    text-transform: capitalize;
    
    font-weight: bold;
}
h1.a {
    font-family: Arial, Helvetica, sans-serif;    
    color: green;
    text-transform: capitalize;
    font-variant: small-caps;
    font-weight: bold;
    text-align: center;
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
					<?php if($this->session->userdata('logged_in')): ?>
						<?php if($this->session->userdata('user_id') == 4): ?>
							<li><a href="<?php echo base_url(); ?>buyer/myOrders"><p class="a">My Orders</p></a></li>
						<?php endif; ?>
					<li><a href="<?php echo base_url(); ?>users/logout"><p class="a">Logout</p></a></li>
					<?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:75px;margin-bottom:75px">

	
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

	


    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?php echo base_url(); ?>assets/images/crops/slide4.jpg" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Agriculture by Aircraft</h3>          
        </div>      
      </div>

      <div class="item">
        <img src="<?php echo base_url(); ?>assets/images/crops/slide.jpeg" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Farmer cultivating rice field, paddy with two oxen pulling a plough,</h3>          
        </div>      
      </div>
    
      <div class="item">
        <img src="<?php echo base_url(); ?>assets/images/crops/slide2.jpg" alt="Chicago" width="1200" height="700"" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Weed-free Gardening</h3>
        </div>      
      </div>
    </div>
    
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<div class="container" style="margin-top:75px;margin-bottom:75px">
	<h1 class="a">E-Farming System</h1>
<p class="home">Agriculture is the backbone of the Indian Economy"- said Mahatma Gandhi six decades ago. Even today, the situation is still the same, with almost the entire economy being sustained by agriculture, which is the mainstay of the villages. It contributes 16% of the overall GDP and accounts for employment of approximately 52% of the Indian population. Rapid growth in agriculture is essential not only for self-reliance but also to earn valuable foreign exchange. 
</p>
<p class="a">users of E-Farming System : </p>
<strong>Admin</strong> 
<p class="home">

	Admin can view the list of Agricultural Officers,Sellers and Buyers registered.
</p>
<strong>Agricultural Officer</strong> 
<p class="home">

	agricultural officer gives information about a crop of what fertilizers, Pescticides and new technologies to be used which are added by the sellers.
</p>
<strong>Seller</strong> 
<p class="home">

	Seller adds the crops for the sale.
</p>
<strong>Buyer</strong> 
<p class="home">

	Buyer places order for a product added by the seller.
</p>
</div>
<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>