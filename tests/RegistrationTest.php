<?php
require 'register.php'; // Masukkan nama file yang Anda simpan kode PHP

use PHPUnit\Framework\TestCase;

class RegistrationTest extends TestCase
{
    public function testInputValidation()
    {
        // Test valid input
        $this->assertTrue(validateRegistrationInput('John Doe', 'john@example.com', 'password123', 'password123'));

        // Test invalid input
        $this->assertFalse(validateRegistrationInput('J', 'invalid_email', 'short', 'password123'));
    }

    public function testUserRegistration()
    {
        // Simulate registration attempt with existing email
        $this->assertEquals('E-mail telah terdaftar di sistem', registerUser('John Doe', 'john@example.com', 'password123'));

        // Simulate successful registration
        $this->assertEquals('success', registerUser('New User', 'new@example.com', 'password123'));

    }
}
