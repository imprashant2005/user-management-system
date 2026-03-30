<?php
session_start();
require 'autoload.php';

use App\Models\RegularUser;

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new RegularUser("", "", "");
    $message = $user->login($_POST['email'], $_POST['password']);
}
?>

<style>
body {
    font-family: Arial;
    background: #f2f2f2;
}
.container {
    width: 300px;
    margin: 100px auto;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0px 0px 10px gray;
}
input, button {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
}
button {
    background: blue;
    color: white;
    border: none;
    cursor: pointer;
}
.error {
    color: red;
    text-align: center;
}
</style>

<div class="container">
    <h2>Login</h2>

    <!-- 🔴 Error Message -->
    <?php if ($message) echo "<p class='error'>$message</p>"; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>
    </form>

    <a href="register.php">Go to Register</a>
</div>