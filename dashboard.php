<?php
session_start();

// PROTECTION (IMPORTANT)
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Dashboard</h2> // Version 2 update

<p>Welcome: <?php echo $_SESSION['user']; ?></p>

<a href="logout.php">Logout</a>