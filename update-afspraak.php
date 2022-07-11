<?php
require_once dirname(__FILE__) . "/src/helper/debug.php"; 
require_once dirname(__FILE__) . "/src/repository/agendarepository.php"; 


if (isset($_GET["id"])){
    //je hebt een id, dus je kan 1 afspraak opvragen
    $afspraakItem = AgendaRepository::getAfspraakById($_GET["id"]);
    $arrContacten = AgendaRepository::getAllContacten();
}else{
    echo "Er is geen querystring opgegeven. Ik weet dus niet welke afspraak er moet getoond worden";
    exit();
}

function bepaalSelected($parWaarde1 , $parWaarde2){
    if ($parWaarde1 == $parWaarde2){
        return "selected";
    }else{
        return "";
    }
}
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
    <title>Todo - edit</title>
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
    <section class="container">
        <h1>Edit Afspraak</h1>
        <h1>Nieuwe afspraak</h1>
        <form method="post" action="update-afspraak-verwerk.php" class="form">
            <div class="form-group">
                <label for="id">id</label>
                <input type="text" readonly class="form-control" name="id" id="id"  placeholder="Wat is je afspraak?" value="<?php echo $afspraakItem->id?>">
            </div>

            <div class="form-group">
                <label for="omschrijving">Omschrijving</label>
                <input type="text" class="form-control" name="omschrijving" id="omschrijving"  placeholder="Wat is je afspraak?" value="<?php echo $afspraakItem->omschrijving?>">
            </div>
            <div class="form-group">
                <label for="datum">Datum</label>
                <input type="date" class="form-control" name="datum" id="datum" value="<?php echo $afspraakItem->datum?>" ></input>
            </div>
			
            <div class="form-group">
                <label for="type-afspraak">Type afspraak</label>
                <select class="form-control" name="type-afspraak" id="type-afspraak">
                    <option value="1" <?php  echo bepaalSelected(1,$afspraakItem->typeafspraak) ?> >gespek</option>
                    <option value="2"  <?php  echo bepaalSelected(2,$afspraakItem->typeafspraak) ?>>vergadering</option>
                    <option value="3"  <?php echo bepaalSelected(3,$afspraakItem->typeafspraak) ?>>les</option>
                </select>
            </div>

			<div class="form-group">
                <label for="wie">Prioriteit</label>
                <select class="form-control" name="wie" id="wie">
                   <?php
                        foreach($arrContacten as $contact){
                            echo "<option value='$contact->id' ". bepaalSelected($contact->id, $afspraakItem->contactid) ." >$contact->naam</option>";
                        }
                   ?>
                </select>
            </div>
			
            <input type="submit" name="submit" class="btn btn-default" value="Update"></input>
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