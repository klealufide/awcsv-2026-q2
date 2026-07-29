CREATE DATABASE IF NOT EXISTS reservaciones_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE reservaciones_db;

-- ── Tabla de usuarios ─────────────────────────────────────
CREATE TABLE users (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  username   VARCHAR(80)  NOT NULL UNIQUE,
  password   VARCHAR(255) NOT NULL,
  rol        ENUM('admin', 'user') NOT NULL DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ── Tabla de reservaciones ────────────────────────────────
CREATE TABLE reservations (
  id               INT AUTO_INCREMENT PRIMARY KEY,
  name             VARCHAR(120) NOT NULL,
  reservation_date DATE         NOT NULL,
  people           INT          NOT NULL,
  comments         TEXT,
  created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ── Usuario de prueba (password: 12345) ────────────────
INSERT INTO users (username, password, rol)
VALUES (
  'admin',
  '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
  'admin'
);