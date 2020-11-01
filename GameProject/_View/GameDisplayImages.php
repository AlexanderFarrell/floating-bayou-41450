<?php

require_once 'BaseView.php';
require_once __DIR__ . '/../_Game/Game.php';
require_once __DIR__ . '/../_Game/World.php';
require_once __DIR__ . '/../_Game/Map.php';
require_once __DIR__ . '/../_Game/MapTile.php';
require_once __DIR__ . '/../_Game/MapTileType.php';
require_once __DIR__ . '/../_Game/Entity.php';

class GameDisplayImages extends BaseView
{
    private $width = 12;
    private $height = 12;
    /**
     * @var string
     */
    private $content = '';

    public function getData()
    {
        $data = array();

        $map = GameManager::GetGame()->getWorld()->getMap();
        $player = GameManager::GetGame()->getPlayerEntity();

        $drawStartX = $player->getPosition()->getX() - ($this->width/2);
        $drawEndX = $player->getPosition()->getX() + ($this->width/2);
        $drawStartY = $player->getPosition()->getY() - ($this->height/2);
        $drawEndY = $player->getPosition()->getY() + ($this->height/2);

        $content = '';
        //content .= '<div class="d-flex flex-row justify-content-center">';
        $content .= '<div class="container align-items-center  h-100">';

        for ($y = $drawStartY; $y < $drawEndY; $y++){
            array_push($data, array());
            $yDisplay = 0;
            $content = '<div class="row align-items-center h-100">';

            for ($x = $drawStartX; $x < $drawEndX; $x++){
                $xDisplay = 0;
                $tile = $map->getTileAt($x, $y);
                $content = '<div class="col align-items-center mx-auto">';
                if (isset($tile)){
                    $content .= '<img src="' . $tile->getTileType()->filename . '" alt="' . $tile->getTileType()->getName() . '">';
                }
                else{
                    $content .= '<div></div>';
                }
                $content = '</div>';
                /*$tile = $map->getTileAt($x, $y);
                if (isset($tile)){
                    $index = $tile->getTileType()->index;
                    array_push($data[$yDisplay], $index);
                }
                else{
                    array_push($data[$yDisplay], -1);
                }*/

                $xDisplay++;
            }
            $content = '</div>';

            $yDisplay++;
        }
        $content .= '</div>';

        return $content;
    }

    public function refresh($map, $centerPos, $renderAsButtons){

        $drawStartX = $centerPos->getX() - ($this->width/2);
        $drawEndX = $centerPos->getX() + ($this->width/2);
        $drawStartY = $centerPos->getY() - ($this->height/2);
        $drawEndY = $centerPos->getY() + ($this->height/2);

        $content = '';
        $content .= '<div class="tileDisplay">';

        for ($y = $drawStartY; $y < $drawEndY; $y++){
            $content .= '<div class="tileColumn">';
            for ($x = $drawStartX; $x < $drawEndX; $x++){
                $tile = $map->getTileAt($x, $y);
                $content .= '<div class="tile">';
                $image = '';
                $alt = '';
                if (isset($tile)){
                    if (isset($tile->overrideImage)){
                        $image = $tile->overrideImage;
                    }
                    else {
                        $image = $tile->getTileType()->filename;
                    }
                    $alt = $tile->getTileType()->getName();
                }
                else{
                    $image = '_Content/Abyss.png';
                    $alt = 'abyss';
                }
                $content .= '<img src="' . $image . '" alt="' . $alt . '">';
                $content .= '</div>';

            }

            $content .= '</div>';
        }

        $content .= '</div>';

        $this->content = $content;
    }

    public function getHtml()
    {
        return $this->content;
    }
}