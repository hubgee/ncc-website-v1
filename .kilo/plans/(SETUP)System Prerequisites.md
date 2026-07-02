1. System Prerequisites
Software	Minimum Version	Required For
PHP	8.3	Laravel runtime
PostgreSQL	12+	Primary database
Node.js	18+	Frontend build (Vite)
npm	9+	Package manager
Composer	2.7+	PHP dependencies

2. PHP Configuration
Ensure the following extensions are enabled in php.ini:

extension=pgsql
extension=pdo_pgsql
extension=mbstring
extension=tokenizer
extension=xml
extension=ctype
extension=json
extension=curl
extension=fileinfo
extension=bcmath
extension=gd
extension=openssl
Verify:

php -m | findstr pgsql
php -m | findstr mbstring
php -m | findstr gd

3. Database Setup
CREATE DATABASE ncc_website;
-- Optional dedicated user:
CREATE USER ncc_user WITH PASSWORD 'your_secure_password';
GRANT ALL PRIVILEGES ON DATABASE ncc_website TO ncc_user;

4. Environment Configuration
cp .env.example .env
Edit .env:

APP_NAME="NCC Website"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=ncc_website
DB_USERNAME=postgres
DB_PASSWORD=123AppSection

SESSION_DRIVER=database
FILESYSTEM_DISK=public
QUEUE_CONNECTION=database
CACHE_STORE=database

5. Installation Steps
# 1. PHP dependencies
composer install --no-interaction --prefer-dist

# 2. App key
php artisan key:generate

# 3. Storage setup
mkdir -p storage/app/public/uploads
php artisan storage:link

# 4. Node dependencies
npm install --ignore-scripts

# 5. Build frontend
npm run build

6. Database Migration
php artisan migrate --force
Expected migrations:

2026_07_02_000001_add_is_admin_to_users_table
2026_07_02_000002_create_site_contents_table
7. Admin User Setup
Default admin email: admin@ncc.mw. Set password:

php artisan tinker
Then:

$user = App\Models\User::where('email', 'admin@ncc.mw')->first();
$user->password = bcrypt('your_secure_password');
$user->save();
exit
8. Seed Initial Content (Optional)
php artisan db:seed --class=SiteContentSeeder --force
9. Run the Application
Terminal 1 — Laravel server:

php artisan serve
Terminal 2 — Vite dev server:

npm run dev
10. Access Points
Page	URL
Public Homepage	http://localhost:8000
About	http://localhost:8000/about
What We Do	http://localhost:8000/what-we-do
Children's Corner	http://localhost:8000/childrens-corner
Reporting	http://localhost:8000/reporting
Admin Login	http://localhost:8000/admin/login
Admin Dashboard	http://localhost:8000/admin/dashboard
Manage Home Content	http://localhost:8000/admin/contents/home
11. Common Issues & Solutions
Issue	Solution
pdo_pgsql extension not found	Enable in php.ini: extension=pdo_pgsql
Storage images not loading	Run php artisan storage:link
Migrations fail with "column already exists"	Run php artisan migrate:rollback then php artisan migrate
CSS/JS not loading in production	Run npm run build then php artisan view:clear
403 on edit/delete routes	Ensure is_admin = true on your user
Homepage not showing uploaded images	Check publish status is "Yes" in admin, check browser cache
12. Quick Start Checklist
 PHP 8.3+ with pgsql, mbstring, gd extensions
 PostgreSQL running, ncc_website database created
 composer install completed
 npm install completed
 .env configured with DB credentials
 php artisan key:generate run
 Storage directories created and symlinked
 php artisan migrate --force completed
 Admin user password set
 npm run build run
 php artisan serve + npm run dev started
13. Project Structure Overview
ncc-website-v1/
├── app/
│   ├── Http/Controllers/Admin/     # Admin CRUD controllers
│   ├── Http/Middleware/             # Admin auth middleware
│   └── Models/                      # Eloquent models (User, SiteContent)
├── database/
│   ├── migrations/                  # PostgreSQL schema
│   └── seeders/                     # Initial content seeds
├── public/
│   ├── images/                      # Static fallback images
│   └── storage/                     # Symlink to storage/app/public
├── resources/
│   ├── views/
│   │   ├── admin/                   # Admin dashboard views
│   │   └── pages/                   # Public Blade templates
│   ├── css/app.css                  # Tailwind CSS entry
│   └── js/app.js                    # JS entry
├── routes/web.php                   # Route definitions
├── .env                             # Environment config
├── composer.json                    # PHP dependencies
├── package.json                     # Node dependencies
├── vite.config.js                   # Vite + Tailwind v4 config
└── tailwind.config.js               # Tailwind config
14. Maintenance Commands
# Clear all caches
php artisan optimize:clear

# Rebuild cache for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Database
php artisan migrate
php artisan migrate:rollback
php artisan migrate:fresh --force

# Tests
php artisan test