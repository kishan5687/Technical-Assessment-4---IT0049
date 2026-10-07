# FULL CRUD AND AUTHENTICATION

**Student Name:** QUEJADA, RAINA KISHAN S.  
**Section:** TW35  

## Live Application URL
* Hosted Version: [(http://rkishan.thsite.top/)]


# Tasks for Today Management System (TSA2)

An entry-level Task Management web application built using the **CodeIgniter 4 framework** with basic MVC architecture. This project features full CRUD management for tasks, form input validation, and user authentication constraints.

## Project Features
- **Public Dashboard:** View active task entries in a read-only matrix layout without logging in.
- **Access Control Filter:** Management features (Create, Edit, Delete) are locked behind an authentication layer.
- **Form Input Validation:** Title and Date inputs are checked inline before saving to the database.
- **Soft Deletion Mechanism:** Deleted items flip an archive column flag (`is_archived = 1`) to hide them from dashboards without permanently dropping database records.

---

## Prerequisites
Before running this application locally, ensure you have:
- **XAMPP / MAMP / WampServer** with PHP 8.1+ and MySQL/MariaDB installed.
- **Composer** package manager installed globally.

---

## Local Installation & Setup Steps

### 1. Database Initialization
1. Open your browser and go to `http://localhost/phpmyadmin`.
2. Click on the **Databases** tab and create a new database named `tasks_db`.
3. Select your newly created `tasks_db` from the sidebar menu, click the **SQL** tab, and run the following initialization script:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (id, username, email, password) VALUES 
(1, 'demo_user', 'demo@example.com', '$2y$10$U83fS7MhBvV0R.r3fU7I1.xR5H7PZ5Sg3p7J6V7lXFhH2ZpM8A3Ka');

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    task_date DATE NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending',
    is_archived TINYINT(1) DEFAULT 0
);
```

### 2. Project Environment Configuration
1. Open your project folder using a code editor (e.g., VS Code).
2. Locate the file named `env` or `sample.env` at the root directory and rename it exactly to `.env`.
3. Update the database configuration block to match your local setup credentials:

```env
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = tasks_db
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.port = 3306
```
*(Note: If you are using MAMP on a Mac, set `database.default.password = root`)*

### 3. Start the Local Server
1. Open your terminal application or command prompt.
2. Navigate to your project root folder:
   ```bash
   cd path/to/your/project-folder
   ```
3. Boot up the local CodeIgniter developer engine:
   ```bash
   php spark serve
   ```
4. Access the web interface at: `http://localhost:8080`

---

## Demo System User Accounts
Use these standard credentials on the **System Login** screen to access management features:
- **Username:** `demo_user`
- **Password:** `password123`
#
