    Start Project
    
    - composer install
    - скопируйте файл .env.example и переименуйте его в .env
    - если у вас виндовс ./vendor/laravel/sail/database/mysql/create-testing-database.sh откройте этот файл и поменяйте тип с crlf на lf
    - если у вас виндовс ./vendor/laravel/sail/runtimes/8.4/start-container откройте этот файл и поменяйте тип с crlf на lf
    - docker compose -f .\compose.yaml up -d
    - docker exec -it laravel_hw-laravel.test-1 bash
    - php artisan key:generate
    - php artisan migrate
    - php artisan db:seed
    - chown -R sail:sail ./*
    
    {
        "$schema": "https://getcomposer.org/schema.json",
        "name": "alexandr-pushkin/alexandr-pushkin",
        "type": "project",
        "description": "Домашнее задание по Composer",
        "authors": [
            {
                "name": "alexandr-pushkin"
            }
        ],
        "keywords": ["laravel", "framework"],
        "license": "MIT",
        "require": {
            "php": "^8.2",
            "laravel/framework": "^12.0",
            "laravel/tinker": "^2.10.1"
        },
        "require-dev": {
            "fakerphp/faker": "^1.23",
            "laravel/pail": "^1.2.2",
            "laravel/pint": "^1.24",
            "laravel/sail": "^1.41",
            "mockery/mockery": "^1.6",
            "nunomaduro/collision": "^8.6",
            "phpunit/phpunit": "^11.5.3"
        },
        "autoload": {
            "psr-4": {
                "App\\": "app/",
                "Database\\Factories\\": "database/factories/",
                "Database\\Seeders\\": "database/seeders/"
            }
        },
        "autoload-dev": {
            "psr-4": {
                "Tests\\": "tests/"
            }
        },
        "scripts": {
            "setup": [
                "composer install",
                "@php -r \"file_exists('.env') || copy('.env.example', '.env');\"",
                "@php artisan key:generate",
                "@php artisan migrate --force",
                "npm install",
                "npm run build"
            ],
            "dev": [
                "Composer\\Config::disableProcessTimeout",
                "npx concurrently -c \"#93c5fd,#c4b5fd,#fb7185,#fdba74\" \"php artisan serve\" \"php artisan queue:listen --tries=1\" \"php artisan pail --timeout=0\" \"npm run dev\" --names=server,queue,logs,vite --kill-others"
            ],
            "test": [
                "@php artisan config:clear --ansi",
                "@php artisan test"
            ],
            "post-autoload-dump": [
                "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
                "@php artisan package:discover --ansi"
            ],
            "post-update-cmd": [
                "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
            ],
            "post-root-package-install": [
                "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
            ],
            "post-create-project-cmd": [
                "@php artisan key:generate --ansi",
                "@php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\"",
                "@php artisan migrate --graceful --ansi"
            ],
            "pre-package-uninstall": [
                "Illuminate\\Foundation\\ComposerScripts::prePackageUninstall"
            ]
        },
        "extra": {
            "laravel": {
                "dont-discover": []
            }
        },
        "config": {
            "optimize-autoloader": true,
            "preferred-install": "dist",
            "sort-packages": true,
            "allow-plugins": {
                "pestphp/pest-plugin": true,
                "php-http/discovery": true
            }
        },
        "minimum-stability": "stable",
        "prefer-stable": true
    }



#1 Композер пакеты

    "php": "^8.2",
    "laravel/framework": "^12.0",
    "laravel/tinker": "^2.10.1"
    "fakerphp/faker": "^1.23",
    "laravel/pail": "^1.2.2",
    "laravel/pint": "^1.24",
    "laravel/sail": "^1.41",
    "mockery/mockery": "^1.6",
    "nunomaduro/collision": "^8.6",
    "phpunit/phpunit": "^11.5.3"


#2 Конфиг папка

    config/app.php - Настраивает основные параметры приложения, это имя, пояс часовой, режим отладки и прочее
    config/auth.php - Систему аутентификации и авторизации, количество попыток, токен
    config/cache.php - отвечает за кеш
    config/database.php - это бд, знает кикие миграции где лежат
    config/filesystems.php - это файл работы с файлами, содержит например ссылки на файлы вне проекта 
    config/logging.php - храанит ответы и ошибки
    config/mail.php - отвечает за отправку почты
    config/queue.php - очередность выполнения и повтора запросов
    config/services.php - базовые настройи таймаутов,
    config/session.php - хранит куки

#3 Бизнес логика

    app
