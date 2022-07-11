<?php
require_once dirname(__FILE__) . "/src/helper/debug.php"; 
require_once dirname(__FILE__) . "/src/repository/agendarepository.php"; 


if(isset($_GET["id"])==true){
    $res = AgendaRepository::DeleteAfspraak($_GET["id"]);
    if ($res >0){
        header("location:index.php");
    }else{
        echo "verwijderen mislukt";
    }
  
}else{
    echo "error: u gaf geen querystring op";
}

?>
