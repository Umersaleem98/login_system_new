<?php

include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        width: 400px;
    }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Login</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <!-- <button type="submit" class="btn btn-primary">SignUp</button> -->
                <a href="register.php" class="btn btn-Success">SignUp</a>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $user_type = $row['user_type'];

        // Check user type to redirect accordingly
        if ($user_type == 'admin') {
            $_SESSION['email'] = $email;
            $_SESSION['user_type'] = $user_type;
            header("location: Admindashboard.php"); // Redirect to admin dashboard after successful login
        } elseif ($user_type == 'user') {
            $_SESSION['email'] = $email;
            $_SESSION['user_type'] = $user_type;
            header("location: userdashboard.php"); // Redirect to user dashboard after successful login
        } else {
            echo "Invalid user type";
        }
    } else {
        // Login failed
        echo "Invalid username or password";
    }
}

?>
