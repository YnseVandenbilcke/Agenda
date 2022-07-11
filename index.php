<?php

require_once dirname(__FILE__) . "/src/helper/debug.php"; 
require_once dirname(__FILE__) . "/src/repository/agendarepository.php"; 
$arrAfspraken = AgendaRepository::getAllAfspraken();
//print_r_pre($arrAfspraken);

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
    <title>Afspraken - overview</title>
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
    <section id="overview" class="container">
        <h1>Overview</h1>
        <table class="table table-striped">
            <thead>
            <tr>
            
                <th>Omschrijving</th>
				<th>Type</th>
				<th>Datum</th>
				<th>Met wie</th>
				<th>Bewerk</th>
            </tr>
            </thead>
            <tbody>
<?php
foreach($arrAfspraken as $afspraak) {
    $tempid = $afspraak->id;
    echo"<tr>";
    echo"<td>".$afspraak->omschrijving."</td>";
    echo"<td>".$afspraak->getTypeAfspraak()."</td>";
    echo"<td>".$afspraak->datum."</td>";
    echo"<td>".$afspraak->contactid."</td>";
    //echo"<td>".$afspraak->naam."</td>";

    
    echo "<td><a href='delete-afspraak-verwerk.php?id=".$tempid."'>delete</a>  - <a href='update-afspraak.php?id=".$tempid."'>edit</a> </td>";
    echo "</tr>";
}?>
            </tbody>
        </table>
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