<?php
namespace App\Services;

use App\Core\AuthInterface;

class AuthService {

    // This method accepts any user (Admin or RegularUser)
    public function authenticate(AuthInterface $user, $email, $password) {
        return $user->login($email, $password);
    }
}