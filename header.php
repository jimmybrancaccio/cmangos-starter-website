<?php

/* Start up our PHP sessions. */
session_start();

?><!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CMaNGOS, World of Warcraft, WoW, Warcraft">
        <meta name="author" content="jimmybrancaccio">
        <title>CMaNGOS - Starter Website</title>

        <link rel="canonical" href="/">

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <!-- Favicons -->
        <!-- <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico"> -->
    </head>

    <body>
    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <a href="./" class="d-flex align-items-center text-dark text-decoration-none">
                            <i class="bi bi-shield-shaded fs-4"></i>&nbsp;&nbsp;
                            <span class="fs-4">CMaNGOS - Starter Website</span>
                        </a>
                    </div>
                    <div class="col-md-6 align-self-end text">
                        <div class="dropdown">
                            <a class="dropdown-toggle float-end text-dark text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Login / Register
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="bi bi-arrow-right-short"></i> Login</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#registerModal"><i class="bi bi-arrow-right-short"></i> Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
