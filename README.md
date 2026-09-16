# Projet Web Dynamique - Portail sur le Népal

Site web dynamique et culturel dédié au Népal, développé dans le cadre du module **Techniques Web & Multimédia**.
Le projet combine une vitrine culturelle/touristique riche et une plateforme d'administration dynamique connectée à une base de données MySQL.

---

## Fonctionnalités

- **Vitrine Culturelle :** Présentation de la géographie, des traditions, des festivals et des circuits de trekking au Népal.
- **Espace Actualités :** Consultation d'articles et de dépêches avec filtrage et pagination.
- **Newsletter & Contact :** Formulaire d'inscription des internautes et envoi de messages avec validation.
- **Panneau d'Administration :** Espace sécurisé pour la gestion du contenu (CRUD des actualités, modération des messages, suivi des abonnés).

---

## Technologies Utilisées

- **Frontend :** HTML5, CSS3 (Responsive Design, Flexbox, CSS Grid), JavaScript ES6
- **Backend :** PHP (Architecture modulaire, PDO pour la sécurité SQL)
- **Base de données :** MySQL (Moteur InnoDB, encodage UTF-8)
- **Serveur local :** Apache (XAMPP / WAMP / MAMP)

---

## Installation et Configuration Locale

### 1. Cloner le projet
Placez le projet dans votre répertoire de serveur web (ex: `C:\xampp\htdocs\nepal-website` ou `/var/www/html/nepal-website`) :
```bash
git clone https://github.com/O2S-Y/Nepal_Web_Project.git nepal-website
```

### 2. Configurer la base de données
1. Démarrez les services **Apache** et **MySQL** via votre panneau XAMPP/WAMP.
2. Ouvrez **phpMyAdmin** (`http://localhost/phpmyadmin`).
3. Créez une base de données nommée `nepal_website` avec l'interclassement `utf8_general_ci`.
4. Importez le fichier `database.sql` fourni à la racine du projet.

### 3. Paramètres de connexion
Ouvrez le fichier `config.php` et ajustez si besoin vos identifiants locaux :
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nepal_website');
```

### 4. Accès au site
- **Site public :** `http://localhost/nepal-website/`
- **Administration :** `http://localhost/nepal-website/admin/`
  - *Identifiant par défaut :* `admin`
  - *Mot de passe :* `admin123`

---

## Auteurs

Projet académique réalisé par **Saad Machkour** et **Oussama Yinssi**.