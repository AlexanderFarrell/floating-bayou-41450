<?php

$user = "";
$password = "";
$dsn = getenv('DATABASE_URL');
$connection = null;

try {
    $connection = new PDO($dsn);
}catch (Exception $exception){
    echo 'Issue connecting to database: ' . $exception->getMessage();
}
/*
echo '<h1>Scripture Resources</h1>';

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
}*/