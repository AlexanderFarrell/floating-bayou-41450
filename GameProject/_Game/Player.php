<?php

require_once("IEntityComponent.php");

class Player implements IEntityComponent
{
    private $container;
    public $hunger;

    public function SetContainer($container)
    {
        $this->container = $container;
    }

    public function Start()
    {
        $this->container->setImageName('_Content/Player.png');
    }

    public function TakeTurn()
    {
        // TODO: Implement TakeTurn() method.
    }

    public function End()
    {
        // TODO: Implement End() method.
    }
}