-- Crear y seleccionar la base de datos
CREATE DATABASE IF NOT EXISTS tareas_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE tareas_db;

CREATE TABLE IF NOT EXISTS tareas (
  id           INT           NOT NULL AUTO_INCREMENT,
  titulo       VARCHAR(100)  NOT NULL,
  descripcion  TEXT,
  estado       ENUM('pendiente', 'en progreso', 'completada') NOT NULL DEFAULT 'pendiente',
  fecha_limite DATE          NOT NULL,
  created_at   TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tareas (titulo, descripcion, estado, fecha_limite) VALUES
  ('Diseñar la página de inicio',   'Crear el hero, navbar y sección de cursos destacados', 'completada',  '2026-07-10'),
  ('Implementar filtro de cursos',  'Filtrar cards por categoría usando JS puro',            'en progreso', '2026-07-15'),
  ('Crear formulario de contacto',  'Validar campos y mostrar mensajes de error en tiempo real', 'pendiente', '2026-07-20'),
  ('Migrar menú a base de datos',   'Reemplazar el array hardcodeado por consulta MySQL',    'pendiente',   '2026-07-25');
