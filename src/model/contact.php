<?php

class Contact{
    public $id;
    public $naam;
    public $email;
    public $geslacht;


    public function __construct($parId=-1, $parNaam= "", $parEmail ="", $parGeslacht=""){
            $this->id = $parId;
            $this->naam = $parNaam;
            $this->email = $parEmail;
            $this->geslacht = $parGeslacht;
    }
}

?>