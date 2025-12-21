-- Schema base per gli esercizi
-- Database: esercizi_php

-- Creazione database
CREATE DATABASE IF NOT EXISTS esercizi_php CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE esercizi_php;

-- Tabella studenti (esempio per gli esercizi)
CREATE TABLE IF NOT EXISTS studenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cognome VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    data_nascita DATE,
    citta VARCHAR(50),
    corso VARCHAR(50),
    creato_il TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modificato_il TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella corsi
CREATE TABLE IF NOT EXISTS corsi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descrizione TEXT,
    durata_ore INT,
    docente VARCHAR(100),
    creato_il TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabella iscrizioni (relazione studenti-corsi)
CREATE TABLE IF NOT EXISTS iscrizioni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studente_id INT NOT NULL,
    corso_id INT NOT NULL,
    data_iscrizione DATE NOT NULL,
    voto DECIMAL(4,2),
    stato ENUM('attivo', 'completato', 'ritirato') DEFAULT 'attivo',
    FOREIGN KEY (studente_id) REFERENCES studenti(id) ON DELETE CASCADE,
    FOREIGN KEY (corso_id) REFERENCES corsi(id) ON DELETE CASCADE,
    UNIQUE KEY iscrizione_unica (studente_id, corso_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dati di esempio per gli esercizi
INSERT INTO studenti (nome, cognome, email, data_nascita, citta, corso) VALUES
('Mario', 'Rossi', 'mario.rossi@email.com', '2000-05-15', 'Roma', 'Informatica'),
('Laura', 'Bianchi', 'laura.bianchi@email.com', '1999-08-22', 'Milano', 'Informatica'),
('Giuseppe', 'Verdi', 'giuseppe.verdi@email.com', '2001-03-10', 'Napoli', 'Ingegneria'),
('Sofia', 'Russo', 'sofia.russo@email.com', '2000-11-30', 'Torino', 'Informatica'),
('Alessandro', 'Ferrari', 'alessandro.ferrari@email.com', '1998-07-18', 'Firenze', 'Matematica');

INSERT INTO corsi (nome, descrizione, durata_ore, docente) VALUES
('PHP Base', 'Introduzione al linguaggio PHP', 40, 'Prof. Giovanni Neri'),
('Database MySQL', 'Fondamenti di database e SQL', 50, 'Prof. Maria Conti'),
('Sviluppo Web', 'HTML, CSS e JavaScript', 60, 'Prof. Luca Martini'),
('PHP Avanzato', 'Programmazione PHP avanzata', 45, 'Prof. Giovanni Neri');

INSERT INTO iscrizioni (studente_id, corso_id, data_iscrizione, voto, stato) VALUES
(1, 1, '2024-01-15', 28.50, 'completato'),
(1, 2, '2024-02-01', NULL, 'attivo'),
(2, 1, '2024-01-15', 30.00, 'completato'),
(2, 3, '2024-02-15', NULL, 'attivo'),
(3, 2, '2024-01-20', 25.00, 'completato'),
(4, 1, '2024-01-15', NULL, 'attivo'),
(5, 4, '2024-03-01', NULL, 'attivo');
