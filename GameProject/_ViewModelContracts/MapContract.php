<?php

require_once '_App/Constants.php';

class MapContract
{
    private $content;


    /**
     * @return string
     * Gets content to display to the screen.
     */
    public function getContent()
    {
        return $this->content;
    }
}