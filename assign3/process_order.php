<?php
	session_start();
	$firstname = $_SESSION["firstname"];
	$lastname = $_SESSION["lastname"];
    $gender = $_SESSION["gender"];
    $age = $_SESSION["age"];
	$email = $_SESSION["email"];
	$street_address = $_SESSION["street_address"];
	$suburb = $_SESSION["suburb"];
	$state = $_SESSION["state"];
	$post_code = $_SESSION["post_code"];
	$phone = $_SESSION["phone"];
	$preferredContact = $_SESSION["preferredContact"];
	$car = $_SESSION["car"];
	$color = $_SESSION["color"];
	$days = $_SESSION["days"];

    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $bookday = sanitise_input($_POST["bookday"]);
    $card_type = sanitise_input($_POST["card_type"]);
    $card_name = sanitise_input($_POST["card_name"]);
    $card_num = sanitise_input($_POST["card_num"]);
    $expires = sanitise_input($_POST["expires"]);
    $cvv = sanitise_input($_POST["cvv"]);

    if (isset ($_POST["submit"])) {
        $errMsg = "";
        if ($firstname=="") {
            $errMsg .= "<p>You must enter your first name.</p>";
        }
        if (!preg_match("/[a-zA-Z]{1,25}/",$firstname)) {
            $errMsg .= "<p>Maximum of 25 characters, alphabetical only for your first name.</p>";
        }
    
        if ($lastname=="") {
            $errMsg .= "<p>You must enter your last name.</p>";
        }
        if (!preg_match("/[a-zA-Z]{1,25}/",$lastname)) {
            $errMsg .= "<p>Maximum of 25 characters, alphabetical only for your first name.</p>";
        }
        if ($gender=="") {
            $errMsg .= "<p>You must choose your gender.</p>";
        }
        if ($age=="") {
            $errMsg .= "<p>You must enter your age.</p>";
        }
        if (!is_numeric($age)) {
            $errMsg .= "<p>You age must be a number.</p>";
        } else{
            if ($age <18){
                $errMsg .= "<p>Your age must be over 18.";
            }
        }
        
        if ($email=="") {
            $errMsg .= "<p>You must enter your email.</p>";
        }
        if (!preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/",$email)) {
            $errMsg .= "<p>You must enter a valid email.</p>";
        }
    
        if ($street_address=="") {
            $errMsg .= "<p>You must enter your street address.</p>";
        }
        if (!preg_match("/.{1,40}/",$street_address)) {
            $errMsg .= "<p>Maximum 40 characters for your street address.</p>";
        }
    
        if ($suburb=="") {
            $errMsg .= "<p>You must enter your suburb.</p>";
        }
        if (!preg_match("/.{1,20}/",$suburb)) {
            $errMsg .= "<p>Maximum of 20 characters for your suburb.</p>";
        }
    
        if ($post_code=="") {
            $errMsg .= "<p>You must enter your postcode.</p>";
        }
        if (!preg_match("/[0-9]{4}/",$post_code)) {
            $errMsg .= "<p>Exactly four digits for your postcode.</p>";
        }
        function checkPostcode($state, $post_code) {
            $errMsg = "";
            switch ($state) {
                case "vic":
                if (!preg_match("/^[3,8].*$/",$post_code)) {
                    $errMsg = "If you're from VIC your postcode starts with 3 or 8";
                }
                break;
                case "nsw":
                if (!preg_match("/^[1,2].*$/",$post_code)) {
                    $errMsg = "If you're from NSW your postcode starts with 1 or 2";
                }
                break;
                case "qld":
                if (!preg_match("/^[4,9].*$/",$post_code)) {
                    $errMsg = "If you're from QLD your postcode starts with 4 or 9";
                }
                break;
                case "nt":
                if (!preg_match("/^[0].*$/",$post_code)) {
                    $errMsg = "If you're from NT your postcode starts with 0";
                }
                break;
                case "wa":
                if (!preg_match("/^[6].*$/",$post_code)) {
                    $errMsg = "If you're from WA your postcode starts with 6";
                }
                break;
                case "sa":
                if (!preg_match("/^[5].*$/",$post_code)) {
                    $errMsg = "If you're from SA your postcode starts with 5";
                }
                break;
                case "tas":
                if (!preg_match("/^[7].*$/",$post_code)) {
                    $errMsg = "If you're from TAS your postcode starts with 7";
                }
                break;
                case "act":
                if (!preg_match("/^[0].*$/",$post_code)) {
                    $errMsg = "If you're from ACT your postcode starts with 0";
                }
                break;
                default:
                $errMsg = "Please choose a state";
            }
            return $errMsg;
        }
        $errMsg .= checkPostcode($state,$post_code);
    
        if ($phone=="") {
            $errMsg .= "<p>You must enter your phone number.</p>";
        }
        if (!preg_match("/[0-9]{1,10}/",$phone)) {
            $errMsg .= "<p>Maximum of 10 characters for your phone number.</p>";
        }
        if (!is_numeric($phone)) {
            $errMsg .= "<p>You must enter a number for your phone number.</p>";
        }
    
        if ($preferredContact=="") {
            $errMsg .= "<p>You must enter the preffered contact.</p>";
        }
        if ($car=="") {
            $errMsg .= "<p>You must enter the car you want.</p>";
        }
        if ($color=="") {
            $errMsg .= "<p>You must enter the color you want.</p>";
        }
    
        if ($days=="") {
            $errMsg .= "<p>You must enter how many seats you want to book.</p>";
        }
        if ((!is_numeric($days)) || ($days < 0) || (100 < $days)) {
            $errMsg .= "<p>You enter a positive number between 1 and 100 for days.</p>";
        }
    
    
        function calcCost($car, $days){
            $cost = 0;
            switch ($car) {
                case "bmw":
                    $cost = 20 * $days; 
                return $cost;
                case "vios":
                    $cost = 18 * $days;
                return $cost;
                case "vin":
                    $cost = 18 * $days;
                return $cost;
                case "ford":
                    $cost = 18 * $days;
                return $cost;
                default:
                return $cost;
            }
        }
        $cost = calcCost($car, $days);
        if ($bookday == "")
        {
            $errMsg .= "<p>You must enter your preffered date.</p>";
        }
        if (!preg_match("/\d{2}\/\d{2}\/\d{4}/",$bookday)) {
            $errMsg .= "<p>Your prefferd date has to follow the form.</p>";
        }
        if ($card_name=="") {
            $errMsg .= "<p>You must enter your card name.</p>";
        }
        if (!preg_match("/[a-zA-Z]{1,40}/",$card_name)) {
                $errMsg .= "<p>Maximum of 40 characters, alphabetical only for your card name.</p>";
        }
        function checkexpires($expires) {
            $cmm = substr($expires,0,2);
            $cyy = substr($expires,3,5);
            $expires = \DateTime::createFromFormat('my', $cmm.$cyy);
            $now     = new \DateTime();
    
            if ($expires < $now) {
                return "<p>This creditcard has expired</p>";
            }
            else {
                return "";
            }
        }
        $errMsg .= checkexpires($expires);

        function checkCardNumber($card_type, $card_num) {
            $errMsg = "";
            switch ($card_type) {
                case "visa":
                if (!preg_match("/4[0-9]{15}/",$card_num)) {
                    $errMsg = "<p>Visa cards have 16 digits and start with a 4</p>";
                }
                break;
                case "master":
                if (!preg_match("/5[1-5][0-9]{14}/",$card_num)) {
                    $errMsg = "<p>MasterCard have 16 digits and start with digits 51 through to 55</p>";
                }
                break;
                case "amex":
                if (!preg_match("/3[47][0-9]{13}/",$card_num)) {
                    $errMsg = "<p>American Express has 15 digits and starts with 34 or 37</p>";
                }
                break;
                default:
                $errMsg = "<p>Please choose a card type</p>";
            }
            return $errMsg;
        }
        $errMsg .= checkCardNumber($card_type,$card_num);

        if ($cvv=="") {
            $errMsg .= "<p>You must enter your cvv.</p>";
        }
        if(!preg_match("/[0-9]{3}/",$cvv)){
            $errMsg .= "<p>Your cvv is invalid.</p>";
        }

        if ($errMsg != ""){
            $_SESSION["errMsg"] = $errMsg;
            header("location:fix_order.php");
        }
        else {
            require_once ("settings.php");
            $conn = @mysqli_connect($host,$user,$pwd,$sql_db);
    
            if (!$conn) {
                echo "<p>Database connection failure</p>";
            } else {
                $sql_table="hire";
                $create_table = "CREATE TABLE $sql_table(
                                order_id int(11)  NOT  NULL  AUTO_INCREMENT,
                                orderdate timestamp NOT  NULL  DEFAULT CURRENT_TIMESTAMP,
                                firstname varchar(25)  NOT  NULL,
                                lastname varchar(25)  NOT  NULL ,
                                gender enum('male',  'female',  'other')  NOT  NULL ,
                                age int(3) NOT NULL,
                                street_address varchar(40)  NOT  NULL ,
                                suburb varchar(20)  NOT  NULL ,
                                states enum('vic',  'nsw',  'qld',  'nt',  'wa',  'sa',  'tas',  'act')  NOT  NULL ,
                                post_code int(4)  NOT  NULL ,
                                email varchar(255)  NOT  NULL ,
                                phone int(10)  NOT  NULL ,
                                preferredContact enum('mail',  'post',  'phone_number') NOT NULL,
                                car enum('bmw',  'vios',  'vin',  'ford')  NOT  NULL ,
                                color enum('black',  'white',  'navy',  'gray')  NOT  NULL ,
                                dayss int(3)  NOT  NULL ,
                                cost float NOT  NULL ,
                                card_type enum('visa',  'master',  'amex')  NOT  NULL ,
                                card_name varchar(30)  NOT  NULL ,
                                card_num int(16)  NOT  NULL ,
                                expires varchar(5)  NOT  NULL ,
                                order_status enum('PENDING',  'FUFILLED',  'PAID') DEFAULT  'PENDING',
                                PRIMARY  KEY (order_id))";
    
                    $insert_query = "insert into $sql_table (firstname, lastname,gender, age, street_address,suburb,states,post_code, email, phone,preferredContact,car,color,dayss,cost,card_type,card_name,card_num,expires) values ('$firstname','$lastname','$gender','$age','$street_address','$suburb','$state','$post_code','$email','$phone','$preferredContact','$car','$color','$days','$cost','$card_type','$card_name','$card_num','$expires')";
    
                    $tableExistsQuery = "SELECT * FROM $sql_table";
                    $tableExists = mysqli_query($conn, $tableExistsQuery);

                    if(empty($tableExists)) {
                        mysqli_query($conn, $create_table);
                        $result = mysqli_query($conn, $insert_query);
                        if(!$result) {
                            echo "<p class='wrong'>Something is wrong with $preferredContact", $insert_query, "</p>";
                        } else {
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
                            $_SESSION["days"] = $days;
                            $_SESSION["cost"] = calcCost($car,$days);
                            $_SESSION["bookday"] = $bookday;
                            $_SESSION["card_type"] = $card_type;
                            $_SESSION["card_num"] = $card_num;
                            $_SESSION["expires"] = $expires;
                            header("location:receipt.php");
                        }
                    } else {
                        $result = mysqli_query($conn, $insert_query);
                        if(!$result) {
                            echo "<p class='wrong'>Something is wrong  ", $insert_query, "</p>";
                        } else {
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
                            $_SESSION["days"] = $days;
                            $_SESSION["cost"] = calcCost($car,$days);
                            $_SESSION["bookday"] = $bookday;
                            $_SESSION["card_type"] = $card_type;
                            $_SESSION["card_num"] = $card_num;
                            $_SESSION["expires"] = $expires;
                            header("location:receipt.php");
                        }
                    }
            mysqli_close($conn);
            }
        }
    }
    else {
        header("location:enquire.php");
    }
    ?>