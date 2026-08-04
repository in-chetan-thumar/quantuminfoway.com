-- Migration for existing databases (run once)
USE test_quantuminfoway;

CREATE TABLE IF NOT EXISTS career_applications (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL,
  phone VARCHAR(40) NOT NULL,
  position VARCHAR(80) NOT NULL,
  experience VARCHAR(40) NOT NULL,
  linkedin VARCHAR(255) NULL,
  portfolio VARCHAR(255) NULL,
  city VARCHAR(80) NULL,
  message TEXT NOT NULL,
  cv_path VARCHAR(255) NOT NULL,
  cv_original_name VARCHAR(255) NOT NULL,
  ip VARCHAR(45) NULL,
  mail_sent TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
