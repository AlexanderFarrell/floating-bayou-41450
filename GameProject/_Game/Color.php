<?php


class Color
{
    private $red;
    private $green;
    private $blue;

    /**
     * @return mixed
     */
    public function getRed()
    {
        return $this->red;
    }

    /**
     * @param mixed $red
     */
    public function setRed($red)
    {
        $this->red = $this->TruncateChannel($red);
    }

    /**
     * @return mixed
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * @param mixed $green
     */
    public function setGreen($green)
    {
        $this->green = $this->TruncateChannel($green);
    }

    /**
     * @return mixed
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * @param mixed $blue
     */
    public function setBlue($blue)
    {
        $this->blue = $this->TruncateChannel($blue);
    }

    /**
     * Color constructor.
     * @param $red
     * @param $green
     * @param $blue
     */
    public function __construct($red, $green, $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    /**
     * @param $colorChannel
     * @return int|mixed
     */
    public function TruncateChannel($colorChannel)
    {
        $colorChannel = ($colorChannel > 255) ? 255 : $colorChannel;
        $colorChannel = ($colorChannel < 0) ? 0 : $colorChannel;
        return $colorChannel;
    }
}