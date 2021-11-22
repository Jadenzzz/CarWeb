<?php
	session_start();
    $firstname = $_SESSION["firstname"];
	$lastname = $_SESSION["lastname"];
    $gender = $_SESSION["gender"];
	$age = $_SESSION["age"];
	$street_address = $_SESSION["street_address"];
	$suburb = $_SESSION["suburb"];
	$state = $_SESSION["state"];
	$post_code = $_SESSION["post_code"];
	$email = $_SESSION["email"];
	$phone = $_SESSION["phone"];
	$preferredContact = $_SESSION["preferredContact"];
	$car = $_SESSION["car"];
	$color = $_SESSION["color"];
	$days = $_SESSION["days"];
    $cost = $_SESSION["cost"];
    $bookday = $_SESSION["bookday"];
    $card_type = $_SESSION["card_type"];
    $card_num = $_SESSION["card_num"];
    $expires = $_SESSION["expires"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.inc';?>
	<title>TDN.CORP|Receipt</title>


</head>
<body>
    <?php include 'menu.inc';?>
    <div class="receipt">
    <h1>Congratulation!</h1>
    <?php echo "<p>You have finished all the steps to hire $car for the cost of $ $cost</p>";?>
    <p>This is your recepit:</p>
    <?php
    $sql_table="hire";
    $receipt = "SELECT * FROM $sql_table WHERE orderdate = CURRENT_TIMESTAMP";
    require_once ("settings.php");
	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);
    $result = mysqli_query($conn, $receipt);
    if(!$result) {
        echo "<p class='container'>Something is wrong with ", $receipt, "</p>";
        } else {
        while ($info = mysqli_fetch_assoc($result)){
        echo "<p>Order ID: ",$info["order_id"],"</p>";
        echo "<p>Order date: ",$info["orderdate"],"</p>";
        echo "<p>First name: ",$info["firstname"],"</p>";
        echo "<p>Last name: ",$info["lastname"],"</p>";
        echo "<p>Gender: ",$info["gender"],"</p>";
        echo "<p>Age: ",$info["age"],"</p>";
        echo "<p>Street address: ",$info["street_address"],"</p>";
        echo "<p>Suburb: ",$info["suburb"],"</p>";
        echo "<p>State: ",$info["states"],"</p>";
        echo "<p>Post code: ",$info["post_code"],"</p>";
        echo "<p>Email: ",$info["email"],"</p>";
        echo "<p>Phone: ",$info["phone"],"</p>";
        echo "<p>Preffered Contact: ",$info["preferredContact"],"</p>";
        echo "<p>Car: ",$info["car"],"</p>";
        echo "<p>Color of car: ",$info["color"],"</p>";
        echo "<p>Number of days: ",$info["dayss"],"</p>";
        echo "<p>Total cost: ",$info["cost"],"</p>";
        echo "<p>Card type: ",$info["card_type"],"</p>";
        echo "<p>Name on card: ",$info["card_name"],"</p>";
        echo "<p>Card number: ",$info["card_num"],"</p>";
        echo "<p>Expire day: ",$info["expires"],"</p>";
        echo "<p>Order status: ",$info["order_status"],"</p>";
        }
        echo "</table>";
        }
    ?>
    </div>
    <footer>
    <?php include 'footer.inc';?>
    </footer>
</body>