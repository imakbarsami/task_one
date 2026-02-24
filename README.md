# Task 1: Multi-Login System (Single Sign-On)

This repository contains the solution for **Task 1: Multi-login system**. It demonstrates a seamless Single Sign-On (SSO) experience between two independent Laravel applications: **Ecommerce** and **Foodpanda**.

## 📂 Project Structure
The repository is structured with a parent directory containing two separate Laravel projects:
- `/ecommerce-app` - The primary application where the user initially logs in.
- `/foodpanda-app` - The secondary application where the user is automatically logged in via SSO.

## 🌐 Live Demo & Credentials

**Ecommerce App:** [https://ecommerce-app-sami.onrender.com](https://ecommerce-app-sami.onrender.com) \
**Foodpanda App:** [https://foodpanda-app-sami.onrender.com](https://foodpanda-app-sami.onrender.com)

**Test User Credentials:**
- **Email:** test@example.com
- **Password:** password

*(Note: Please ensure you test the SSO feature by first logging into the Ecommerce app, then clicking the "Go to Foodpanda" button from the dashboard).*

---

## ⚙️ How It Works (The Core Logic)
To achieve the requirement of automatically logging into the Foodpanda system after authenticating in the Ecommerce system, I implemented a **Token-Based Redirect Mechanism with a Shared Database**.

Here is the step-by-step flow:
1. **Shared User Base:** Both applications share the same database connection. This allows them to read from the same `users` and `sso_tokens` tables.
2. **Primary Authentication:** The user logs into the `ecommerce-app` using their standard email and password.
3. **Token Generation:** When the user clicks "Go to Foodpanda" from the Ecommerce dashboard, the `SsoController` generates a highly secure, random token (`Str::random(40)`).
4. **Token Storage:** This token is saved in the `sso_tokens` table along with the authenticated user's ID.
5. **Secure Redirect:** The Ecommerce app immediately redirects the user to a specific verification route in the `foodpanda-app`, passing the token as a query parameter.
6. **Verification & Auto-Login:** The Foodpanda app receives the token, validates it against the shared database, and identifies the corresponding user. It then uses `Auth::loginUsingId()` to automatically log the user in.
7. **Security Cleanup:** Once the user is logged in, the token is immediately deleted from the database to prevent replay attacks. Independent session cookies (`ecommerce_session` and `foodpanda_session`) ensure that the two apps maintain stable, separate sessions without conflict.

---

## 🏛️ Architectural Note & Trade-offs (Real-World vs. Assessment)
For the scope and time constraints of this mid-level assessment, a **Shared Database approach** was utilized to efficiently demonstrate the core cross-domain SSO logic. 

**However, in a real-world, large-scale enterprise environment:**
I would not share a single database between two massive applications like Ecommerce and Foodpanda to avoid table name conflicts, data isolation risks, and a single point of failure. Instead, I would implement a **Centralized Identity Provider (IdP) or Auth Microservice** using **OAuth2 (Laravel Passport) or JWT**. The apps would communicate with the central Auth API to verify access tokens without directly touching each other's databases. The current implementation mimics the handshake portion of that flow practically.

---

## 🚀 Local Setup Instructions

### Prerequisites
- PHP 8.4
- Composer
- MySQL/MariaDB
- Node.js & NPM

### Step 1: Database Setup
1. Create a single MySQL database named `multi_login_db` (or your preferred name).

### Step 2: Setup Ecommerce App
1. Navigate to the ecommerce directory: `cd ecommerce-app`
2. Install dependencies: `composer install` and `npm install`
3. Copy `.env.example` to `.env` and configure your database credentials. Ensure `SESSION_COOKIE=ecommerce_session` is set.
4. Generate app key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Build assets: `npm run build`
7. Start the server: `php artisan serve --port=8000`

### Step 3: Setup Foodpanda App
1. Open a new terminal and navigate to the foodpanda directory: `cd foodpanda-app`
2. Install dependencies: `composer install` and `npm install`
3. Copy `.env.example` to `.env` and set the **exact same database credentials** used for the Ecommerce app. Ensure `SESSION_COOKIE=foodpanda_session` is set.
4. Generate app key: `php artisan key:generate`
5. *(Do NOT run migrations here, as the shared database is already migrated).*
6. Build assets: `npm run build`
7. Start the server: `php artisan serve --port=8001`
