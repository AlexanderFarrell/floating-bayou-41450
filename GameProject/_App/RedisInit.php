<?php


class RedisInit
{
    public static function InitRegisSessions(){
        if (!isset($_ENV['REDIS_URL'])){
            echo '<p>Regis not found</p>';
            return;
        }

        $url = "tcp://" . parse_url($_ENV['REDIS_URL'], PHP_URL_HOST)
            . ":" . parse_url($_ENV['REDIS_URL'], PHP_URL_PORT);

        if (!is_array(parse_url($_ENV['REDIS_URL']), PHP_URL_PASS)) {
            $url .= "?auth=" . parse_url($_ENV['REDIS_URL'], PHP_URL_PASS);
        }

        ini_set("session.save_path", $url);
        ini_set("session.save_handler", "redis");

        session_start();
    }
}