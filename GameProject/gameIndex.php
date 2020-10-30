<?php

if (!isset($_SESSION)){
    echo "No Session";
    session_start();
    $_SESSION["TestNumber"] = 0;
}

require_once('_App/TemplateManager.php');
require_once('_View/BaseView.php');
require_once('_View/HeaderPage.php');

?>
<!DOCTYPE HTML>
<html>
    <?php
        TemplateManager::GetHeader()->drawHtml();
    ?>
<body onload="startGame();">
<script type="text/javascript">
    function startGame(){
        let content = document.getElementById('GameContent');
        content.innerHTML = "Loading";
    }
    var inputSelection = 0;

    function setInputSelection(selectionID){
        inputSelection = selectionID;
    }

    function startGame(){
        let content = document.getElementById('GameContent');
        content.innerHTML = "Loading";
        takeTurn();
    }

    function takeTurn() {
        var content = document.getElementById('GameContent');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200){
                content.innerHTML = this.responseText;
            }
        }

        xhttp.open('GET', 'gameContent.php');
        content.innerHTML = 'Loading';
        xhttp.setRequestHeader("Content-type", inputSelection);
        xhttp.send();
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
    }*/
    </script>

<div id="GameContent">Game Starting...</div>
<button onclick="takeTurn()">Next Turn</button>
</body>
</html>