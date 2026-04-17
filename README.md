# Application de gestion de réservations

## 📌 Description

Ce projet est une application simple de gestion de réservations développée avec Laravel.
Elle permet aux utilisateurs authentifiés de créer, consulter, modifier et supprimer leurs réservations.

---

## 🚀 Fonctionnalités

* Authentification des utilisateurs
* Création, modification et suppression de réservations
* Gestion des créneaux horaires par intervalles de 30 minutes
* Validation des données et prévention des doublons

---

## 🛠️ Technologies utilisées

* PHP / Laravel
* Blade
* MySQL
* Docker (Laravel Sail)

---

## ⚙️ Installation

### 🐳 Avec Docker (Laravel Sail)

1. Cloner le dépôt :

```bash
git clone https://github.com/sys-cuculus/reservation.git
cd reservation
```

2. Installer les dépendances (via Docker) :

```bash
docker run --rm \
    -v $(pwd):/app \
    composer install
```

3. Configurer l'environnement :

```bash
cp .env.example .env
```

4. Démarrer les conteneurs :

```bash
./vendor/bin/sail up -d
```

5. Générer la clé de l'application et exécuter les migrations :

```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
```

---

### 💻 Sans Docker

1. Cloner le dépôt :

```bash
git clone https://github.com/sys-cuculus/reservation.git
cd reservation
```

2. Installer les dépendances :

```bash
composer install
```

3. Configurer l'environnement :

```bash
cp .env.example .env
php artisan key:generate
```

4. Configurer la base de données dans le fichier `.env`

5. Exécuter les migrations :

```bash
php artisan migrate
```

6. Lancer le serveur local :

```bash
php artisan serve
```

---


## 🌱 Données de test (Seeder)

Des données de démonstration peuvent être générées pour faciliter les tests de l'application.

### 1. Exécuter les seeders

Avec Docker (Laravel Sail) :

```bash
./vendor/bin/sail artisan db:seed
```

Sans Docker :

```bash
php artisan db:seed
```

---

### 2. Exemple de données générées

Le seeder crée :

* Des restaurants
* Des créneaux de réservation associés

Ces données permettent de tester rapidement les fonctionnalités sans configuration manuelle.

---

### 3. Option : migration + seed en une commande

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

ou

```bash
php artisan migrate:fresh --seed
```

⚠️ Cette commande supprime toutes les données existantes.

---

## ⚠️ Remarques

* Le dossier `vendor` n’est pas inclus dans le dépôt.
* Veuillez exécuter `composer install` avant de démarrer l’application.

---

## 🎯 Objectif du projet

Ce projet a pour but de démontrer :

* Le développement backend avec Laravel
* La gestion de l’authentification
* La validation des données et la logique métier
* Une structure de code claire et maintenable

---

## 👤 Auteur

https://github.com/sys-cuculus
