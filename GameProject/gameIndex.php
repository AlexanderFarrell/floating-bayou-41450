<?php

require_once('_App/TemplateManager.php');
require_once('_View/BaseView.php');
require_once('_View/HeaderPage.php');
require_once('_App/UserManager.php');
require_once('_App/User.php');
session_start();

?>

<!DOCTYPE HTML>
<html lang="en">
    <?php
        TemplateManager::GetHeader()->drawHtml();
        echo '<body ';
        if (isset($_SESSION['game'])){
            echo 'onload="openScreen(\'gameplay.php\')"';
        }
        else {
            echo 'onload="endGame()"';
        }
        echo '>';
    ?>
    <script src="_View/TileRenderer.js"></script>
    <script src="_View/CookieHandler.js"></script>
<script type="text/javascript">
    var inputSelection = 0;

    function openScreen(screen, data = null){
        var content = document.getElementById('GameContent');
        var loadingIndicator = document.getElementById('LoadingIndicator');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200){
                content.innerHTML = this.responseText;
                loadingIndicator.innerHTML = '';
            }
        }

        xhttp.open('POST', screen, true);
        loadingIndicator.innerHTML = 'Loading...';
        xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhttp.send(data);
    }


    function login(){
        try {
            var username = document.getElementById('username').value;
            var pass = document.getElementById('password').value;

        } catch (e){
            document.getElementById('errorCreateUser').innerText = "Please enter fields";
        }

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200){
                //document.getElementById('errorCreateUser').innerHTML = this.responseText;
                var content = JSON.parse(this.responseText);

                if (content === "success"){
                    openScreen('mainMenu.php');
                    document.getElementById('user').innerText = "Logged in";
                } else {
                    document.getElementById('errorCreateUser').innerText = content;
                }
            }
        }

        xhttp.open('POST', 'loginUser.php', true);
        xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhttp.send('username=' + encodeURIComponent(username) + '&' + 'password=' + encodeURIComponent(pass));
    }

    function openSettings(){
        openScreen('settings.php');
    }

    function openLevelEditor(){
        openScreen('levelEditor.php');
    }

    function startGame(){
        openScreen('gameplay.php');
    }

    function endGame(){
        openScreen('mainMenu.php');
    }

    function setInputSelection(selectionID){
        inputSelection = selectionID;
    }

    function takeTurn(selectionID){
        openScreen('gameplay.php', 'input=' + selectionID);
    }

    function createAccount(){
        try {
            var username = document.getElementById('username').value;
            var pass = document.getElementById('password').value;
            var passVerify = document.getElementById('verifyPassword').value;

        } catch (e){

        }

        if (pass === passVerify){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200){
                    //document.getElementById('errorCreateUser').innerHTML = this.responseText;
                    var content = JSON.parse(this.responseText);

                    if (content === "work"){
                        openScreen('mainMenu.php');
                    } else {
                        document.getElementById('errorCreateUser').innerText = content;
                    }
                }
            }

            xhttp.open('POST', 'createAccount.php', true);
            xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
            xhttp.send('username=' + encodeURIComponent(username) + '&' + 'password=' + encodeURIComponent(pass));
        }
        else
        {
            document.getElementById('errorCreateUser').innerText = "Passwords must match";
        }
    }

    /*function endGame(){
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
    }*/

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

    <div id="LoadingIndicator" class="extra">

    </div>
    <div id="user" class="extra">
        <?php
        $u = UserManager::getLoggedInUser();

        if (isset($u)){
            echo "Logged in as " . $u->name;
        }
        else {
            echo "Not logged in";
        }
        ?>
    </div>
    <div class="backgroundCenter">
        <div id="GameContent">
            Game Starting...
        </div>
    </div>

</body>
</html>