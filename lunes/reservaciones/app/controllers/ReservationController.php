<?php
session_start();

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Reservation.php';

class ReservationController
{
    private Reservation $model;

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }

        $database = new Database();
        $this->model = new Reservation($database->connect());
    }

    public function index(): void
    {
        require __DIR__ . '/../views/reservations/index.php';
    }

    public function getReservation(): void
    {
        $reservations = $this->model->getAll();
        echo json_encode(["reservations" => $reservations]);
    }

    public function store(): void
    {
        try {
            $name     = $_POST['name'];
            $date     = $_POST['reservation_date'];
            $people   = (int) $_POST['people'];
            $comments = $_POST['comments'];

            $this->model->create($name, $date, $people, $comments);

            echo json_encode(["response" => "00"]);
        } catch (Exception $e) {
            echo json_encode(["response" => "01", "message" => $e->getMessage()]);
        }
    }
}