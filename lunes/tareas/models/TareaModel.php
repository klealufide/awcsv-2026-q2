<?php


require_once __DIR__ . '/../config/database.php';

class TareaModel
{
    private PDO $db;

    public function __construct()
    {
        // Obtener la conexión compartida
        $this->db = Database::getConnection();
    }

    // ────────────────────────────────────────────────────────
    //  READ — Obtener todos los registros
    // ────────────────────────────────────────────────────────
    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT * FROM tareas ORDER BY fecha_limite ASC'
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // retorna array de arrays asociativos
    }

    // ────────────────────────────────────────────────────────
    //  READ — Obtener un registro por ID
    // ────────────────────────────────────────────────────────
    public function getById(int $id): array|false
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM tareas WHERE id = :id'
        );
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // ────────────────────────────────────────────────────────
    //  CREATE — Insertar nuevo registro
    // ────────────────────────────────────────────────────────
    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO tareas (titulo, descripcion, estado, fecha_limite)
             VALUES (:titulo, :descripcion, :estado, :fecha_limite)'
        );

        return $stmt->execute([
            ':titulo'       => $data['titulo'],
            ':descripcion'  => $data['descripcion'],
            ':estado'       => $data['estado'],
            ':fecha_limite' => $data['fecha_limite'],
        ]);
    }

    // ────────────────────────────────────────────────────────
    //  UPDATE — Actualizar registro existente
    // ────────────────────────────────────────────────────────
    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE tareas
             SET titulo = :titulo,
                 descripcion = :descripcion,
                 estado = :estado,
                 fecha_limite = :fecha_limite
             WHERE id = :id'
        );

        return $stmt->execute([
            ':titulo'       => $data['titulo'],
            ':descripcion'  => $data['descripcion'],
            ':estado'       => $data['estado'],
            ':fecha_limite' => $data['fecha_limite'],
            ':id'           => $id,
        ]);
    }

    // ────────────────────────────────────────────────────────
    //  DELETE — Eliminar registro
    // ────────────────────────────────────────────────────────
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            'DELETE FROM tareas WHERE id = :id'
        );
        return $stmt->execute([':id' => $id]);
    }
}
