<?php

require_once('BaseView.php');

class HeaderPage extends BaseView
{
    private $title = 'Game';

    /**
     * HeaderPage constructor.
     * @param string $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getHtml()
    {
        return '<head>
                    <title>' . $this->getTitle() . '</title>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Forum&display=swap" >
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap" >
                    <link rel="stylesheet" href="_View/_Stylesheets/GameStyleSheet.css">
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
                        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
                        crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" 
                        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" 
                        crossorigin="anonymous"></script>
                    <script type="text/javascript" src="_View/OnClickHandler.js"></script>
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                </head>';
    }
}