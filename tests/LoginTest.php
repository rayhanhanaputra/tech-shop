<?php
require 'login.php'; // Ganti dengan nama file Anda

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testUserAuthenticationSuccess()
    {
        $connectionMock = $this->createMock(mysqli::class);
        $connectionMock->method('query')->willReturn(new class {
            public $num_rows = 1;
            public function fetch_assoc() {
                return ['nama' => 'John Doe', 'id' => 1, 'password' => 'password123'];
            }
        });

        $this->assertEquals([
            'isLogin' => true,
            'name' => 'John Doe',
            'clientID' => 1
        ], authenticateUser('john@example.com', 'password123', $connectionMock));
    }

    public function testUserAuthenticationFailure()
    {
        $connectionMock = $this->createMock(mysqli::class);
        $connectionMock->method('query')->willReturn(new class {
            public $num_rows = 0;
        });

        $this->assertEquals('Login failed', authenticateUser('john@example.com', 'wrongpassword', $connectionMock));
    }
}
?>
