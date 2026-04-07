<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC Basics</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <link rel="shortcut icon" href="<?= URLROOT; ?>/img/favicon.ico" type="image/x-icon">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= URLROOT; ?>/homepages/index">
            <i class="bi bi-code-square"></i> ALI
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT; ?>/SmartphoneController/index">Smartphones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT; ?>/SneakerController/index">Sneakers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT; ?>/HorlogeController/index">Horloges</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT; ?>/ZangeresController/index">Zangeressen</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="wrapper">