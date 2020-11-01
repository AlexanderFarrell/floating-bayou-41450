<?php


interface IEntityContainer
{
    public function getPosition();
    public function setPosition($position);
    public function getName();
    public function setName($name);
    public function getComponent($type);
    public function addComponent($component);
    public function removeComponent($type);
    public function setImageName($image);
}