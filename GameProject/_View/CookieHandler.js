function readCookie(key){
    var realKey = key + "=";
    var splitArray = document.cookie.split(';');

    for (var i = 0; i < splitArray.length; i++) {
        var item = splitArray[i];
        while (item.charAt(0) === ' ') item = item.substring(1, item.length);
        if (item.indexOf(realKey) === 0) return item.substring(realKey.length, item.length);
    }

    return null;
}