<?php

require_once 'IEntityComponent.php';

class Food implements IEntityComponent
{
    private $container;

    public function SetContainer($container)
    {
        $this->container = $container;
    }

    public function Start()
    {

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