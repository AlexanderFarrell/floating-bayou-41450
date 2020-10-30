<?php

require_once 'BaseView.php';

class GameDisplay extends BaseView
{
    private $content;
    private $width = 12;
    private $height = 8;

    /**
     * GameDisplay constructor.
     * @param $content
     */
    public function __construct()
    {
        $content = "";

        /*$this->content =
            '<div id="display" class="centerText">
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            ....................<br>
            </div>';*/
    }

    public function getHtml()
    {
        return $this->getContent();
    }

    /**
     * @param mixed $content
     * @return GameDisplay
     */
    public function setContentFromGame($game)
    {
        //$xStart = $game->getPlayer

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
}