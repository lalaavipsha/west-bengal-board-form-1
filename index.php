<?php
$insert = false;
if (isset($_POST['name'])) {
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "Success connecting to the db";
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $marks = $_POST['marks'];
    $division = $_POST['division'];
    $sql = "INSERT INTO `student_details`.`details` (`name`, `roll`, `marks`, `division`) VALUES ('$name', '$roll','$marks', '$division');";

    // echo $sql;

    // Execute the query
    if ($con->query($sql) == true) {
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to West-Bengal Board marks entry</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styel.css">
</head>

<body>
    <div class="container">
        <h1>Welcome to West-Bengal Board data entry column</h1>
        <p>Enter your details and submit this form to obtain your results. </p>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your form.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="roll" id="roll" placeholder="Enter your Roll">
            <input type="number" name="marks" id="marks" placeholder="Enter your Marks">
            <input type="number" name="division" id="division" placeholder="Enter your Division">
            <!-- <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea> -->
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `details` (`sno.`, `name`, `roll`, `marks`, `division`) VALUES ('1', 'sankarsan', '13005319001', '88', '1'); -->
</body>

</html>