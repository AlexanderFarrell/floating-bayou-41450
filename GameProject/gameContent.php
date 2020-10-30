<?php

if (!isset($_SESSION)){
    session_start();
    $_SESSION["TestNumber"] = 0;
}

/*if (session_id() == '' || !isset($_SESSION)){
    session_start();
    $_SESSION["TestNumber"] = 0;
}*/

$_SESSION["TestNumber"]++;

require_once '_App/TemplateManager.php';
require_once '_View/BaseView.php';
require_once '_View/GameControlsView.php';
require_once '_View/GameDisplay.php';
require_once '_View/KeyDetailDisplay.php';

require_once '_Game/GameManager.php';
require_once '_Game/Game.php';

$game = GameManager::GetGame();
$debug = true;

echo '<html>';
echo $_SESSION["TestNumber"];
if ($debug){
    TemplateManager::GetHeader()->drawHtml();
}

TemplateManager::GetGameDisplay()->drawHtml();
TemplateManager::GetKeyDetailDisplay()->drawHtml();
TemplateManager::GetGameControls()->drawHtml();

?>