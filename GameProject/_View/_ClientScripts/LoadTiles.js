function LoadFromServer(){
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