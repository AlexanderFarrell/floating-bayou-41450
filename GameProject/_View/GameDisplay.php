<?php

require_once 'BaseView.php';
require_once '_Game/Game.php';
require_once '_Game/World.php';
require_once '_Game/Map.php';
require_once '_Game/MapTile.php';
require_once '_Game/MapTileType.php';
require_once '_Game/Entity.php';

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
        $content = ''; //'Map<br>';

        $map = GameManager::GetGame()->getWorld()->getMap();
        $player = GameManager::GetGame()->getPlayerEntity();

        //$content .= 'You are at X' . $player->getPosition()->getX()
        //    . ', Y: ' . $player->getPosition()->getY();

        $drawStartX = $player->getPosition()->getX() - ($this->width/2);
        $drawEndX = $player->getPosition()->getX() + ($this->width/2);
        $drawStartY = $player->getPosition()->getY() - ($this->height/2);
        $drawEndY = $player->getPosition()->getY() + ($this->height/2);

        /*$content .= '<br>';
        $content .= $drawStartX . '<br>';
        $content .= $drawEndX . '<br>';
        $content .= $drawStartY . '<br>';
        $content .= $drawEndY . '<br>';*/

        $content .= '<div id="display" class="centerText">';

        for ($y = $drawStartY; $y < $drawEndY; $y++){
            for ($x = $drawStartX; $x < $drawEndX; $x++){
                $tile = $map->getTileAt($x, $y);
                if ($tile != null){
                    //$content .= $y;
                    if ($tile->overrideChar != null){
                        //$content .= 'E' . $x . $y;
                        //$content .= $tile->getEntities()[0]->getCharacter();
                        $content .= $tile->overrideChar;
                    } else {
                        $content .= $tile->getTileType()->getCharacter();
                    }
                } else {
                    $content .= ' ';
                }
            }

            $content .= '<br>';
        }

        $content .= '</div>';

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