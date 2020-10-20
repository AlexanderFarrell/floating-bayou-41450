<?php

require_once '_View/HeaderPage.php';
require_once '_View/GameDisplay.php';
require_once '_View/KeyDetailDisplay.php';
require_once '_View/GameControlsView.php';

class TemplateManager
{
    private static $header;
    private static $gameDisplay;
    private static $keyDetailDisplay;
    private static $gameControls;

    public static function GetHeader(){
        if (static::$header == null){
            static::$header = new HeaderPage("Game");
        }

        return static::$header;
    }

    public static function GetGameDisplay(){
        if (static::$gameDisplay == null){
            static::$gameDisplay = new GameDisplay();
        }

        return static::$gameDisplay;
    }

    public static function GetKeyDetailDisplay(){
        if (static::$keyDetailDisplay == null){
            static::$keyDetailDisplay = new KeyDetailDisplay();
        }

        return static::$keyDetailDisplay;
    }

    public static function GetGameControls(){
        if (static::$gameControls == null){
            static::$gameControls = new GameControlsView();
        }

        return static::$gameControls;
    }

    public function __construct()
    {
    }
}