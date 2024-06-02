<?php

namespace App\Entity;

use Framework\Entity\AbstractEntity;

class Competence extends AbstractEntity{

   
    protected $nom;
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

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

   
}