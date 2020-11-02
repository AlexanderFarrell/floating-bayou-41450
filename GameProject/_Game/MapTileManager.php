<?php

require_once("MapTileType.php");

class MapTileManager
{
    private static function getTileTypesLoaded(){
        if (!isset($_SESSION['tileTypes'])){
            $_SESSION['tileTypes'] = array();
        }

        return $_SESSION['tileTypes'];
    }

    public static function getTileTypesCookie(){
        if (!isset($_COOKIE['tileTypes'])){
            setcookie('tileTypes', json_encode($_SESSION['tileTypes']), time() + (86400));
        }

        return $_COOKIE['tileTypes'];
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