-- Base de données: nepal_website
CREATE DATABASE IF NOT EXISTS nepal_website DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE nepal_website;

-- Table: news (actualités de la newsletter)
CREATE TABLE news (
    news_id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    resume TEXT NOT NULL,
    contenu TEXT NOT NULL,
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    image_url VARCHAR(500) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table: internaute (abonnés à la newsletter)
CREATE TABLE internaute (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actif TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table: admin (pour l'authentification)
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table: contact (messages du formulaire de contact)
CREATE TABLE contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    sujet VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lu TINYINT(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insertion de l'administrateur par défaut
-- Mot de passe: admin123 (sera hashé automatiquement au premier login)
INSERT INTO admin (username, password, email) VALUES 
('admin', 'admin123', 'admin@nepal-website.com');

-- Insertion de données de démonstration
INSERT INTO news (titre, resume, contenu) VALUES 
('Festival de Dashain à Katmandou', 'Le plus grand festival hindou du Népal célébré avec ferveur', 'Le festival de Dashain, également connu sous le nom de Vijaya Dashami, est le festival le plus important et le plus attendu du Népal. Pendant 15 jours, les Népalais rendent hommage à la déesse Durga...'),
('Nouvelle saison de trekking dans l\'Annapurna', 'Les sentiers de l\'Annapurna rouvrent après la mousson', 'La saison automnale marque le début de la période idéale pour le trekking dans la région de l\'Annapurna. Les conditions météorologiques sont optimales avec un ciel dégagé offrant des vues spectaculaires sur les sommets enneigés...'),
('Exposition d\'art Newar à Patan', 'Découverte de l\'art traditionnel de la vallée de Katmandou', 'Le musée de Patan accueille une exposition exceptionnelle sur l\'art Newar, mettant en valeur les compétences artistiques ancestrales de cette communauté. Sculptures sur bois, peintures Thanka, et artefacts religieux sont présentés...');

INSERT INTO internaute (nom, prenom, email) VALUES 
('Dupont', 'Jean', 'jean.dupont@email.com'),
('Martin', 'Sophie', 'sophie.martin@email.com');

-- Création des indexes
CREATE INDEX idx_news_date ON news(date_publication);
CREATE INDEX idx_internaute_email ON internaute(email);