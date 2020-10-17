<?php

require_once('_App/TemplateManager.php');
require_once('_View/BaseView.php');
require_once('_View/HeaderPage.php');

?>
<!DOCTYPE HTML>
<html>
    <?php
        TemplateManager::GetHeader()->drawHtml();
    ?>
<body onload="takeTurnAndRefreshScreen()">
    <div id="GameContent"></div>
</body>
</html>

<script type="text/javascript">
    var inputSelection;

    function setInputSelection(selectionID){
        inputSelection = selectionID;
    }

    function takeTurnAndRefreshScreen(){
        var content = document.getElementById('GameContent');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function (){
            if (this.readyState === 4 && this.status === 200){
                content.innerHTML = this.responseText;
            }
        }
        xhttp.open("PUT", "gameContent.php", true);
        xhttp.setRequestHeader("Content-type", inputSelection);
        xhttp.send();
    }