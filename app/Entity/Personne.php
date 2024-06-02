<?php

namespace App\Entity;

use Framework\Entity\AbstractEntity;

class Personne extends AbstractEntity{

    protected $prenom;
    protected $nom;
    protected $age;
    protected $photo;

    public function __construct($datas){
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
               $this->$method($value);
            }
        }
    }

    public function getPrenom(){
        return strtoupper($this->prenom);
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
        return $this;
    }

    public function getNom(){

        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }

    public function getAge(){
        return $this->age;
    }

    public function setAge($age){
        $this->age = $age;
        return $this;
    }

    public function getPhoto(){
        return $this->photo;
    }

    public function setPhoto($photo){
        $this->photo = $photo;
        return $this;
    }

   
}

