<?php

namespace App\Entity;

use Framework\Entity\AbstractEntity;

class Experience extends AbstractEntity{

   
    protected $nom;
    protected $etablissement;
    protected $lieu;
    protected $debut;
    protected $fin;
    protected $description;
    

    public function __construct($datas){
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
               $this->$method($value);
            }
        }
    }


    public function getNom(){

        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }

    public function getEtablissement(){

        return $this->etablissement;
    }

    public function setEtablissement($etablissement){
        $this->etablissement = $etablissement;
        return $this;
    }

    public function getLieu(){

        return $this->lieu;
    }

    public function setLieu($lieu){
        $this->lieu = $lieu;
        return $this;
    }

    public function getDebut(){

        return $this->debut;
    }

    public function setDebut($debut){
        $this->debut = $debut;
        return $this;
    }

    public function getFin(){

        return $this->fin;
    }

    public function setFin($fin){
        $this->fin = $fin;
        return $this;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

   
}