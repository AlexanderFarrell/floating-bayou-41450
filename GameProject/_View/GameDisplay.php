<?php


class GameDisplay extends BaseView
{
    private $content;

    /**
     * GameDisplay constructor.
     * @param $content
     */
    public function __construct()
    {
        $this->content =
            '<div id="display">
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
            </div>';

    }

    public function getHtml()
    {
        return $this->getContent();
    }

    /**
     * @param mixed $content
     * @return GameDisplay
     */
    public function setContentFromMap($content)
    {
        $this->content = $content;
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