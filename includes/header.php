<?php
require_once('boot.php');


if (!isset($_SESSION["user_id"])) {
    header('Location: index.php');
    exit(); 
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boarding House Tracking Information Management Application</title>
    <link rel="stylesheet" type="text/css" href="resources/fontawesome-free-6.5.1-web/css/fontawesome.css">

    <link rel="stylesheet" type="text/css" href="resources/fontawesome-free-6.5.1-web/css/solid.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="resources/js/table.js"></script>
    <script src="resources/js/update_questions.js"></script>
    <script src="resources/js/create.js"></script>
    <script src="resources/js/edit_question.js"></script>

<link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>



<header>
</header>

<body id="page-top">

<div id="wrapper">

    <br>
