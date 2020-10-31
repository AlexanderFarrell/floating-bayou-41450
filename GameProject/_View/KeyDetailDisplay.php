<?php

require_once ('BaseView.php');

class KeyDetailDisplay extends BaseView
{
    public function getHtml()
    {
        $playerKey = GameManager::GetGame()->getPlayerEntity()->getCharacter();
        $content = '<div class="centerText">';
        $content .= 'Player: ' . $playerKey . '<br>';

        $tiles = $_SESSION['tileTypes'];
        foreach ($tiles as $tileType){
            $content .= $tileType->getName() . ': ' . $tileType->getCharacter() . '<br>';
            if ($tileType instanceof MapTileType){
            }
        }

        $content .= '</div>';

        return $content;
    }
}