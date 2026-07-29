<?php
class User
{
    private PDO $conn;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function login(string $username): array|false
    {
        $stmt = $this->conn->prepare(
            'SELECT * FROM users WHERE username = ? LIMIT 1'
        );
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function usernameExists(string $username): bool
    {
        $stmt = $this->conn->prepare(
            'SELECT id FROM users WHERE username = ? LIMIT 1'
        );
        $stmt->execute([$username]);
        return $stmt->rowCount() > 0;
    }

    public function register(string $username, string $password, string $rol = 'user'): bool
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare(
            'INSERT INTO users (username, password, rol) VALUES (?, ?, ?)'
        );
        return $stmt->execute([$username, $hash, $rol]);
    }
}