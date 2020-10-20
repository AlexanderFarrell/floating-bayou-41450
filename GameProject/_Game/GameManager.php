<?php

require_once 'Game.php';

class GameManager
{
    private static $game;

    public static function GetGame(){
        if (static::$game == null){
            static::$game = new Game();
        }

        return static::$game;
    }
}