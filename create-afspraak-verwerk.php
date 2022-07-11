<?php
require_once dirname(__FILE__) . "/src/helper/debug.php"; 
require_once dirname(__FILE__) . "/src/repository/agendarepository.php"; 

//print_r_pre($_POST);

if (isset($_POST["submit"])){
    $aantalRijen = AgendaRepository::createAfspraak($_POST["omschrijving"],$_POST["datum"],$_POST["type-afspraak"],$_POST["wie"] );
    if ($aantalRijen>0){
        //echo "toevoegen gelukt";
        header("location:index.php");
    }else{
        echo "toevoegen mislukt";
    }
}else{
    echo "toevoegen mislukt. (Je kwam niet vanaf het formulier)";
}


?>