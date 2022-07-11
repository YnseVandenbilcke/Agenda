<?php

require_once dirname(__FILE__) . "/../model/afspraak.php";
require_once dirname(__FILE__) . "/../model/contact.php";
require_once dirname(__FILE__) . "/../database/database.php";

class AgendaRepository{

    public static function getAllAfspraken(){
        // STAP 1 wat je zou verwachten 
        //$arr = Database::getRows("SELECT id,  datum,omschrijving,typeafspraak,contactid FROM afspraken ORDER BY datum", null, "Afspraak");
        
        // STAP 2 We zorgen ervoor dat we ook onmiddellijk de naam van het contact opvragen.
        //beide tabellen hebben een kolom id. Dus we moeten specifieren in de SELECT door de tabelnaam.kolom te noteren.
        $arr = Database::getRows("SELECT afspraken.id,  datum,omschrijving,typeafspraak,contactid,contacten.naam FROM afspraken INNER JOIN contacten ON afspraken.contactid = contacten.id ORDER BY datum", null, "Afspraak");
        return $arr;
    }

    public static function getAfspraakById($parid){
        $item = Database::getSingleRow("SELECT id,  datum,omschrijving,typeafspraak,contactid FROM afspraken WHERE id =? ORDER BY datum", [$parid], "Afspraak");
        return $item;
    }

    public static function createAfspraak($paromschrijving, $pardatum, $partype, $parcontactid){
        $int = Database::execute("INSERT INTO afspraken(omschrijving, datum,typeafspraak,contactid) VALUES(?,?,?,?)", [$paromschrijving, $pardatum, $partype, $parcontactid]);
        return $int;
    }

    public static function updateAfspraak($parID, $paromschrijving, $pardatum, $partype, $parcontactid){
        $int = Database::execute("UPDATE afspraken SET omschrijving =?, datum=?,typeafspraak=?,contactid=? WHERE id=?", [$paromschrijving, $pardatum, $partype, $parcontactid,$parID]);
        return $int;
    }

    public static function deleteAfspraak($parID){
        $int = Database::execute("DELETE FROM afspraken WHERE id=?", [ $parID]);
        return $int;
    }

    public static function getAllContacten(){
        $arr = Database::getRows("SELECT * FROM contacten", null, "Contact");
        return $arr;
    }

   
}
?> 