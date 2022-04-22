<?php
$insert = false;
    if(isset($_POST['name'])){

    // set connection variables
    $server ="localhost";
    $username ="root";
    $password ="";

    // create a database connection
    $con = mysqli_connect($server, $username, $password);

    // check for connection success
    if(!$con){
        die("connection to the server failed due to " . mysqli_connect_error());
    }
    // echo"Success connecting to the db";

    // collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $sql = "INSERT INTO `trips` . `trip` (`name`, `age`, `gender`, `email`, `phone`, `description`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$description', current_timestamp());";
    // echo $sql;

    // execute the query
    if($con->query($sql)==true){
        // echo "Successfully inserted";
        
        // flag for successful insertion
        $insert = true;
    }
    else{
        echo"ERRROR: $sql <br> $con->error";
    }

    // close the connection
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel_Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bgg" src="bg.jpg" alt="backgroud_picture">
    <div class="container">
        <h1>Welcome to Explorer Den Trip Form</h1>
        <p>Enter  your details to confirm your participation in trip</p>
        <?php
        if($insert==true){
        echo"<p class='submitMsg'>Thanks for choosing us, we look forward to your amazing trip with us</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="phone" name="phone" id="phone" placeholder="enter your phone">
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>     