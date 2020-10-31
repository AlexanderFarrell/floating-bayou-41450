<?php

require_once("Player.php");
require_once("Position.php");
require_once("World.php");
require_once("MapTileType.php");
require_once 'MapTileManager.php';

class WorldTestInitializer
{
    public static function CreateTestPlayer(){
        $player = new Player();
        $position = new Position(5, 5);

        GameManager::GetGame()->setPlayerAndGiveEntity($player, $position);
    }

    public static function GenerateTestWorld(){
        $world = GameManager::GetGame()->getWorld();
        $grass = new MapTileType("Grass", ".", new Color(0, 255, 0));
        $tallGrass = new MapTileType("Tall Grass", ":", new Color(0, 255, 0));
        MapTileManager::AddNewType($grass);
        MapTileManager::AddNewType($tallGrass);

        for ($x = 0; $x < $world->getMap()->getWidth(); $x++){
            for ($y = 0; $y < $world->getMap()->getHeight(); $y++){
                $world->getMap()->setTileTypeAt(((rand(0, 2) == 0) ? $grass : $tallGrass), $x, $y);
            }
        }
    }
}