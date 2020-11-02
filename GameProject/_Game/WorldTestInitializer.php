<?php

require_once("Player.php");
require_once("Position.php");
require_once("World.php");
require_once("Entity.php");
require_once("Food.php");
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
        $grass = new MapTileType("Grass", ".", new Color(10, 128, 10), '_Content/Grass.png');
        $rock = new MapTileType("Tall Grass", ":", new Color(8, 156, 8), '_Content/Rock.png');
        $tallGrass = new MapTileType("Rock", "@", new Color(255, 128, 0), '_Content/tall.png');
        $grass->index = 0;
        $rock->index = 1;
        $tallGrass->index = 2;
        MapTileManager::AddNewType($grass);
        MapTileManager::AddNewType($tallGrass);
        MapTileManager::AddNewType($rock);

        for ($i = 0; $i < 30; $i++){
            $food = new Entity(new Position(mt_rand(0, $world->getMap()->getWidth()), mt_rand(0, $world->getMap()->getHeight())), '_Content/Food.png');
            $foodComponent = new Food();
            $food->addComponent($foodComponent);
            $world->addEntity($food);
        }

        for ($x = 0; $x < $world->getMap()->getWidth(); $x++){
            for ($y = 0; $y < $world->getMap()->getHeight(); $y++){
                $rockChance = mt_rand(0, 7);
                $tallGrassChance = mt_rand(0, 6);
                $world->getMap()->setTileTypeAt(($tallGrassChance != 0 ? $grass : $tallGrass), $x, $y);
                if ($rockChance != 3) {
                    $world->getMap()->setTileTypeAt($rock, $x, $y);
                }
            }
        }
    }
}