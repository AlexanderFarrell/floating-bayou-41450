<?php

require_once("MapTileType.php");

session_start();

class MapTileManager
{
    private static function getTileTypesLoaded(){
        if (!isset($_SESSION['tileTypes'])){
            $_SESSION['tileTypes'] = array();
        }

        var_dump($_SESSION['tileTypes']);

        return $_SESSION['tileTypes'];
    }

    public static function GetTypeAtIndex($index){
        return static::getTileTypesLoaded()[$index];
    }

    public static function AddNewType($tileType){
        if (!$tileType instanceof MapTileType){
            throw new Exception("Must pass a MapTileType to add to MapTileManager");
        }

        if (!isset($_SESSION['tileTypes'])){
            $_SESSION['tileTypes'] = array();
        }

        array_push($_SESSION['tileTypes'], $tileType);
    }

    public static function CountTypesLoaded(){
        return sizeof(static::getTileTypesLoaded());
    }

    public static function Clear(){
        if (isset($_SESSION['tileTypes'])){
            unset($_SESSION['tileTypes']);
        }
    }
}