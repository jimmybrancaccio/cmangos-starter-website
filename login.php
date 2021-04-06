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

/* Function to get values from MySQL. */
function getMySQLResult($query) {
    global $db;
    return $db->query($query)->fetch_object();
}

/* If the form has been submitted, process it. */
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    /* Get the salt and verifier from realmd.account for the user. */
    $query = "SELECT s, v FROM account WHERE username = '$username'";
    $result = getMySQLResult($query);
    $saltFromDatabase = $result->s;
    $verifierFromDatabase = strtoupper($result->v);

    /* Setup your client and verifier values. */
    $client = new UserClient($username, $saltFromDatabase);
    $verifier = strtoupper($client->generateVerifier($password));

    /* Compare $verifierFromDatabase and $verifier. */
    if ($verifierFromDatabase === $verifier) {
        /**
         * Do login stuff here, like setting cookies/sessions...
         */
    } else {
        /**
         * Do whatever you wanna do when the login has failed,
         * send a failure message, redirect them to another page, etc...
         */
    }
}
