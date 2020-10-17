<?php

require_once '_View/HeaderPage.php';

class TemplateManager
{
    private static $header;

    public static function GetHeader(){
        if (static::$header == null){
            static::$header = new HeaderPage("Game");
        }

        return static::$header;
    }

    public function __construct()
    {
    }
}