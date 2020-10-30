<?php

require_once("Color.php");

class MapTileType
{
    private $name;
    private $character;
    private $color;

    /**
     * MapTileType constructor.
     * @param $name - String, the name of the tile type
     * @param $character - Char, a character drawn when the map is rendered
     * @param $color - Color, a color which the character is when drawn.
     * @throws Exception if Name or Color is incorrect type.
     */
    public function __construct($name, $character, $color)
    {
        if (!is_string($name)){
            throw new Exception("Name must be a string for MapTileType");
        }

        if(!$color instanceof Color){
            throw new Exception("Color must be a color");
        }

        $this->name = $name;
        $this->character = $character;
        $this->color = $color;
    }
}