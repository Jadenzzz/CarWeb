<?php
	session_start();
	 if (!isset ($_SESSION["manageQuery"])) {
	 	$_SESSION["manageQuery"] = "select * FROM hire";
	}
	 if (!isset ($_SESSION["deleteQuery"])) {
	 	$_SESSION["deleteQuery"] = "";
	}
	 if (!isset ($_SESSION["updateQuery"])) {
	 	$_SESSION["updateQuery"] = "";
	}

	$manageQuery = $_SESSION["manageQuery"];
	$deleteQuery = $_SESSION["deleteQuery"];
	$updateQuery = $_SESSION["updateQuery"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.inc';?>
	<title>TDN.CORP|Manage</title>
	<script type="text/javascript" src="scripts/manage.js"></script>
</head>
<body class="manage">
<?php include 'menu.inc';?>
	<div class="enquire">
	<header class='small-banner'>
		<h3 class='container'>Processing Order</h3>
	</header>
	<form class="container" id="manage" method="post" action="managequery.php" novalidate>
		<fieldset id="orderfield">
			<legend>Order By</legend>
			<p class="radio">
				<strong for="order">Order By:</strong>
				<label for="all">All</label>
				<input type="radio" id="all" name="orderType" value="all" checked="checked" />
				<label for="name">Name</label>
				<input type="radio" id="name" name="orderType" value="name"/>
				<label for="product">Product</label>
				<input type="radio" id="product" name="orderType" value="product"/>
				<label for="status">Status</label>
				<input type="radio" id="status" name="orderType" value="status"/>
				<label for="cost">Cost</label>
				<input type="radio" id="cost" name="orderType" value="cost"/>
			</p>
			<p id="nameKey" class="hidden">
				<label for="orderName">First Name:</label>
				<input type="text" name= "firstNameKey" id="firstNameKey" placeholder="Duc"/>
				<label for="orderName">Last Name:</label>
				<input type="text" name= "lastNameKey" id="lastNameKey" placeholder="Nguyen"/>
			</p>
			<p id="productKey" class="hidden">
				<label for="orderProduct">Keyword:</label>
				<input type="text" name= "orderProduct" id="orderProduct" placeholder="Car Name"/>
			</p>
			<p id="statusKey" class="hidden">
				<label for="orderStatusKey">Keyword:</label>
				<input type="text" name= "orderStatusKey" id="orderStatusKey" placeholder="Status"/>
			</p>
		</fieldset>
		<fieldset>
			<legend>Update Status</legend>
			<p class="radio">
				<strong>Update an Order:</strong>
				<input type="checkbox" id="showUpdateOrder" value="showUpdateOrder"/>
			</p>
			<span id="hiddenUpdateStatus" class="hidden">
				<p>
					<label for="updateOrderNumber">Input Order ID to Update</label>
					<input type="text" name= "updateOrderNumber" id="updateOrderNumber" placeholder="1"/>
				</p>
				<p>
					<label for="orderStatus">Order Status:</label>
					<select name="orderStatus" id="orderStatus">
						<option value="">Please Select</option>
						<option value="PENDING">Pending</option>
						<option value="FUFILLED">Fufilled</option>
						<option value="PAID">Paid</option>
					</select>
				</p>
			</span>
		</fieldset>
		<fieldset>
			<legend>Delete Order</legend>
			<p class="radio">
				<strong>Delete an Order</strong>
				<input type="checkbox" id="showDeleteOrder" value="showDeleteOrder"/>
			</p>
			<span id="hiddenDelete" class="hidden">
				<p>
					<label for="deleteOrderNumber">Input Order ID to Delete</label>
					<input type="text" name= "deleteOrderNumber" id="deleteOrderNumber" placeholder="1"/>
				</p>
			</span>
		</fieldset>
		<input type="submit" name="submit" value="Submit"/>
	</form>
	</div>
	<?php
	require_once ("settings.php");
	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);

	if (!$conn) {

	echo "<p>Database connection failure</p>";
	} else {

	$sql_table="orders";
	if ($updateQuery != "" ) {
		mysqli_query($conn, $updateQuery);
	}
	if ($deleteQuery != "" ) {
		mysqli_query($conn, $deleteQuery);
	}
	$result = mysqli_query($conn, $manageQuery);

	if(!$result) {
	echo "<p class='container'>Something is wrong with ", $manageQuery, "</p>";
	} else {

	echo "<table border=\"1\">";
	echo "<tr>"
	."<th scope=\"col\">order_id</th>"
	."<th scope=\"col\">orderdate</th>"
	."<th scope=\"col\">firstname</th>"
	."<th scope=\"col\">lastname</th>"
	."<th scope=\"col\">gender</th>"
    ."<th scope=\"col\">age</th>"
	."<th scope=\"col\">states</th>"
	."<th scope=\"col\">postcode</th>"
    ."<th scope=\"col\">email</th>"
	."<th scope=\"col\">phone</th>"
	."<th scope=\"col\">car</th>"
	."<th scope=\"col\">color</th>"
	."<th scope=\"col\">dayss</th>"
	."<th scope=\"col\">cost</th>"
	."<th scope=\"col\">order_status</th>"
	."</tr>";

	while ($row = mysqli_fetch_assoc($result)){
	echo "<tr>";
	echo "<td>",$row["order_id"],"</td>";
	echo "<td>",$row["orderdate"],"</td>";
	echo "<td>",$row["firstname"],"</td>";
	echo "<td>",$row["lastname"],"</td>";
	echo "<td>",$row["gender"],"</td>";
    echo "<td>",$row["age"],"</td>";
	echo "<td>",$row["states"],"</td>";
	echo "<td>",$row["post_code"],"</td>";
    echo "<td>",$row["email"],"</td>";
	echo "<td>",$row["phone"],"</td>";
	echo "<td>",$row["car"],"</td>";
    echo "<td>",$row["color"],"</td>";
	echo "<td>",$row["dayss"],"</td>";
	echo "<td>",$row["cost"],"</td>";
	echo "<td>",$row["order_status"],"</td>";
	echo "</tr>";
	}
	echo "</table>";

	mysqli_free_result($result);
	}

	mysqli_close($conn);
	}
	?>
	<footer>
		<?php include 'footer.inc';?>
	</footer>
</body>
</html>