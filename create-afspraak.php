<?php

require_once dirname(__FILE__) . "/src/helper/debug.php"; 
require_once dirname(__FILE__) . "/src/repository/agendarepository.php"; 
$arrContacten = AgendaRepository::getAllContacten();
//print_r_pre($arrContacten);

?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/screen.css">
    <title>My ToDo's - overview</title>
</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <nav class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Ageda</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a href="index.php" class="navbar-brand">Agenda</a>
            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="create-afspraak.php">Nieuwe afspraak</a></li>
                </ul>
            </div>
        </nav>
    </nav>
</header>

<main>
    <section id="create" class="container">
        <h1>Nieuwe afspraak</h1>
        <form method="post" action="create-afspraak-verwerk.php" class="form">
            <div class="form-group">
                <label for="omschrijving">Omschrijving</label>
                <input type="text" class="form-control" name="omschrijving" id="omschrijving"  placeholder="Wat is je afspraak?">
            </div>
            <div class="form-group">
                <label for="datum">Datum</label>
                <input type="date" class="form-control" name="datum" id="datum" ></input>
            </div>
			
            <div class="form-group">
                <label for="type-afspraak">Type afspraak</label>
                <select class="form-control" name="type-afspraak" id="type-afspraak">
                    <option value="1">gespek</option>
                    <option value="2">vergadering</option>
                    <option value="3">les</option>
                </select>
            </div>

			<div class="form-group">
                <label for="wie">Met wie</label>
                <select class="form-control" name="wie" id="wie">
                   <?php
                        foreach($arrContacten as $contact){
                            echo "<option value='$contact->id'>$contact->naam</option>";
                        }
                   ?>
                </select>
            </div>
			
            <input type="submit" name="submit" class="btn btn-default" value="Create"></input>
        </form>
    </section>
</main>

<footer class="text-center container">MIT</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>