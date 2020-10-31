<?php

class RedisInit
{
    public static $redis;

    public static function InitRegisSessions(){

        if (!isset($_SESSION['Something'])){
            echo "Session was started" . '<br>' .
                session_id() . '<br>';
            static::$redis = new \Predis\Client([
                'scheme' => 'tcp',
                'host' => parse_url($_ENV['REDIS_URL'], PHP_URL_HOST),
                'port' => parse_url($_ENV['REDIS_URL'], PHP_URL_PORT),
                'pass' => parse_url($_ENV['REDIS_URL'], PHP_URL_PASS)
            ]);

            session_start();
            echo session_id() . '<br>';

            $_SESSION['Something'] = "This";
        }


        /*if (!isset($_ENV['REDIS_URL'])){
            echo '<p>Regis not found</p>';
            return;
        }

        $url = "tcp://" . parse_url($_ENV['REDIS_URL'], PHP_URL_HOST)
            . ":" . parse_url($_ENV['REDIS_URL'], PHP_URL_PORT);

        if (!is_array(parse_url($_ENV['REDIS_URL'], PHP_URL_PASS))) {
            $url .= "?auth=" . parse_url($_ENV['REDIS_URL'], PHP_URL_PASS);
        }

        ini_set("session.save_path", $url);
        ini_set("session.save_handler", "redis");

        session_start();*/

        if (!isset($_SESSION)){
            if($_ENV['REDIS_URL']) {
                $redisUrlParts = parse_url($_ENV['REDIS_URL']);
                ini_set('session.save_handler','redis');
                ini_set('session.save_path',"tcp://$redisUrlParts[host]:$redisUrlParts[port]?auth=$redisUrlParts[pass]");
            }

            session_start();
        }
    }
}