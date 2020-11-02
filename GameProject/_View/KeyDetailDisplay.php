<?php

require_once ('BaseView.php');

class KeyDetailDisplay extends BaseView
{
    public function getHtml()
    {
        $content = "";
        $content .= "Hunger - Turns Left: " . GameManager::GetGame()->getPlayer()->hunger . '<br>';
        $content .= 'Elapsed Turns: ' . GameManager::GetGame()->getWorld()->turns . '<br>';
        $content .= 'X: ' . GameManager::GetGame()->getPlayerEntity()->getPosition()->getX() . '<br>';
        $content .= 'Y: ' . GameManager::GetGame()->getPlayerEntity()->getPosition()->getY() . '<br>';
        return $content;

        /*$playerKey = GameManager::GetGame()->getPlayerEntity()->getCharacter();
        $content = '<div class="centerText">';
        $content .= 'Player: ' . $playerKey . '<br>';

        $tiles = $_SESSION['tileTypes'];
        foreach ($tiles as $tileType){
            $content .= $tileType->getName() . ': ' . $tileType->getCharacter() . '<br>';
            if ($tileType instanceof MapTileType){
            }
        }

        $content .= '</div>';

        return $content;*/
    }
}