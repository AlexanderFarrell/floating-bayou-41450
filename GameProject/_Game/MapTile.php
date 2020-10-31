<?php

require_once("MapTileType.php");

class MapTile
{
    private $tileType;
    private $x;
    private $y;
    private $entities = array();
    public $overrideChar;
    private $entityCount;

    /**
     * MapTile constructor.
     * @param $tileType
     * @param $x
     * @param $y
     * @throws Exception
     */
    public function __construct($tileType, $x, $y)
    {
        if ((!$tileType instanceof MapTileType) && (!is_null($tileType))){
            throw new Exception("must pass a MapTileType to create MapTileType");
        }

        if ((!is_int($x)) || (!is_int($y))){
            throw new Exception("X and Y must be integers");
        }

        $this->tileType = $tileType;
        $this->x = $x;
        $this->y = $y;
        $this->entityCount = 0;
        $this->overrideChar = null;
    }

    /**
     * @return int
     */
    public function getEntityCount()
    {
        return $this->entityCount;
    }

    /**
     * @param MapTileType|null $tileType
     * @return MapTile
     */
    public function setTileType($tileType)
    {
        $this->tileType = $tileType;
        return $this;
    }

    public function addEntity($entity){
        array_push($this->entities, $entity);
        $this->entityCount++;
    }

    public function removeEntity($entity) {
        $key = array_search($entity, $this->entities);
        unset($key, $this->entities);
        $this->entityCount--;
    }

    /**
     * @return array
     */
    public function getEntities()
    {
        if ($this->entities == null){
            $this->entities = array();
        }
        return $this->entities;
    }

    /**
     * @return MapTileType
     */
    public function getTileType()
    {
        return $this->tileType;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }
}