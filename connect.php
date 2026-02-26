<?php
declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
*/

$host     = 'localhost';
$dbname   = 'srm_educations';   // change if needed
$username = 'root';            // change in production
$password = '';                // change in production

/*
|--------------------------------------------------------------------------
| PDO CONNECTION
|--------------------------------------------------------------------------
*/

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );

} catch (PDOException $e) {

    http_response_code(500);

    // In production, log error instead of showing it
    exit('Database connection failed.');

}