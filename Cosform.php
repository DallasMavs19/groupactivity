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

    $lastName = $firstName = $middleName = $suffixName = $contactNum = $email = $home = $street = $barangay = $city = "";
    $lastNameErr = $firstNameErr = $middleNameErr = $suffixNameErr = $contactNumErr = $emailErr = $homeErr = $streetErr = $barangayErr = $cityErr = "";


    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $valid_address = "/^[a-zA-Z0-9.,-]*$/";
        $name = "/^[a-zA-Z .,-]*$/";
        $num = "/^[0-9]*$/";

        if(empty($_POST["lastName"])){   #Last name
            $lastNameErr = "Last Name";
        }else {
            $lastName = test_input($_POST["lastName"]);
            if(!preg_match($name, $lastName)){
                $lastNameErr = "Only Alphabets, comma, dash and period are allowed";
            }
        }

        if (empty($_POST["firstName"])) { #First name
            $firstNameErr = "First Name";
        }else {
            $firstName = test_input($_POST["firstName"]);
            if(!preg_match($name, $firstName)){
                $firstNameErr = "Only Alphabets, comma, dash and period are allowed";
            }
        }

        if(empty($_POST["middleName"])){ #Middle name
            $middleNameErr = "Middle Name";
        }else {
            $middleName = test_input($_POST["middleName"]);
            if(!preg_match($name, $middleName)){
                $middleNameErr = "Only Alphabets, comma, dash and period are allowed";
            }
        }

        if(empty($_POST["suffixName"])){
            $suffixNameErr = "Suffix Name";
        }else{
            $suffixName = test_input($_POST["suffixName"]);
            if(preg_match("/^[a-zA-Z .,-]*$/", $suffixName)){
                $suffixNameErr = "Only Alphabets, comma, dash and period are allowed";
            }
        }


        if (empty($_POST["contactNum"])) { #Contact Num
            $contactNumErr = "Contact Number must contain 11 digits";

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
        } else {
            $email = test_input($_POST["email"]);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid email format";
            }
        }

        if(empty($_POST["home"])){ #House
            $homeErr = "";
        } else{
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
 
        if(empty($_POST["barangay"])){ #Barangay
            $barangayErr = "";
        } else {
            $barangay = test_input($_POST["barangay"]);

            if(!preg_match($valid_address, $barangay)){
                $barangayErr = "Invalid format";
            }
        }

        if(empty($_POST["city"])){ #City
            $cityErr = "";
        } else {
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
        <span class="error">* <?php echo $lastNameErr; ?></span>


        First Name: <input type="text" name="firstName" value="<?php echo $firstName;?>">
        <span class = "error" >* <?php echo $firstNameErr; ?></span>


        Middle Name: <input type="text" name="middleName" value="<?php echo $middleName;?>">
        <span class = "error">* <?php echo $middleNameErr; ?> </span>

        Suffix: <input type="text" name="suffixName" value="<?php echo $suffixName;?>">
        <span class="error">* <?php echo $suffixNameErr;?></span>
        <br><br>


        Contact Info: <input type="text" name="contactNum" maxlength="11" value="<?php echo $contactNum;?>">
        <span class = "error">* <?php echo $contactNumErr;?></span>


        Email: <input type="text" name="email" value="<?php echo $email;?>">
        <span class = "error">* <?php echo $emailErr;?></span>
        <br><br>

        House No/Blk,Lot: <input type="text" name="home" value="<?php echo $home?>">
        <span class = "error">* <?php echo $homeErr;?></span>


        Street: <input type="text" name="street" value="<?php echo $street;?>">
        <span class = "error">* <?php echo $streetErr;?></span>


        Barangay: <input type="text" name = "barangay" value="<?php echo $barangay?>">
        <span class = "error">* <?php echo $barangayErr;?></span>

        
        City: <input type="text" name="city" value="<?php echo $city?>">
        <span class = "error">* <?php echo $barangayErr;?></span>
        <br><br>

        <input type="submit" name="submit" value="Register">

        

    </form>
    <?php
    $valid_address = "/^[a-zA-Z0-9 .,-]*$/";
    $name = "/^[a-zA-Z .,-]*$/";
    $num = "/^[0-9]*$/";
    





    if ((preg_match($name, $lastName)) && (preg_match($name, $firstName)) && (preg_match($name, $middleName)) && (preg_match($num, $contactNum)) && 
    (filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match($valid_address, $home))  && (preg_match($valid_address, $street))  && (preg_match($valid_address, $barangay))  
    && (preg_match($valid_address, $city)))  {
        
        echo "<h2>Form Input</h2>";
        echo "<b>Name: </b>". $lastName .", ". $firstName . " " .$middleName. " " . $suffixName;
        echo "<br>";
        echo "<b>Contact No: </b>" .$contactNum. " | " . "<b>Email: </b>" .$email;
        echo "<br>";
        echo "<b>Address: </b>" . $home. " ". $street. " Street, " . " | Barangay " . $barangay. " | City of ". $city;

    }



    ?>
</body>
</html>