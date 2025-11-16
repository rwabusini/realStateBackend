Property Manager Backend (Laravel 12)
📄 License

---

### 📄 `backend/README.md`

```md
# Property Manager – Backend (Laravel 12)

A RESTful API built with **Laravel 12** and **MySQL** for user authentication and property management. Designed to power the Property Manager frontend.

## ✨ Features

- User login with token-based authentication
- MySQL database (managed via phpMyAdmin)
- Protected API routes
- CRUD for properties
- Request validation & error handling
- CORS enabled for frontend

## 🛠 Tech Stack

- Laravel 12
- PHP 8.2+
- MySQL
- phpMyAdmin (for local DB management)
- Composer

## 📦 Prerequisites

- PHP 8.2+
- Composer
- MySQL server (e.g., via XAMPP, MAMP, or Docker)
- [Laravel installer](https://laravel.com/docs/12.x/installation) (optional)

## 🚀 Setup

1. Clone and install:
   ```bash
   git clone https://github.com/your-username/property-manager-backend.git
   cd property-manager-backend
   composer install

2. Configure environment:
```bash
cp .env.example .env
php artisan key:generate
```
3. Edit .env (set MySQL credentials):
```env
DB_DATABASE=property_manager
DB_USERNAME=root
DB_PASSWORD=
```
4. Run migrations:
```bash
php artisan migrate
```
5. Start server:
```bash
php artisan serve
```

API will run at: http://localhost:8000/api
6. Access phpMyAdmin at: http://localhost/phpmyadmin

#🔐 Auth
Login via POST /api/auth/login → returns token.
Frontend sends token in header:
```http
Authorization: Bearer <token>
```
📤 Deployment
Use Laravel Forge, shared hosting, or cloud platforms (Render, Railway with MySQL).

🔗 Frontend
Property Manager Frontend
📄 License
MIT

---

✅ Just replace `your-username` with your actual GitHub username in both files.

You’re ready to commit, push, and share your fullstack project! 🚀