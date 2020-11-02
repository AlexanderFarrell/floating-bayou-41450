<?php

require_once("World.php");
require_once("Entity.php");
require_once("Player.php");
require_once("Position.php");

class Game
{
    private $world;
    private $player;
    private $playerEntity;

    /**
     * @return Entity
     */
    public function getPlayerEntity()
    {
        return $this->playerEntity;
    }

    /**
     * @param mixed $playerEntity
     * @return Game
     */
    public function setPlayerEntity($playerEntity)
    {
        $this->playerEntity = $playerEntity;
        return $this;
    }

    /**
     * Game constructor.
     */
    public function __construct()
    {
        $this->world = new World();
    }

    /**
     * @return World
     */
    public function getWorld()
    {
        return $this->world;
    }

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param mixed $player
     * @param $position
     * @throws Exception
     */
    public function setPlayerAndGiveEntity($player, $position)
    {
        if ((!$player instanceof Player) || (!$position instanceof Position)) {
            throw new Exception("Player and Position must be their appropriate types.");
        }

        $this->player = $player;
        $this->playerEntity = new Entity($position, 'Player.png');
        $this->world->addEntity($this->playerEntity);
        $this->playerEntity->addComponent($player);
    }
}