<?php

if(isset($_POST['name'])){
   $server = "localhost:3307";
   $username = "root";
   $password = "Reetom@2003$";


   $con = mysqli_connect($server, $username, $password);

   if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
   }

   //echo "Success connecting to the db";
   
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $destination = $_POST["destination"];
    $no_of_person = $_POST["no_of_person"];
    $Checkin_date = $_POST["Checkin_date"];
    $Checkout_date = $_POST["Checkout_date"];

    //prepare and execute the database insertion
    $sql = "INSERT INTO `destibooking`.`destination` ( `name`, `email`, `phone_number`, `destination`, `no_of_person`, `Checkin_date`, `Checkout_date`) VALUES ( '$name', ' $email', '$phone_number', '$destination ', '$no_of_person', '$Checkin_date', '$Checkout_date')";
    
    echo $sql;

    /*if($con->query($sql) == true){
        echo "Succesfully inserted";
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}  
?>*/
if($con->query($sql) === TRUE){
    header("Location: confirmation.html");
    exit();
} else {
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Booking Form</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="background">
        <div class="booking-form">
            <h2>Travel Booking Form</h2>
            <form action="index3.php" method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email"  placeholder="abc@gmail.com" required>

                <label for="phone_number">Phone Number:</label>
                <input type="phone" name="phone_number" id="phone_number"  placeholder="982*******" required>
                <label for="destination">Destination:</label>
                <select name="destination" id="destination" required>
                <option value="Italy-San Miguel">Italy-San Miguel</option>
                <option value="Dubai-Burj Khalifa">Dubai-Burj Khalifa</option>
                <option value="Japan-Kyota Temple">Japan-Kyota Temple</option>
                <option value="Maldives-Mafushi">Maldives-Mafushi</option>
                </select>

                <!--<label for="destination">Destination:</label>
                <select>
                    <option>Italy-San Miguel</option>
                    <option>Dubai-Burj Khalifa</option>
                    <option>Japan-Kyota Temple</option>
                    <option>Maldives-Mafushi</option>

                </select>-->
                <!--<input type="text" name="destination" id="destination" required>-->

                <label for="no_of_person">No of Person:</label>
                <input type="number" name="no_of_person" id="no_of_person" required>

                <label for="Checkin_date">Checkin Date:</label>
                <input type="date" name="Checkin_date" id="Checkin_date" required>

                <label for="Checkout_date">Checkout Date:</label>
                <input type="date" name="Checkout_date" id="Checkout_date" required>

                <button type="submit">Book Now</button>

            </form>
        </div>
    </div>
    
</body>
</html>