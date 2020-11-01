<?php

require_once '_Game/GameManager.php';
require_once '_Game/MapTileManager.php';
GameManager::EndGame();
MapTileManager::Clear();

?>

<div class="d-flex flex-column min-vh-100">
    <div class="centerText p-2">
        <h1>Main Menu</h1>
    </div>
    <div id="mainMenuButtons" class="mt-auto p-2">
        <button class="btn-primary btn-block menuButton" onclick="startGame()">New Game</button>
        <button class="btn-primary btn-block menuButton" onclick="openScreen('createUserScreen.php')">Create Account</button>
        <button class="btn-primary btn-block menuButton" onclick="openScreen('loginScreen.php')">Login</button>
        <button class="btn-primary btn-block menuButton" onclick="openLevelEditor()">Level Editor</button>
    </div>
</div>

<!--<button class="btn-primary btn-block menuButton" onclick="startGame()">New Game</button>
<button class="btn-primary btn-block menuButton" onclick="openLevelEditor()">Level Editor</button>
<button class="btn-primary btn-block menuButton" onclick="openSettingsMenu()">Settings</button>

<div class="d-flex flex-column">
    <div class="p-2">
    </div>
    <div class="p-2">
    </div>
    <div class="p-2">
    </div>
</div>
