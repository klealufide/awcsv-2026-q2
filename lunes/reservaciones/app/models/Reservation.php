<?php
class Reservation
{
    private PDO $conn;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function getAll(): array
    {
        $stmt = $this->conn->query(
            'SELECT * FROM reservations ORDER BY reservation_date'
        );
        return $stmt->fetchAll();
    }

    public function create(string $name, string $date, int $people, string $comments): bool
    {
        $stmt = $this->conn->prepare(
            'INSERT INTO reservations (name, reservation_date, people, comments)
             VALUES (?, ?, ?, ?)'
        );
        return $stmt->execute([$name, $date, $people, $comments]);
    }
}