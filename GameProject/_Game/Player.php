<?php

require_once("IEntityComponent.php");
require_once 'GameManager.php';
require_once 'Food.php';
require_once 'Entity.php';

class Player implements IEntityComponent
{
    private $container;
    public $hunger = 30;
    public $deathMessage;

    /**
     * Player constructor.
     */
    public function __construct()
    {
        $hunger = 30;
    }

    public function SetContainer($container)
    {
        $this->container = $container;
    }

    public function Start()
    {
        $this->container->setImageName('_Content/Player.png');
        $this->hunger = 25;
    }

    public function TakeTurn()
    {
        foreach (GameManager::GetGame()->getWorld()->getEntities() as $entity){
            if (isset($entity)){
                $x = $entity->getPosition()->getX();
                $y = $entity->getPosition()->getY();

                //If they are colliding.
                if (($x == $this->container->getPosition()->getX()) && ($y == $this->container->getPosition()->getY())){
                    if ($entity->getComponent(Food::class) != null){
                        $this->Eat($entity);
                    }
                }
            }
        }

        $this->hunger--;

        if ($this->hunger == 1){
            $this->DiePlayer();
        }
    }

    private function Eat($entity){
        GameManager::GetGame()->getWorld()->removeEntity($entity);
        $this->hunger += 9;
    }

    public function End()
    {
        // TODO: Implement End() method.
    }

    public function DiePlayer()
    {
        GameManager::GetGame()->active = false;
        $this->deathMessage = 'You ran out of food';
    }
}