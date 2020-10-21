<?php

$dsn = getenv('DATABASE_URL');

$dbout = parse_url($dsn);

$host = $dbout["host"];
$port = $dbout["port"];
$user = $dbout["user"];
$pass = $dbout["pass"];
$name = ltrim($dbout["path"], '/');

$connection = null;

try {
    $connection = new PDO("pgsql:host={$host};port={$port};dbname={$name}", $user, $pass);
}catch (Exception $exception){
    echo 'Issue connecting to database: ' . $exception->getMessage();
}

$worked = 0;

if (isset($_POST['book'])){
    $sqlInsertScriptures = 'INSERT INTO scriptures (book, chapter, verse, content) 
    values (:book, :chapter, :verse, :content)';
    $stmtInsertScripture =  $connection->prepare($sqlInsertScriptures);
    $stmtInsertScripture->bindValue(':book', $_POST['book'], PDO::PARAM_STR);
    $stmtInsertScripture->bindValue(':chapter', $_POST['chapter'], PDO::PARAM_INT);
    $stmtInsertScripture->bindValue(':verse', $_POST['verse'], PDO::PARAM_INT);
    $stmtInsertScripture->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
    $stmtInsertScripture->execute();
    $dataScripture = $stmtInsertScripture->lastInsertId('topic_seq');
    $stmtInsertScripture->closeCursor();

    foreach ($_POST['topic'] as $topic){
        $sqlInsertTopic = 'INSERT INTO scripture_topic (scriptureid, topicid) values (:scriptureid, :topicid)';
        $sqlInsertTopic->bindValue(':scriptureid', $dataScripture, PDO::PARAM_STR);
        $sqlInsertTopic->bindValue(':topicid', $topic, PDO::PARAM_STR);
        $sqlInsertTopic->execute();
        $worked = $sqlInsertTopic->rowCount();
        $sqlInsertTopic->closeCursor();
}

/*echo '<h1>Scripture Resources</h1>';

$sql = 'SELECT * from scriptures';

$a = '*';
$b = 'scriptures';

echo '<br>';

$stmt =  $connection->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt->closeCursor();

foreach ($data as $row){
    echo '<strong>' . $row['book'] . '</strong> - ' . $row['chapter'] . ':' . $row['verse'];
    echo '<br>';
    echo $row['content'];
    echo '<br>';
    echo '<br>';
} */?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>W06 CSE 341</title>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
            crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php



if ($worked > 0){
    echo '<div class="alert alert-success" role="alert"> Worked!!!</div>';
}
else {
    echo  '<div class="alert alert-danger" role="alert">
                    Didnt work!!!</div>';

}
}

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="weekSixIndex.php" method="post">
                <div class="form-group">
                    <label for="book">Book</label>
                    <input
                            type="text"
                            class="form-control"
                            id="book"
                            name="book"
                    />
                </div>
                <div class="form-group">
                    <label for="chapter">Chapter</label>
                    <input
                            type="number"
                            class="form-control"
                            id="chapter"
                            name="chapter"
                    />
                </div>
                <div class="form-group">
                    <label for="verse">Verse</label>
                    <input
                            type="number"
                            class="form-control"
                            id="verse"
                            name="verse"
                    />
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="7" name="content"></textarea>
                </div>
                <div class="form-group">
                    <select multiple class="form-control" id="topic" name="topic[]">
                        <?php

                        $sqlInsertScriptures = 'SELECT * from topic';

                        echo '<br>';

                        $stmtInsertScripture =  $connection->prepare($sqlInsertScriptures);
                        $stmtInsertScripture->execute();

                        $data = $stmtInsertScripture->fetchAll(PDO::FETCH_ASSOC);

                        $stmtInsertScripture->closeCursor();

                        foreach ($data as $row){
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }

                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"
></script>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"
></script>
</body>
</html>
