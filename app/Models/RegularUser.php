<?php
namespace App\Models;

use App\Core\AbstractUser;
use App\Core\AuthInterface;
use App\Core\Database;

class RegularUser extends AbstractUser implements AuthInterface {

    public function userRole() {
        return "User";
    }

    public function register($name, $email, $password) {
    $db = new Database();
    $conn = $db->connect();

    // 🔴 CHECK IF EMAIL EXISTS
    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->execute([$email]);

    if ($check->rowCount() > 0) {
        return "Email already exists!";
    }

    // ✅ INSERT NEW USER
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $hashedPassword, "User"]);

    return "User registered successfully";
}

    public function login($email, $password) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['email'];
            header("Location: dashboard.php");
            exit();
        }

        return "Invalid credentials";
    }

    public function logout() {
        session_destroy();
        return "User logged out";
    }
}