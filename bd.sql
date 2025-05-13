-- Tabla de usuarios (incluye datos personales)
CREATE TABLE usuarios (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL,
  clave VARCHAR(255) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  email VARCHAR(100),
  telefono VARCHAR(20),
  tipo ENUM('docente', 'alumno', 'externo') DEFAULT 'docente',
  esAdmin TINYINT(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de espacios
CREATE TABLE espacios (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT,
  capacidad INT DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de reservas
CREATE TABLE reservas (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  espacio_id INT NOT NULL,
  curso VARCHAR(45),
  materia VARCHAR(45),
  horario_inicio TIME NOT NULL,
  horario_fin TIME NOT NULL,
  fecha DATE NOT NULL,
  info VARCHAR(100) NOT NULL,
  materiales TEXT,
  estado ENUM('pendiente', 'aprobada', 'rechazada') DEFAULT 'pendiente',
  FOREIGN KEY (usuario_id) REFERENCES usuarios(ID) ON DELETE CASCADE,
  FOREIGN KEY (espacio_id) REFERENCES espacios(ID) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;