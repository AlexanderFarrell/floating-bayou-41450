<?php


class DatabaseHandler
{
    public static function GetDatabaseConnection(){
        $dsn = getenv('DATABASE_URL');
        $dbout = parse_url($dsn);

        if (isset($dbout["host"])){

            $host = $dbout["host"];
            $port = $dbout["port"];
            $user = $dbout["user"];
            $pass = $dbout["pass"];
            $name = ltrim($dbout["path"], '/');

            $connection = null;

            try {
                $connection = new PDO("pgsql:host={$host};port={$port};dbname={$name}", $user, $pass);
            }catch (Exception $exception){
                throw new Exception("Could not connect to database to get data.");
            }

            return $connection;
        }

        throw new Exception("Could not connect to database to get data.");
    }
}