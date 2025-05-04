# 📒 Laravel Address Book

A simple and secure contact management system built with Laravel 12.  
Each user can register, log in, and manage their own private list of contacts.

---

## 🚀 Features

- User authentication via Laravel Breeze
- CRUD for contacts (first name, last name, phone, email, address, notes)
- Prevents duplicate contact data per user  
  > A user cannot store the same phone number or email more than once in their own contact list
- Pagination
- Profile management (edit, change password, delete account)
- Clean UI using SB Admin
- SweetAlert for confirmations

---

## 📦 Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/HebhAlawam/laravel-address-book.git
cd laravel-address-book
```

### 2. Install Dependencies

```bash
composer install
npm install && npm run build
```

> Make sure PHP, Composer, Node.js, and MySQL are installed.

### 3. Set Up Environment

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` file with your DB info:

```env
DB_DATABASE=laravel_address_book
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Run Migrations & Seeders

```bash
php artisan migrate --seed
```

> This creates 3 demo users and sample contacts.

### 5. Start the Server

```bash
php artisan serve
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 👤 Demo Users

| Name            | Email               | Password     |
|-----------------|---------------------|--------------|
| Alice Example   | alice@example.com   | password123  |
| Bob Example     | bob@example.com     | password123  |
| Charlie Example | charlie@example.com | password123  |

