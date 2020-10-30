<?php

require_once("MapTileType.php");

class MapTile
{
    private $tileType;

    /**
     * @param MapTileType|null $tileType
     * @return MapTile
     */
    public function setTileType($tileType)
    {
        $this->tileType = $tileType;
        return $this;
    }
    private $x;
    private $y;

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