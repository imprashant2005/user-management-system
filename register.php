<?php
session_start();
require 'autoload.php';

use App\Models\RegularUser;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new RegularUser("", "", "");
    echo $user->register($_POST['name'], $_POST['email'], $_POST['password']);
}
?>

<h2>Register</h2>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>

<a href="login.php">Go to Login</a>