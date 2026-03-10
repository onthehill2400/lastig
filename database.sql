-- Database aanmaken
CREATE DATABASE IF NOT EXISTS klantonderhoud;
USE klantonderhoud;

-- Login tabel
CREATE TABLE Login_File (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gebruikersnaam VARCHAR(50) NOT NULL,
    wachtwoord VARCHAR(255) NOT NULL,
    rol VARCHAR(10) NOT NULL
);

-- Klant tabel
CREATE TABLE Klant_File (
    id INT AUTO_INCREMENT PRIMARY KEY,
    voornaam VARCHAR(50) NOT NULL,
    achternaam VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefoon VARCHAR(20),
    adres VARCHAR(150),
    woonplaats VARCHAR(50),
    login_id INT,
    FOREIGN KEY (login_id) REFERENCES Login_File(id)
);

-- Test data invoegen
INSERT INTO Login_File (gebruikersnaam, wachtwoord, rol) VALUES
('admin', 'admin123', 'admin'),
('klant1', 'klant123', 'klant'),
('klant2', 'klant123', 'klant');

INSERT INTO Klant_File (voornaam, achternaam, email, telefoon, adres, woonplaats, login_id) VALUES
('Jan', 'de Vries', 'jan@email.nl', '06-12345678', 'Hoofdstraat 1', 'Amsterdam', 2),
('Piet', 'Bakker', 'piet@email.nl', '06-87654321', 'Kerkweg 5', 'Rotterdam', 3);
