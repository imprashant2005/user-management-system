<?php
namespace App\Core;

abstract class AbstractUser {
    protected $name;
    protected $email;
    protected $password;

    // Constructor
    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;

        // Important: password hashing
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Normal method
    public function getName() {
        return $this->name;
    }

    // Abstract method (must be implemented)
    abstract public function userRole();
}