<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include("layout/navbar.php");
?>

    <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

    if (isset($_SESSION['email'])) {
        // If the user is logged in, display the username
        $email = $_SESSION['email']; // Assuming 'email' is the session key for the username
        echo '<p>Welcome, ' . $email . '</p>';
    } else {
        // If the user is not logged in, redirect to the login page
        header("Location: login.php");
        exit();
    }
    ?>

    <!-- Dashboard content goes here -->
    <!-- ... -->

    </div>


    <center>
        <h1>Welcome User dahboard</h1>
    </center>
</body>

</html>
