<?php

class User {
    // Properties
    public string $name;
    public string $email;

    // Constructor (PHP 8 Constructor Property Promotion makes this even cleaner, but we'll use the classic way for clarity first)
    public function __construct(string $name, string $email) {
        $this->name = $name;
        $this->email = $email;
    }

    // Method
    public function getProfile(): string {
        return "User: {$this->name} ({$this->email})";
    }
}

// Creating an Object (Instance)
$user1 = new User("Dhruv Rana", "dhruv@example.com");
echo $user1->getProfile();