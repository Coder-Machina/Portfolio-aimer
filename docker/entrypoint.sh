#!/bin/bash
set -e

echo "==> [Portfolio] Starting application container..."

# 1. Configure Apache listening port based on Render $PORT env variable
PORT="${PORT:-80}"
echo "==> [Portfolio] Configuring Apache on port ${PORT}..."
sed -i "s/80/${PORT}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# 2. Ensure runtime directories exist
mkdir -p /var/www/html/storage/framework/{sessions,views,cache} /var/www/html/storage/logs
mkdir -p /var/www/html/database

# 3. Ensure a valid, robust APP_KEY for Laravel encryption (fixes Render generateValue format)
APP_KEY=$(php -r '
    $key = getenv("APP_KEY") ?: "";
    if (str_starts_with($key, "base64:")) {
        $decoded = base64_decode(substr($key, 7), true);
        if ($decoded !== false && strlen($decoded) === 32) {
            echo $key;
            exit(0);
        }
    }
    if (strlen($key) === 32) {
        echo "base64:" . base64_encode($key);
        exit(0);
    }
    $decoded = base64_decode($key, true);
    if ($decoded !== false && strlen($decoded) === 32) {
        echo "base64:" . $key;
        exit(0);
    }
    $persistedKeyFile = "/var/www/html/storage/app_key.secret";
    if (file_exists($persistedKeyFile)) {
        $saved = trim((string) file_get_contents($persistedKeyFile));
        if (str_starts_with($saved, "base64:") && strlen(base64_decode(substr($saved, 7), true) ?: "") === 32) {
            echo $saved;
            exit(0);
        }
    }
    $newKey = "base64:" . base64_encode(random_bytes(32));
    @file_put_contents($persistedKeyFile, $newKey);
    echo $newKey;
')
export APP_KEY
echo "==> [Portfolio] APP_KEY verified and active."

# 4. Handle SQLite database if selected (default for instant free tier testing)
if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
    echo "==> [Portfolio] SQLite database mode active."
    if [ ! -f /var/www/html/database/database.sqlite ]; then
        touch /var/www/html/database/database.sqlite
        echo "==> [Portfolio] Created /var/www/html/database/database.sqlite"
    fi
fi

# 4. Set directory ownership and permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# 5. Create storage symlink if not already present
php artisan storage:link || true

# 6. Run database migrations
echo "==> [Portfolio] Running database migrations..."
php artisan migrate --force

# 7. Seed initial client data and admin account if database is fresh
echo "==> [Portfolio] Checking database seed status..."
if php artisan tinker --execute 'exit(\App\Models\Specialty::count() > 0 ? 0 : 1);' >/dev/null 2>&1; then
    echo "==> [Portfolio] Database already seeded. Skipping full seeder."
else
    echo "==> [Portfolio] Database empty. Running seeders..."
    php artisan db:seed --force
fi

# Ensure administrator account has the latest custom credentials
echo "==> [Portfolio] Syncing administrator account credentials..."
php artisan db:seed --class=UserSeeder --force

# 8. Optimize caches for production performance
echo "==> [Portfolio] Caching configuration, routes, and views..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> [Portfolio] Application ready! Starting Apache web server..."
exec apache2-foreground
