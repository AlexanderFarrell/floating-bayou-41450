function LoadTileNamesIntoCookie(tileNames){
    document.cookie = 'tileNames' + JSON.stringify(tileNames);
}

function GetTileNames(tileNames){
    var decode = decodeURIComponent(document.cookie);
    var split = decode.split(';');

    //TODO add refresh if null
}