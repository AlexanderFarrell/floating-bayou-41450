<?php

require_once '_App/TemplateManager.php';
require_once '_View/BaseView.php';
require_once '_View/GameControlsView.php';
require_once '_View/GameDisplay.php';
require_once '_View/KeyDetailDisplay.php';

require_once '_Game/GameManager.php';
require_once '_Game/Game.php';

require_once '_Game/Entity.php';
require_once '_Game/Position.php';
require_once '_Game/World.php';
require_once '_Game/Player.php';

$game = GameManager::GetGame();

?>

<?php

$pos = $game->getPlayerEntity()->getPosition();
if (isset($_POST['input'])){
    switch ($_POST['input']){
        case 1:
            $game->getPlayerEntity()->setPosition(new Position($pos->getX(), $pos->getY() - 1));
            break;
        case 2:
            $game->getPlayerEntity()->setPosition(new Position($pos->getX() - 1, $pos->getY()));
            break;
        case 3:
            $game->getPlayerEntity()->setPosition(new Position($pos->getX() + 1, $pos->getY()));
            break;
        case 4:
            $game->getPlayerEntity()->setPosition(new Position($pos->getX(), $pos->getY() + 1));
            break;
        default:
            break;
    }

    $game->getWorld()->ProcessTurn();
}
?>

    <div class="d-flex flex-row justify-content-center">
        <div class="p-2">

        </div>
        <div class="p-2">
            <?php
            TemplateManager::GetGameDisplayImages()->refresh($game->getWorld()->getMap(), $game->getPlayerEntity()->getPosition(), false);
            TemplateManager::GetGameDisplayImages()->drawHtml(); ?>
            <?php //TemplateManager::GetGameDisplay()->drawHtml(); ?>
            <?php //TemplateManager::GetGameDisplayImages()->drawHtml(); ?>
        </div>
        <div class="p-2">
            <?php TemplateManager::GetKeyDetailDisplay()->drawHtml(); ?>
        </div>
    </div>

    <div class="d-flex flex-row justify-content-center">
    <div class="p-2">
    </div>
    <div class="p-2">
        <?php TemplateManager::GetGameControls()->drawHtml(); ?>
    </div>
    <div class="p-2">
    </div>
    </div>
<button class="btn-primary" onclick="endGame()">End Game</button>