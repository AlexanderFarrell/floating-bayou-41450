<?php

require_once '_App/TemplateManager.php';
require_once '_View/BaseView.php';
require_once '_View/GameControlsView.php';
require_once '_View/GameDisplay.php';
require_once '_View/KeyDetailDisplay.php';

require_once '_Game/GameManager.php';
require_once '_Game/Game.php';

//Delete these
require_once '_Game/Entity.php';
require_once '_Game/Position.php';

//session_start();

if (!isset($_SESSION['game'])){
    echo 'Started Game' . '<br>';
}

$game = GameManager::GetGame();
$debug = false;

if ($debug){
    TemplateManager::GetHeader()->drawHtml();
}

$pos = $game->getPlayerEntity()->getPosition();

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
?>

    <div class="d-flex flex-row justify-content-center">
        <div class="p-2">
            <?php TemplateManager::GetGameDisplay()->drawHtml(); ?>
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