-- Создание таблиц для проекта practice-register

CREATE TABLE IF NOT EXISTS aregistr (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  secondname VARCHAR(100) NOT NULL,
  phone VARCHAR(50) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  Role VARCHAR(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS acars (
  id INT AUTO_INCREMENT PRIMARY KEY,
  brand VARCHAR(100) NOT NULL,
  model VARCHAR(100) NOT NULL,
  type VARCHAR(100) NOT NULL,
  price DECIMAL(12,2) NOT NULL,
  fuel VARCHAR(50) NOT NULL,
  engine VARCHAR(100) NOT NULL,
  horsepower INT NOT NULL,
  transmission VARCHAR(100) NOT NULL,
  drive_type VARCHAR(100) NOT NULL,
  body_type VARCHAR(100) NOT NULL,
  year INT NOT NULL,
  acceleration VARCHAR(100) NOT NULL,
  consumption VARCHAR(100) NOT NULL,
  color VARCHAR(100) NOT NULL,
  stock_count INT NOT NULL,
  city VARCHAR(100) NOT NULL,
  image VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Таблица user_carts создаётся автоматически при работе проекта.
