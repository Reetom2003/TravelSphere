<?php
if(isset($_POST['name'])){
   $server = "localhost:3307";
   $username = "root";
   $password = "Reetom@2003$";
   $database = "destibooking";

   // Establish connection
   $con = mysqli_connect($server, $username, $password, $database);

   // Check if connection succeeded
   if(!$con){
    die("Connection to the database failed due to " . mysqli_connect_error());
   }

   echo "Success connecting to the db";
   
   // Escape special characters in user inputs
   $name = mysqli_real_escape_string($con, $_POST["name"]);
   $email = mysqli_real_escape_string($con, $_POST["email"]);
   $phone_number = mysqli_real_escape_string($con, $_POST["phone_number"]);
   $packages = mysqli_real_escape_string($con, $_POST["packages"]);
   $no_of_person = mysqli_real_escape_string($con, $_POST["no_of_person"]);
   $Checkin_date = mysqli_real_escape_string($con, $_POST["Checkin_date"]);
   $Checkout_date = mysqli_real_escape_string($con, $_POST["Checkout_date"]);

   // Prepare SQL query
   $sql = "INSERT INTO `destipackages` (`name`, `email`, `phone_number`, `packages`, `no_of_person`, `Checkin_date`, `Checkout_date`) 
           VALUES ('$name', '$email', '$phone_number', '$packages', '$no_of_person', '$Checkin_date', '$Checkout_date')";

   // Check if query was successful
   if($con->query($sql) === TRUE){
       header("Location: confirmation1.html"); // Redirect to confirmation page
       exit();
   } else {
       echo "ERROR: $sql <br> $con->error";
   }

   // Close connection
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
            <form action="index4.php" method="POST">

                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="example@gmail.com" required>

                <label for="phone_number">Phone Number:</label>
                <input type="tel" name="phone_number" id="phone_number" placeholder="982*******" required>

                <label for="packages">Package:</label>
                <select name="packages" id="packages" required>
                    <option value="EXPERIENCE THE GREAT HOLIDAY ON BEACH-THAILAND">EXPERIENCE THE GREAT HOLIDAY ON BEACH-THAILAND</option>
                    <option value="JUNGFRAUJOCH-SWITZERLAND">JUNGFRAUJOCH-SWITZERLAND</option>
                    <option value="SANTORINI ISLAND'S WEEKEND VACATION-GREECE">SANTORINI ISLAND'S WEEKEND VACATION-GREECE</option>
                </select>

                <label for="no_of_person">Number of Persons:</label>
                <input type="number" name="no_of_person" id="no_of_person" required max="10">

                <label for="Checkin_date">Check-in Date:</label>
                <input type="date" name="Checkin_date" id="Checkin_date" required>

                <label for="Checkout_date">Check-out Date:</label>
                <input type="date" name="Checkout_date" id="Checkout_date" required>

                <button type="submit">Book Now</button>
            </form>
        </div>
    </div>
</body>
</html>

