<?php

/* Start up our PHP sessions. */
session_start();

/*  Include our configuration file. */
include __DIR__ . '/configuration.php';

/* Include the Composer autoloader. */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * We'll be using the PHP Composer package php-wowemu-auth from Laizerox.
 * URL: https://github.com/Laizerox/php-wowemu-auth
 */
use Laizerox\Wowemu\SRP\UserClient;

/**
 * Create a connection to the MySQL/MariaDB server using values
 * defined in the configuration.php file.
 */
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

/* If the form has been submitted, process it. */
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    /* Grab the users IP address. */
    $ip = $_SERVER['REMOTE_ADDR'];

    /* Set the join date. */
    $joinDate = date('Y-m-d H:i:s');

    /* Set GM Level. */
    $gmLevel = GM_LEVEL;

    /* Set expansion pack - Wrath of the Lich King. */
    $expansion = EXPANSION_PACK;

    /* Generate the v and s values. */
    $client = new UserClient($username);
    $salt = $client->generateSalt();
    $verifier = $client->generateVerifier($password);

    /* Insert the data into the account table within the realmd database. */
    mysqli_query(
        $db,
        "INSERT INTO account (username, v, s, gmlevel, email, joindate, last_ip, expansion)
        VALUES ('$username', '$verifier', '$salt',  '$gmLevel', '$email', '$joinDate', '$ip', '$expansion')"
    );

    /**
     * Finish handling your registration process,
     * a success message or redirecting to another page or
     * automatically logging them in, etc...
     */
}
