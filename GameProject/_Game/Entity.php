<?php

require_once("Position.php");
require_once("IEntityContainer.php");
require_once("IEntityComponent.php");

class Entity implements IEntityContainer
{
    private $name = "Unnamed";
    private $position;
    private $components;
    private $character;
    public $currentTile;
    public $imageName;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Position, do not set x and y here
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param Position $position
     * @throws Exception
     */
    public function setPosition($position)
    {
        /*$oldTile = GameManager::GetGame()->getWorld()->getMap()->getTileAt($position->getX(), $position->getY());

        if ($oldTile != null){
            //$oldTile->removeEntity($this);
            $oldTile->overrideChar = " ";
        }*/

        if ($this->currentTile != null){
            $this->currentTile->overrideImage = null;
        }

        $this->position = $position;

        $this->currentTile = GameManager::GetGame()->getWorld()->getMap()->getTileAt($position->getX(), $position->getY());

        if ($this->currentTile != null){
            $this->currentTile->overrideImage = $this->imageName;
        }
    }

    /**
     * Entity constructor.
     * @param $position
     * @throws Exception
     */
    public function __construct($position)
    {
        if (!$position instanceof Position){
            throw new Exception("Position must be a Position");
        }

        $this->position = $position;
        $this->components = array();

        $this->currentTile = GameManager::GetGame()->getWorld()->getMap()->getTileAt($position->getX(), $position->getY());

        if ($this->currentTile != null){
            $this->currentTile->overrideImage = $this->imageName;
        }
    }

    public function TakeTurn(){
        foreach ($this->components as $component){
            $component->TakeTurn();
        }
    }

    public function getComponent($type)
    {
        $keyExists = array_key_exists($type, $this->components);
        return ($keyExists) ? $this->components[$type] : null;
    }

    public function addComponent($component)
    {
        if ($component instanceof IEntityComponent)
        {
            $this->components[get_class($component)] = $component;
            $component->SetContainer($this);
            $component->Start();
        }
    }

    public function removeComponent($type)
    {
        if (array_key_exists($type, $this->components)){
            $this->components[$type]->End();
            unset($type, $this->components);
        }
    }

    /**
     * @return mixed
     */
    public function getCharacter()
    {
        return $this->character;
    }

    public function setImageName($image)
    {
        $this->imageName = $image;
    }
}