<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Registration Form</title>
    <style> .error {color: red;}</style>
</head>
<body>
    <?php

    $lastName = $firstName = $middleName = $suffixName = $contactNum = $email = $home = $street = $brgy = $city = "";
    $lastNameErr = $firstNameErr = $middleNameErr = $suffixNameErr = $contactNumErr = $emailErr = $homeErr = $streetErr = $brgyErr = $cityErr = "";


    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $valid_address = "/^[a-zA-Z0-9 .,-]*$/";
        $name = "/^[a-zA-Z .,-]*$/";
        $num = "/^[0-9]*$/";

        if(empty($_POST["lastName"])){   #Last name
            $lastNameErr = "Last Name";
        }else {
            $lastName = test_input($_POST["lastName"]);
            if(!preg_match($name, $lastName)){
                $lastNameErr = "Only Alphabets and white spaces are allowed";
            }
        }

        if (empty($_POST["firstName"])) { #First name
            $firstNameErr = "First Name";
        }else {
            $firstName = test_input($_POST["firstName"]);
            if(!preg_match($name, $firstName)){
                $firstNameErr = "Only Alphabets and white spaces are allowed";
            }
        }

        if(empty($_POST["middleName"])){ #Middle name
            $middleNameErr = "Middle Name";
        }else {
            $middleName = test_input($_POST["middleName"]);
            if(!preg_match($name, $middleName)){
                $middleNameErr = "Only Alphabets and white spaces are allowed";
            }
        }

        if(empty($_POST["suffixName"])){   #Suffix
            $suffixNameErr = "";
        }else {
            $suffixName = test_input($_POST["suffixName"]);
            if(!preg_match($name, $suffixName)){
                $suffixNameErr = "";
            }
        }

        if (empty($_POST["contactNum"])) { #Contact Num
            $contactNumErr = "Mobile No. is required";

        }else {
            $contactNum = test_input($_POST["contactNum"]);
            if(!preg_match($num, $contactNum)){
                $contactNumErr = "Only numeric value is allowed";
            }   
        if(strlen($contactNum)!=11){
            $contactNumErr = "Contact Number must contain 11 digits";
        }

        }

        if(empty($_POST["email"])){ #Email
            $emailErr = "Email is required";
        }else {
            $email = test_input($_POST["email"]);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid email format";
            }
        }

        if(empty($_POST["home"])){ #House
            $homeErr = "";
        }else {
            $home = test_input($_POST["home"]);

            if(!preg_match($valid_address, $home)){
                $homeErr = "Invalid format";

            }
        }

        if(empty($_POST["street"])){ #Street
            $streetErr = "";
        }else {
            $street = test_input($_POST["street"]);

            if(!preg_match($valid_address, $street)){
                $streetErr = "Invalid format";

            }
        }

    
        if(empty($_POST["brgy"])){ #Barangay
            $brgyErr = "";
        }else {
            $brgy = test_input($_POST["brgy"]);

            if(!preg_match($valid_address, $brgy)){
                $brgyErr = "Invalid format";
            }
        }

        if(empty($_POST["city"])){ #City
            $cityErr = "";
        }else {
            $city = test_input($_POST["city"]);

            if(!preg_match($valid_address, $city)){
                $cityErr = "Invalid format";

            }
        }

    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>PHP Registration form</h2>
    <p><span class = "error">* Required field</span></p>
    <form method = "POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        Last Name: <input type="text" name="lastName" value="<?php echo $lastName;?>"> 
        <span class= "error">* <?php echo $lastNameErr; ?></span>
        

        First Name: <input type="text" name="firstName" value="<?php echo $firstName;?>">
        <span class = "error" >* <?php echo $firstNameErr; ?></span>
        

        Middle Name: <input type="text" name="middleName" value="<?php echo $middleName;?>">
        <span class = "error">* <?php echo $middleNameErr; ?> </span>
        

        Suffix: <input type="text" name="suffixName" value="<?php echo $suffixName;?>">
        <?php echo $suffixNameErr; ?> </span>
        <br><br>

        Mobile No.: <input type="number" name="contactNum" value=" <?php echo $contactNum;?>">
        <span class = "error">* <?php echo $contactNumErr;?></span>
        

        Email: <input type="text" name="email" value="<?php echo $email;?>">
        <span class = "error">* <?php echo $emailErr;?></span>
        <br><br>
        
        House No/Blk,Lot: <input type="text" name="home" value="<?php echo $home;?>">
        <span class = "error">* <?php echo $homeErr;?></span>
         

        Street: <input type="text" name="street" value="<?php echo $street;?>">
        <span class = "error">* <?php echo $streetErr;?></span>
        

        Barangay: <input type="text" name = "brgy" value="<?php echo $brgy;?>">
        <span class = "error">* <?php echo $brgyErr;?></span>
    
        
        City: <input type="text" name="city" value="<?php echo $city;?>">
        <span class = "error">* <?php echo $cityErr;?></span>
        <br><br>

        <input type="submit" name="submit" value="Register">

        

</form>
    <?php
   if ((preg_match("/^[a-zA-Z .,-]*$/", $lastName)) && (preg_match("/^[a-zA-Z .,-]*$/", $firstName)) && (preg_match("/^[a-zA-Z .,-]*$/", $middleName)) && (preg_match("/^[0-9]*$/", $contactNum)) && (filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[a-zA-Z0-9 .,-]*$/", $home))
   && (preg_match("/^[a-zA-Z0-9 .,-]*$/", $street)) && (preg_match("/^[a-zA-Z0-9 .,-]*$/", $brgy)) && (preg_match("/^[a-zA-Z0-9 .,-]*$/", $city)))
    ?>

    <?php
    
    echo "<h2>Registered Successfully!</h2>";
    echo $lastName . "," . " " . $firstName . " " .$middleName . " " .$suffixName;
    echo "<br>";
    echo "Contact No. " .$contactNum;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $home. " " . $street. " Street, " . $city . " Barangay" . " " . $brgy;    
    
    
    
    ?>
</body>
</html>