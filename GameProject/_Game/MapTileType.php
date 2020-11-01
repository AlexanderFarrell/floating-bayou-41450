<?php

require_once("Color.php");

class MapTileType implements \JsonSerializable
{
    private $name;
    private $character;
    public $index;
    public $filename;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * @param mixed $character
     */
    public function setCharacter($character)
    {
        $this->character = $character;
    }

    /**
     * @return Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param Color $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }
    private $color;

    /**
     * MapTileType constructor.
     * @param $name - String, the name of the tile type
     * @param $character - Char, a character drawn when the map is rendered
     * @param $color - Color, a color which the character is when drawn.
     */
    public function __construct($name, $character, $color, $filename)
    {
        /*if (!is_string($name)){
            throw new Exception("Name must be a string for MapTileType");
        }

        if(!$color instanceof Color){
            throw new Exception("Color must be a color");
        }*/

        $this->name = $name;
        $this->character = $character;
        $this->color = $color;
        $this->filename = $filename;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'filename' => $this->filename
            ];
    }
}