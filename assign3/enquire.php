<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'header.inc';?>
	<title>TDN.CORP|Enquire</title>

</head>
<body>
    <?php include 'menu.inc';?>


	<div class="totalenquire">
		<div class="enquire">
			<h1 class="title1">Payment</h1>
			<form id="regform" method="post" action="payment.php" novalidate="novalidate">
				<fieldset id="person">
					<legend>Your details:</legend>
					<p><label for="firstname">Enter your first name</label>
						<input type="text" name="firstname" id="firstname" size="20" />
					</p>
					<p><label for="lastname">Enter your last name</label>
						<input type="text" name="lastname" id="lastname" size="20" />
					</p>
					<fieldset id="gender">
						<legend>Gender:</legend>
						<label for="male">Male</label>
						<input type="radio" name="gender" id="male" value="male" /><br />
						<label for="female">Female</label>
						<input type="radio" name="gender" id="female" value="female" /><br />
						<label for="other">Other</label>
						<input type="radio" name="gender" id="other" value="other" /><br />
					</fieldset>
					<p><label for="age">Enter your age</label>
						<input type="text" id="age" name="age" size="5">
					</p>
		
				</fieldset>
				<fieldset>
					<legend>Address</legend>
                        <p>
                            <label for="street_address">Street Address</label>
                            <input type="text" name="street_address" id="street_address" maxlength="40" size="40"
                                pattern="[a-zA-Z0-9\s]{1,40}" />
                        </p>
                        <p>
                            <label for="suburb">Suburb</label>
                            <input type="text" name="suburb" id="suburb" maxlength="40" size="40"
                                pattern="[a-zA-Z]{1,40}" />
                        </p>
                        <p>
                            <label for="state">State</label>
                            <select name="state" id="state">
                                <option hidden="hidden" value="">Select state...</option>
                                <option value="vic">VIC</option>
                                <option value="nsw">NSW</option>
                                <option value="qld">QLD</option>
                                <option value="nt">NT</option>
                                <option value="wa">WA</option>
                                <option value="sa">SA</option>
                                <option value="tas">TAS</option>
                                <option value="act">ACT</option>
                            </select>
                        </p>
                        <p>
                            <label for="post_code">Post Code</label>
                            <input type="text" name="post_code" id="post_code" maxlength="4" size="4" />
                        </p>
                    </fieldset>
                    <fieldset>
                        <legend>Contact Details</legend>
                        <p>
                            <label for="email">Email Address</label>
                            <input type="text" name="email" id="email" maxlength="40" size="40" />
                        </p>
                        <p>
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" maxlength="20" size="20" />
                        </p>
                    </fieldset>
					<label>Preferred contact</label>
						<fieldset id="preferredContact">
							<p>
							<label for="mail">Email</label>
							<input type="radio" id="mail" name="preferredContact" value="mail"/>
							<label for="post">Post</label>
							<input type="radio" id="post" name="preferredContact" value="post"/>
							<label for="phone_number">Phone</label>
							<input type="radio" id="phone_number" name="preferredContact" value="phone_number"/>
							</p>
						</fieldset>

				<fieldset>
					<legend>Your cars:</legend>
					<fieldset id="car" name="car">
						<label for="car">Car</label>
						<select name="car" id="car">
							<option value="">Please select</option>
							<option value="bmw" id="bmw">BMW 520i</option>
							<option value="vios" id="vios">Toyota Vios</option>
							<option value="vin" id="vin">Vinfast LUX SA2.0</option>
							<option value="ford" id="ford">Ford Transit</option>
						</select>
					</fieldset>
					<p>
						<label for="color">Color of car</label>
						<select name="color" id="color">
							<option value="">Please select</option>
							<option value="black">Black</option>
							<option value="white">White</option>
							<option value="navy">Navy Blue</option>
							<option value="gray">Gray</option>
						</select>
					</p>
					<p>
						<label for="days">Number of days you rent the cars:</label>
						<input type="text" id="days" name="days" maxlength="3" size="3" />
					</p>
				</fieldset>
				<div id="bottom"> </div>
				<p><input type="submit" value="Pay now!" id="paynow" name="submit" />
					<input type="reset" value="Reset" id="reset" name="reset"/>
				</p>
			</form>
		</div>
		</div>
		<footer>
			<?php include 'footer.inc';?>
		</footer>	
</body>
	