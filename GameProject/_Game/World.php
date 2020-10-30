<?php

require_once("Map.php");
require_once("Entity.php");
require_once("IEntityContainer.php");

class World
{
    private $map;
    private $entities;

    /**
     * Game constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->map = new Map(null, 20, 20);
        $this->entities = array();
    }

    /**
     * @return Map
     */
    public function getMap()
    {
        return $this->map;
    }

    public function ProcessTurn(){
        foreach ($this->entities as $entity){
            $entity->TakeTurn();
        }
    }

    public function addEntity($entity){
        if (!$entity instanceof Entity) {
            throw new Exception("Entity parameter must be an Entity");
        }

        array_push($this->entities, $entity);
    }

    public function removeEntity($entity){
        $key = array_search($entity, $this->entities);
        if (!is_null($key)){
            unset($key, $this->entities);
        }
    }
}