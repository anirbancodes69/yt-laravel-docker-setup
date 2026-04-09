# 🚀 Laravel + MySQL with Docker (No Local Setup)

Run Laravel inside Docker using PHP-FPM and MySQL — no need to install PHP, Composer, or MySQL locally.

---

## 📦 Tech Stack

* Laravel
* Docker & Docker Compose
* PHP 8.3 (FPM)
* MySQL

---

## 🎯 Features

* ✅ No local PHP or Composer required
* ✅ Isolated development environment
* ✅ MySQL with persistent volume
* ✅ Pre-installed Laravel PHP extensions
* ✅ Beginner-friendly setup (No Nginx)

---

## 📁 Project Structure

```
.
├── backend/              # Laravel application
├── Dockerfile           # PHP-FPM container setup
├── docker-compose.yml   # Multi-container setup
└── README.md
```

---

## ⚙️ Setup Instructions

### 1️⃣ Clone the repository

```
git clone <your-repo-url>
cd <your-project-folder>
```

---

### 2️⃣ Start Docker containers

```
docker-compose up -d --build
```

---

### 3️⃣ Access the container

```
docker exec -it laravel_container bash
```

---

### 4️⃣ Install Laravel (if not already)

```
composer create-project laravel/laravel .
```

OR if already installed:

```
composer install
```

---

### 5️⃣ Configure `.env`

Update database credentials:

```
DB_CONNECTION=mysql
DB_HOST=mysql_db
DB_PORT=3306
DB_DATABASE=mydb
DB_USERNAME=root
DB_PASSWORD=rootpassword
```

---

### 6️⃣ Run migrations

```
php artisan migrate
```

---

### 7️⃣ Access the app

👉 http://localhost:8000

---

## 🐳 Docker Services

### Laravel App

* PHP 8.3 (FPM)
* Runs using `php artisan serve`
* Port: 8000

### MySQL

* Default database: `mydb`
* Port: 3306
* Persistent storage using Docker volume

---

## 💡 Why No Nginx?

This setup uses Laravel's built-in server (`php artisan serve`) to keep things simple for beginners.

In production, you should use Nginx or Apache for better performance and scalability.

---

## 🚀 Future Improvements

* Add Nginx for production-ready setup
* Add Redis for caching & queues
* Add phpMyAdmin for DB management
* Setup CI/CD pipeline

---

## 🤝 Contributing

Feel free to fork this repo and improve the setup.

---

## ⭐ Support

If you found this helpful, give it a ⭐ on GitHub and subscribe on YouTube 🚀
