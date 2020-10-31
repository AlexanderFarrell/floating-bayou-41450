function GetCookie(name) {
    var data = JSON.parse(document.cookie);
    return data[name];
}

function InitializeCookie(){
    var data = {};
    document.cookie = JSON.stringify(data);
}

function SetCookieItem(key, value) {
    var data = JSON.parse(document.cookie);
    data[key] = value;
    document.cookie = JSON.stringify(data);
}