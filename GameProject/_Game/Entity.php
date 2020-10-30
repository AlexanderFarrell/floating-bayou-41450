<?php

require_once("Position.php");
require_once("IEntityContainer.php");
require_once("IEntityComponent.php");

class Entity implements IEntityContainer
{
    private $name = "Unnamed";
    private $position;
    private $components;

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
     * @return Position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param Position $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
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
}