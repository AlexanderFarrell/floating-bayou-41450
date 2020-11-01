function RenderGameDisplay(tiles, data, containerHtmlName){
    var htmlString = "";

    for (var y = 0; y < data.length; y++){
        for (var x = 0; x < data.length; x++){
            if (data[x][y] !== -1){
                var tileImage = tiles[data[x][y]].filename;
                htmlString += '<img src="' + tileImage + '" alt="${x}, ${y}">';
            }
            else
            {
                htmlString += '<div>Empty</div>';
            }
        }
    }

    document.getElementById(containerHtmlName).innerHTML = htmlString;
}
