<?php

$connection = null;

try {
    $connection = DatabaseHandler::GetDatabaseConnection();
} catch (Exception $e) {

}

 ?>


<div class="d-flex flex-column min-vh-100">
    <div class="centerText p-2">
        <h2>Choose a Map to Edit</h2>
    </div>
    <?php

    if (isset($connection)){
        $sqlGetMaps = 'SELECT ID, name from maps';
        $statement =  $connection->prepare($sqlGetMaps);
        $statement->execute();
        $maps = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        foreach ($maps as $map){
            echo '<button value=' . $map['name'] . '>' . $map['name'] . '</button>';
        }
    } else {
        echo 'Error reading from Database. We apologize for the inconvenience';
    }

    ?>
    <div id="mainMenuButtons" class="mt-auto p-2">
        <button class="btn-primary btn-block menuButton" onclick="endGame()">Back to Main Menu</button>
    </div>
</div>

<?php

    $connection = null;

?>