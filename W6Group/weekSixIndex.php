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
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="weekSixIndex.php">
                <div class="form-group">
                    <label for="book">Book</label>
                    <input
                            type="text"
                            class="form-control"
                            id="book"
                    />
                </div>
                <div class="form-group">
                    <label for="chapter">Chapter</label>
                    <input
                            type="number"
                            class="form-control"
                            id="chapter"
                    />
                </div>
                <div class="form-group">
                    <label for="verse">Verse</label>
                    <input
                            type="number"
                            class="form-control"
                            id="verse"
                    />
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <select multiple class="form-control" id="topic">
                        <?php

                        $sql = 'SELECT * from topic';

                        echo '<br>';

                        $stmt =  $connection->prepare($sql);
                        $stmt->execute();

                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $stmt->closeCursor();

                        foreach ($data as $row){
                            echo '<option value="' . $row['ID'] . '">' . $row['name'] . '</option>';
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
