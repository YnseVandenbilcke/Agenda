<?php

require_once dirname(__FILE__) . "/src/helper/debug.php"; 
require_once dirname(__FILE__) . "/src/repository/agendarepository.php"; 

print_r_pre($_POST);

if (isset($_POST["submit"])){
    $aantalRijen = AgendaRepository::updateAfspraak($_POST["id"], $_POST["omschrijving"],$_POST["datum"],$_POST["type-afspraak"],$_POST["wie"] );
    if ($aantalRijen>0){
        header("location:index.php");
    }else{
        echo "er zijn geen records geupdated";
    }
}else{
    echo "toevoegen mislukt. (Je kwam niet vanaf het formulier)";
}
?>