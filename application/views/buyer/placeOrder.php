<div class="row">
   <div class="panel-group">
      
      <?php foreach ($products as $a): ?>
        <div class="panel panel-default">
          <div class="panel-heading"><strong>MAXIMUM QUANTITY AVAILABLE IS <?php echo $a['quantity']-$a['quantity_selected_by_all_users']?></strong></div>
          <div class="panel-body">   
          <div class="col-sm-6">     
          <img src="<?php echo site_url(); ?>assets/images/crops/<?php echo $a['crop_image']; ?>" style="width:50%">           
            <p class="b"><strong class="b">NAME: </strong><?php echo $a['name']?><br>
            <strong class="b">Stock Left: </strong><?php echo $a['quantity']-$a['quantity_selected_by_all_users']?><br>
            <strong class="b">Price Per Quantity: </strong><?php echo $a['price']?><br>
            <strong class="b">Product Description: </strong><?php echo $a['product_desc']?></p>
            <strong>About a Farmer</strong>
            <strong>Farmer Name:</strong><?php echo $a['firstname']?> <?php echo $a['lastname']?><br>
            <strong>Address: </strong>
            <?php echo $a['localAddress']?><br>
            <?php echo $a['state']?><br>
            <?php echo $a['country']?><br>
            <?php echo $a['pincode']?><br>
            <?php echo $a['email']?><br>
            <?php echo $a['contact']?><br>          
          </div>
           <?php echo validation_errors(); ?>
  <?php echo form_open('buyer/placeOrder/'.$id); ?>
  <h3><strong>PLACE ORDER</strong></h3> 
  <div class="col-sm-3">  
       
    <div class="form-group">
      <?php foreach ($products as $a): ?>
      <label>Quantity <i>Less Than Or Equal To <?php echo $a['quantity']-$a['quantity_selected_by_all_users']?></i></label>  
      <input type="text" name="quantity" class="form-control" placeholder="quantity" value="<?php echo set_value('quantity'); ?>">   
      <?php endforeach; ?>
    </div>  
   
    <div class="form-group">
      <label>Full Name</label>
      <input type="text" class="form-control"  placeholder="Full Name" name="fullname" value="<?php echo set_value('fullname'); ?>">
    </div>
    <div class="form-group">
      <label>Contact</label>
      <input type="text" class="form-control"  placeholder="contact" name="contact" value="<?php echo set_value('contact'); ?>">
    </div>    
     <div class="form-group">
      <label>Local Address</label>
      <input type="text" class="form-control"  placeholder="Local Address" name="l_add" value="<?php echo set_value('l_add'); ?>">
    </div>
     <div class="form-group">
      <label>State</label>
      <input type="text" class="form-control"  placeholder="state" name="state" value="<?php echo set_value('state'); ?>">
    </div>
    <div class="form-group">
      <label>Country</label>
      <input type="text" class="form-control"  placeholder="country" name="country" value="<?php echo set_value('country'); ?>">
    </div>
    <div class="form-group">
      <label>Pincode</label>
      <input type="text" class="form-control"  placeholder="pincode" name="pincode" value="<?php echo set_value('pincode'); ?>">  
    </div>
  </div>
    <div class="col-sm-3">
      <label>Payment mode</label> 
        <div class="radio">
           <label><input type="radio" name="mode" value="0">CASH ON DELIVERY</label>
            <label><input type="radio" id="trigger" name="mode" value="1">CARD PAYMENT</label>
                <div id="hidden_fields">                              
                    <label for="fname">Accepted Cards</label>
                      <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                      </div>
                      <div class="form-group">
                        <label>Name on Card</label>
                          <input type="text" id="cname" name="cardname" class="form-control" placeholder="cardname">
                      </div>
                      <div class="form-group">
                        <label>Credit card number</label>
                          <input type="text" id="ccnum" name="cardnumber" class="form-control" placeholder="cardnumber">
                      </div>
                       <div class="form-group">
                        <label>Exp Month</label>
                          <input type="text" id="expmonth" name="expmonth" class="form-control" placeholder="expmonth">
                       </div>
                        <div class="form-group">
                          <label>Exp Year</label>
                          <input type="text" id="expyear" name="expyear" class="form-control" placeholder="expyear">
                        </div>
                        <div class="form-group">
                          <label>CVV</label>
                          <input type="text" id="cvv" name="cvv" class="form-control" placeholder="cvv">
                        </div>
                  </div>
            </div>
                 <button type="submit" class="btn btn-primary">submit</button>  
              </div>
            
     <?php echo form_close(); ?>
  
        </div>
    
    </div>
      <?php endforeach; ?>
  </div>
 </div>

	<script type="text/javascript">
		$(function() {
  
  // Get the form fields and hidden div
  var checkbox = $("#trigger");
  var hidden = $("#hidden_fields");
  var populate = $("#populate");
  
  // Hide the fields.
  // Use JS to do this in case the user doesn't have JS 
  // enabled.
  hidden.hide();
  
  // Setup an event listener for when the state of the 
  // checkbox changes.
  checkbox.change(function() {
    // Check to see if the checkbox is checked.
    // If it is, show the fields and populate the input.
    // If not, hide the fields.
    if (checkbox.is(':checked')) {
      // Show the hidden fields.
      hidden.show();
      // Populate the input.
      populate.val("Dude, this input got populated!");
    } else {
      // Make sure that the hidden fields are indeed
      // hidden.
      hidden.hide();
      
      // You may also want to clear the value of the 
      // hidden fields here. Just in case somebody 
      // shows the fields, enters data to them and then 
      // unticks the checkbox.
      //
      // This would do the job:
      //
      // $("#hidden_field").val("");
    }
  });
});
	</script>