
<?php
echo "START<br>";

session_start();

require 'autoload.php';

use App\Models\RegularUser;

$user = new RegularUser("Test", "test@gmail.com", "1234");

echo "Before Register<br>";

echo $user->register("Test", "test@gmail.com", "1234");

echo "<br>END";
?>