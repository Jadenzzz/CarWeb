<?php
	session_start();
	
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$gender = @$_POST["gender"];
	$age = $_POST["age"];
	$street_address = $_POST["street_address"];
	$suburb = $_POST["suburb"];
	$state = $_POST["state"];
	$post_code = $_POST["post_code"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$preferredContact = @$_POST["preferredContact"];
	$car = $_POST["car"];
	$color = $_POST["color"];
	$days = $_POST["days"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.inc';?>
	<title>TDN.CORP|Payment</title>


</head>
<body>
    <?php include 'menu.inc';?>
		<div class="enquire">
			<h1>Customer payment</h1>
		<form id="bookform" method="post" action="process_order.php">
			<fieldset>
				<legend>Your payment</legend>
				<p>Your Name: <?php echo "$firstname $lastname"?></p>
				<p>Gender: <?php echo "$gender"?></p>
				<p>Age: <?php echo "$age"?></span></p>
				<p>Street address: <?php echo "$street_address"?></p>
				<p>Suburb: <?php echo "$suburb"?></p>
				<p>State: <?php echo "$state"?></p>
				<p>Post code: <?php echo "$post_code"?></p>
				<p>Email: <?php echo "$email"?></p>
				<p>Phone: <?php echo "$phone"?></p>
				<p>Preferred contact: <?php echo "$preferredContact"?></p>
				<p>Car: <?php echo "$car"?></p>
				<p>Color of car: <?php echo "$color"?></p>
				<p>Number of days you rent the cars: <?php echo "$days"?></p>
	
				<p><label for="date">Preferred Date</label>
					<input type="text" id="date" name="bookday" placeholder="dd/mm/yyyy"  maxlength="10" size="10" />
				</p>
				<p>
					<label for="card_type">Type of credit card:</label>
					<select name="card_type" id="card_type">
						<option hidden="hidden" value="">Select card type...</option>
						<option value="visa" name = "Visa">Visa</option>
						<option value="master" name = "Mastercard">Mastercard</option>
						<option value="amex" name = "Amex">AmEx</option>
					</select>
				</p>
				<p>
					<label for="card_name">Name on card:</label>
					<input type="text" name="card_name" id="card_name" maxlength="40" size="40" />
				</p>
				<p>
					<label for="card_num">Credit card Number:</label>
					<input type="text" name="card_num" id="card_num" maxlength="16" size="16" placeholder="xxxxxxxxxxxxxxxx"
						pattern="[0-9\s]{1,16}" />
				</p>
				<p><label for="expires">Credit card Expiry</label>
					<input type="text" id="expires" name="expires"  placeholder="mm/yy"  maxlength="6" size="6" />
				</p>
				<p><label for="cvv">Card Verification Value</label>
					<input type="text" id="cvv" name="cvv" 
						  maxlength="3" size="3" />
				</p>
				<input type="submit" value="Pay now!" id="paynow" name="submit"/>
				<button type="button" id="cancelButton">Cancel</button>
			</fieldset>
		</form>
	</div>
	<footer>
        <?php include 'footer.inc';
		$_SESSION["firstname"] = $firstname;
		$_SESSION["lastname"] = $lastname;
		$_SESSION["gender"] = $gender;
		$_SESSION["age"] = $age;
		$_SESSION["email"] = $email;
		$_SESSION["street_address"] = $street_address;
		$_SESSION["suburb"] = $suburb;
		$_SESSION["state"] = $state;
		$_SESSION["post_code"] = $post_code;
		$_SESSION["phone"] = $phone;
		$_SESSION["preferredContact"] = $preferredContact;
		$_SESSION["car"] = $car;
		$_SESSION["color"] = $color;
		$_SESSION["days"] = $days;?>
	</footer>
</body>
