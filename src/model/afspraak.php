<?php
class Afspraak{
    public $id;
    public $datum;
    public $omschrijving;
    public $typeafspraak;
    public $contactid;


    public function __construct($parId=-1, $parDatum =  null, $parOmschrijving ="", $parTypeAfspraak=-1, $parContactid=-1){
            $this->id = $parId;
            $this->datum = $parDatum;
            $this->omschrijving = $parOmschrijving;
            $this->typeafspraak = $parTypeAfspraak;
            $this->contactid = $parContactid;
    }

    public function getTypeAfspraak(){
        switch ($this->typeafspraak){
            case 1:
                return "gesprek";
                break;
            case 2:
                return "vergadering";
                break;
            case 3:
                return "les";
                break;
            default:
                return "onbekend";
        }
    }
}
?>