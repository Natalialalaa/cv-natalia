<?php

namespace Framework\Manager;


class Manager
{
    protected static $db;
    protected $table;
    protected $classEntity;
    protected $fields;

    public function __construct($classEntity)
    {
        $this->classEntity = $classEntity;
        $class = preg_replace('/.*[\\\]/','', $classEntity);
        $this->table = strtolower($class) . 's';

        $structure = $this->sql("DESC {$this->table}")->fetchAll();

        $this->fields = array_map(
            function($elt){
                return $elt->Field;
            }, $structure
        );
    }

    public static function setDb($db)
    {
        self::$db = $db;
    }

    public function sql(string $sql, array $datas = [])
    {
        $statement = self::$db->prepare($sql);
        $statement->execute($datas);

        return $statement;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM $this->table";

        $liste = $this->sql($sql)->fetchAll();


        $liste = array_map(
            function($elt){
                return new $this->classEntity($elt);
            },
            $liste
        );
        return $liste;
    }
    public function find($data)
    {
        $champ = array_key_first($data);
        $sql = "SELECT * FROM $this->table WHERE $champ=:$champ";

        return new $this->classEntity($this->sql($sql, $data)->fetch());
    }
    public  function update($entity)
    {
        $set = implode(
            ', ',
            array_map(
                function ($k) {
                    return "$k = :$k";
                },
                $this->fields
            )
        );

        $sql = "UPDATE $this->table SET $set WHERE id = :id";
        
        $datas = [];
        foreach ($this->fields as $key) {
            $datas[$key] = $entity->$key;
        }

        $this->sql($sql, $datas);

        return $this->find(['id'=>$entity->id]);
    }
    public function insert($entity)
    {
        $fields = $this->fields;
        unset($fields[array_search('id', $fields)]);
        $champs = " (" . implode(',', $fields) . ")";
        $values = " (:" . implode(", :", $fields) . ")";
        $sql = "INSERT INTO $this->table $champs VALUES $values";

        $datas = [];
        foreach ($fields as $key) {
            $datas[$key] = $entity->$key;
        }


        $this->sql($sql, $datas);

        return $this->find(['id'=>self::$db->lastInsertId()]);
    }
    public function delete($entity)
    {
        $sql = "DELETE FROM $this->table WHERE id= :id";

        $this->sql($sql, ['id' => $entity->id]);

        return $sql;
    }
}
