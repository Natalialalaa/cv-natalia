<?php

namespace Framework\Entity;

abstract class AbstractEntity{
    protected $id;

    public function __construct($datas){
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
               $this->$method($value);
            }
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function __get($name){
        $method = 'get' . ucfirst($name);

        if (method_exists($this, $method)) {
            return $this->$method();
        }
        return null;
    }

    public function __set($name, $value){
        $method = 'set' . ucfirst($name);

        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
        return null;
    }
}