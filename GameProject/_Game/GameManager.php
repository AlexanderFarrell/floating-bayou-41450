<?php

require_once 'Game.php';
require_once 'WorldTestInitializer.php';

class GameManager
{
    //private static $game;

    public static function GetGame(){
        if (!isset($_SESSION['game'])){
            $_SESSION['game'] = new Game();
            WorldTestInitializer::GenerateTestWorld();
            WorldTestInitializer::CreateTestPlayer();
        }

        /*if (static::$game == null){
            static::$game = new Game();
            WorldTestInitializer::GenerateTestWorld();
            WorldTestInitializer::CreateTestPlayer();
        }

        return static::$game;*/

        return $_SESSION['game'];
    }
}