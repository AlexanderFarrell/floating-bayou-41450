<?php

require_once("IEntityComponent.php");

class Player implements IEntityComponent
{
    private $container;

    public function SetContainer($container)
    {
        $this->container = $container;
    }

    public function Start()
    {
        // TODO: Implement Start() method.
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