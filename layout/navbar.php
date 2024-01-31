<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    // Check if the last activity timestamp is set
    if (isset($_SESSION['last_activity'])) {
        // Check if the user has been inactive for more than 5 minutes (300 seconds)
        $inactiveTime = time() - $_SESSION['last_activity'];
        if ($inactiveTime > 300x    ) {
            // User has been inactive for too long, log them out
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
        }
    }

    // Update the last activity timestamp
    $_SESSION['last_activity'] = time();
}
?>

<!-- Your existing navbar code -->



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <!-- Replace 'Your Logo' with your actual logo image or text -->
        Your Logo
    </a>

    <!-- Toggle button for mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['email'])) {
    // If the user is logged in, display the logout link
    echo '<a class="nav-link" href="logout.php">Logout</a>';
} else {
    // If the user is not logged in, display the login link
    echo '<a class="nav-link" href="login.php">Login</a>';
}
?>
            </li>
        </ul>
    </div>
</nav>
