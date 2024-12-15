# 🌐 Blog Application

A robust blog application built with **Laravel** using the **Repository Pattern**, designed to provide a seamless content management experience.

## 🚀 Features

- **Create Posts**: Easily create new blog posts with rich content
- **Edit Posts**: Modify existing posts with a simple interface
- **Delete Posts**: Remove posts you no longer want
- **Search Functionality**: Quickly find posts by title or content
- **Automatic Image Assignment**: Random images for posts without custom images
- **Smart Slug Generation**: Automatic or custom URL-friendly slugs

## 🛠 Technologies Used

| Technology | Purpose |
|-----------|---------|
| Laravel | Backend Framework |
| PHP | Primary Programming Language |
| MySQL | Database Management |
| Bootstrap 5 | Responsive Frontend Styling |

## 📸 Screenshots

### Home Page
![image](https://github.com/user-attachments/assets/b37517f1-d3a4-4481-99b4-e01fd9c57a57)



## 🔧 Setup Instructions

### Prerequisites

Ensure you have the following installed:
- PHP 8.1+
- Composer (Dependency Manager)
- MySQL 5.7+ or MariaDB 10.3+
- Node.js and npm (for frontend assets)
- Laravel 11

### Installation Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/mohamedfarg/Laravel-repository-pattern-blog.git
   cd blog-application
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Configure Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**
   - Create a MySQL database
   - Update `.env` file with your database credentials
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=blog
     DB_USERNAME=root
     DB_PASSWORD=
     ```

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```

6. **Install Frontend Dependencies**
   ```bash
   npm install
   npm run dev
   ```

7. **Start the Development Server**
   ```bash
   php artisan serve
   ```

8. **Access the Application**
   Open your browser and navigate to `http://localhost:8000`

