<?php

require_once("MapTile.php");

class Map
{
    private $mapData;
    private $width;
    private $height;

    /**
     * Map constructor.
     * @param $dataFile
     * @param $width
     * @param $height
     * @throws Exception
     */
    public function __construct($dataFile, $width, $height)
    {
        $this->mapData = array();

        if ((!is_int($width)) || (!is_int($height))){
            throw new Exception("Width and Height must be integers.");
        }

        for ($x = 0; $x < $width; $x++){
            array_push($this->mapData, array());

            for ($y = 0; $y < $height; $y++){
                array_push($this->mapData[$x], new MapTile(null, $x, $y));
            }
        }
    }

    public function setTileTypeAt($tileType, $x, $y){
        $this->mapData[$x][$y]->setTileType($tileType);
    }

    /**
     * @param $x
     * @param $y
     * @return MapTile|null
     * @throws Exception
     */
    public function getTileAt($x, $y){
        if ((!is_int($x)) || (!is_int($y))){
            throw new Exception("X and Y must be integers");
        }

        if (($x < 0) || ($x >= $this->width) || ($y < 0) || ($y >= $this->height)){
            return null;
        }
        else{
            return $this->mapData[$x][$y];
        }
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
}