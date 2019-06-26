<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$entitiesPath = [
    join(DIRECTORY_SEPARATOR, [__DIR__,"..", "src", "Entity"])
];

// Connexion à la base de données

$dbParams = [
    //'url' => 'mysql://root@127.0.0.1:3307/hi-op_bdd'
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'charset'  => 'utf8',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'hi-op_bdd',
    'port'     => 3307
];

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

$config = Setup::createAnnotationMetadataConfiguration(
    $entitiesPath,
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);

$entityManager = EntityManager::create($dbParams, $config);


// Load cached env vars if the .env.local.php file exists
// Run "composer dump-env prod" to create it (requires symfony/flex >=1.2)
if (is_array($env = @include dirname(__DIR__).'/.env.local.php')) {
    $_ENV += $env;
} elseif (!class_exists(Dotenv::class)) {
    throw new RuntimeException('Please run "composer require symfony/dotenv" to load the ".env" files configuring the application.');
} else {
    // load all the .env files
    (new Dotenv(false))->loadEnv(dirname(__DIR__).'/.env');
}

$_SERVER += $_ENV;
$_SERVER['APP_ENV'] = $_ENV['APP_ENV'] = ($_SERVER['APP_ENV'] ?? $_ENV['APP_ENV'] ?? null) ?: 'dev';
$_SERVER['APP_DEBUG'] = $_SERVER['APP_DEBUG'] ?? $_ENV['APP_DEBUG'] ?? 'prod' !== $_SERVER['APP_ENV'];
$_SERVER['APP_DEBUG'] = $_ENV['APP_DEBUG'] = (int) $_SERVER['APP_DEBUG'] || filter_var($_SERVER['APP_DEBUG'], FILTER_VALIDATE_BOOLEAN) ? '1' : '0';
return $entityManager;