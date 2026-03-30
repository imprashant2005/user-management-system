public function login($email, $password) {
    $db = new \App\Core\Database();
    $conn = $db->connect();

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['email'];
        return "User login successful";
    }

    return "Invalid credentials";
}