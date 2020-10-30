<?php


class Position
{
    private $x;
    private $y;

    public function IsWithin($xStart, $yStart, $xEnd, $yEnd){
        return (($this->x >= $xStart) && ($this->y >= $yStart) &&
            ($this->x < $xEnd) && ($this->y < $yEnd));
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX($x)
    {
        if (!is_int($x)){
            throw new Exception("X must be an int");
        }

        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY($y)
    {
        if (!is_int($y)){
            throw new Exception("Y must be an int");
        }

        $this->y = $y;
    }

    /**
     * Position constructor.
     * @param $x
     * @param $y
     * @throws Exception
     */
    public function __construct($x, $y)
    {
        if ((!is_int($x)) || (!is_int($y))){
            throw new Exception("X and Y must be integers");
        }

        $this->x = $x;
        $this->y = $y;
    }
}