<?php

require_once("MapTileType.php");

class MapTileManager
{
    private static $tileTypesLoaded = array();

    public static function GetTypeAtIndex($index){
        return static::$tileTypesLoaded[$index];
    }

    public static function AddNewType($tileType){
        if (!$tileType instanceof MapTileType){
            throw new Exception("Must pass a MapTileType to add to MapTileManager");
        }

        array_push(static::$tileTypesLoaded, $tileType);
    }

    public static function CountTypesLoaded(){
        return sizeof(static::$tileTypesLoaded);
    }
}