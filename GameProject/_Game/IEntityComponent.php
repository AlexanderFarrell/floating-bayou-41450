<?php


interface IEntityComponent
{
    public function SetContainer($container);
    public function Start();
    public function TakeTurn();
    public function End();
}