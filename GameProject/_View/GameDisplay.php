<?php

require_once 'BaseView.php';
require_once '../_Game/Game.php';
require_once '../_Game/World.php';
require_once '../_Game/Map.php';
require_once '../_Game/MapTile.php';
require_once '../_Game/MapTileType.php';

class GameDisplay extends BaseView
{
    private $content;
    private $width = 12;
    private $height = 8;

    /**
     * GameDisplay constructor.
     * @param $content
     * @throws Exception
     */
    public function __construct()
    {
        /*$this->content =
            '<div id="display" class="centerText">
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            </div>';*/
    }

    public function getHtml()
    {
        $content = "";

        $map = GameManager::GetGame()->getWorld()->getMap();

        $width = $map->getWidth();
        $height = $map->getHeight();

        for ($x = 0; $x < $width; $x++){
            for ($y = 0; $y < $height; $y++){
                $tile = $map->getTileAt($x, $y)->getTileType();
                if ($tile != null){
                    $content .= $map->getTileAt($x, $y)->getTileType()->getCharacter();
                } else {
                    $content .= ' ';
                }
            }

            $content .= '<br>';
        }

        return $content;
        //return $this->getContent();
    }

    /**
     * @param mixed $content
     * @return GameDisplay
     */
    public function setContentFromGame($game)
    {
        //$xStart = $game->getPlayer

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
}