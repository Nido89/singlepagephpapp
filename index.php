<?php

$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";


    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("connection to db failed due to " . mysqli_connect_error());
    }

    //echo "Success connecting to the DB";
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    //echo $sql;

    if ($con->query($sql) == true) {
        //echo "Successfully inserted";
        $insert = true;
    } 
    else {
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
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Rosario:ital,wght@1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to KPS</title>
</head>

<body>
    <img class="bg" src="./images/bg.jpg" alt="Kerava Car Style" srcset="">

    </div>
    <div class="container">
        <h1>Welcome Kerava Styling School</h1>
        <p>Enter your Details to Continue</p>

        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting form.We are happy that you are joing us.</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name here">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Your Gender Please">
            <input type="email" name="email" id="email" placeholder="Your correct email Plz">
            <input type="number" name="phone" id="phone" placeholder="Your Correct Phone Number Please">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other relevant info here"></textarea>
            <button class="btn">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>