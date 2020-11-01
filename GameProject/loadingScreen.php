<?php

require_once '_Game/GameManager.php';
GameManager::GetGame();

?>

<script type="text/javascript">
    openScreen('gameplay.php');
</script>

<div class="d-flex flex-column min-vh-100" onload="openScreen('levelEditor.php')">
    <div class="centerText p-2">
        <h2>Loading...</h2>
    </div>
    <div id="mainMenuButtons" class="mt-auto p-2">
        <!--<button class="btn-primary btn-block menuButton" onclick="endGame()">Back to Main Menu</button>-->
    </div>
</div>