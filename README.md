# PHP Blog Application

This is a simple PHP-based blog application built with MySQL and XAMPP.

## 🚀 Features

- 📝 List of blog posts
- 🔍 Search by title or content
- 📄 Pagination
- 🎨 Clean UI with Bootstrap
- 🔄 Clear search input on 'X'

## 📂 Folder Structure

```

/blog-app/
│
├── index.php         # Homepage with posts, search & pagination
├── styles.css        # CSS file for custom styling
├── post.php          # (Optional) View single post
├── db.php            # MySQL connection file
└── .gitignore        # Files ignored by Git

````

## 🛠️ Tech Stack

- PHP
- MySQL
- Bootstrap (Optional)
- XAMPP (Local Server)

## 💡 How to Run Locally

1. Install [XAMPP](https://www.apachefriends.org/index.html)
2. Start Apache and MySQL
3. Place this folder in `htdocs/`
4. Open browser: `http://localhost/blog-app`
5. Create MySQL database `blog_db`
6. Import `posts` table manually via phpMyAdmin or run the SQL queries
7. Done!

## 🧪 Example SQL for Posts Table

```sql
CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
````

## ✅ Sample Post Insert

```sql
INSERT INTO posts (title, content) VALUES
('Welcome Post', 'This is the first post!'),
('PHP Basics', 'Let\'s learn PHP.');
```


