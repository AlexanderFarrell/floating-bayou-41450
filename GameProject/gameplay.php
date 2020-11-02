<?php
spl_autoload_register ( function ($class) {

    $sources = array("_App/$class.php", "_Data/$class.php", "_Game/$class.php", "_LevelEditor/$class.php", "_View/$class.php ");

    foreach ($sources as $source) {
        if (file_exists($source)) {
            require_once $source;
        }
    }
});

if (!isset($_SESSION)){
    session_start();
}

$game = GameManager::GetGame();
//var_dump($game->getWorld());

if (!$game->active){
    echo '<div class="d-flex flex-column min-vh-100">
    <div class="centerText p-2">
        <h2>Game Over</h2>
    </div>
    <div>
     You lasted ' . $game->getWorld()->turns . ' turns!
</div>
    <div
    <div id="mainMenuButtons" class="mt-auto p-2">
        <button class="btn-primary btn-block menuButton" onclick="endGame()">Back to Main Menu</button>
    </div>
</div>';
    GameManager::EndGame();
    exit;
}

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