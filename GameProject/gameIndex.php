<?php

require_once('_App/TemplateManager.php');
require_once('_View/BaseView.php');
require_once('_View/HeaderPage.php');
session_start();

?>


<!DOCTYPE HTML>
<html lang="en">
    <?php
        TemplateManager::GetHeader()->drawHtml();
        echo '<body ';
        if (isset($_SESSION['game'])){
            echo 'onload="startGame()"';
        }
        else {
            echo 'onload="endGame()"';
        }
        echo '>';
    ?>
<script type="text/javascript">
    var inputSelection = 0;

    function endGame(){
        var content = document.getElementById('GameContent');
        var loadingIndicator = document.getElementById('LoadingIndicator');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200){
                content.innerHTML = this.responseText;
                loadingIndicator.innerHTML = '';
            }
        }

        xhttp.open('POST', 'mainMenu.php', true);
        loadingIndicator.innerHTML = 'Loading...';
        xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhttp.send();
    }

    function openLevelEditor(){
        var content = document.getElementById('GameContent');
        var loadingIndicator = document.getElementById('LoadingIndicator');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200){
                content.innerHTML = this.responseText;
                loadingIndicator.innerHTML = '';
            }
        }

        xhttp.open('POST', 'levelEditor.php', true);
        loadingIndicator.innerHTML = 'Loading...';
        xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhttp.send();
    }

    function openSettingsMenu(){
        var content = document.getElementById('GameContent');
        var loadingIndicator = document.getElementById('LoadingIndicator');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200){
                content.innerHTML = this.responseText;
                loadingIndicator.innerHTML = '';
            }
        }

        xhttp.open('POST', 'settings.php', true);
        loadingIndicator.innerHTML = 'Loading...';
        xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhttp.send();
    }

    function setInputSelection(selectionID){
        inputSelection = selectionID;
    }

    function startGame(){
        let content = document.getElementById('GameContent');
        content.innerHTML = "Loading";
        takeTurn();
    }

    function selectAndTakeTurn(selectionID){
        setInputSelection(selectionID);
        takeTurn();
    }

    function takeTurn() {
        var content = document.getElementById('GameContent');
        var loadingIndicator = document.getElementById('LoadingIndicator');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200){
                content.innerHTML = this.responseText;
                loadingIndicator.innerHTML = '';
            }
        }

        xhttp.open('POST', 'gameContent.php', true);
        //content.innerHTML = 'Loading';
        loadingIndicator.innerHTML = 'Loading...';
        xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhttp.send("input=" + encodeURIComponent(inputSelection));
    }

    /*function takeTurnAndRefreshScreen(){
        const content = document.getElementById('GameContent');
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function (){
            if (this.readyState === 4 && this.status === 200){
                content.innerHTML = this.responseText;
            }
            else if this.readyState === 4 && this.status <= 500 {
                content.innerHTML = "An issue occurred, could not start game";
            }
            else {
                content.innerHTML = "Loading";
            }
        }
        xhttp.open("PUT", "gameContent.php", true);
        content.innerHTML = "Loading";
        xhttp.setRequestHeader("Content-type", inputSelection);
        xhttp.send();
/////////////////////<button onclick="takeTurn()">Next Turn</button>
    }*/
    </script>

    <div class="container backgroundCenter">
        <div id="GameContent">Game Starting...</div>
        <div id="LoadingIndicator"></div>
    </div>
</body>
</html>