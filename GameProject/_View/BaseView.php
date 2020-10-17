<?php


abstract class BaseView
{
    abstract public function getHtml();
    public function drawHtml(){
        echo $this->getHtml();
    }
}