<?php


class GameControlsView extends BaseView
{
    public function getHtml()
    {
        $content = '';

        $content .= '<div class="container">';
        //Row 1
        $content .= '<div class="row">';
        $content .= '<div class="col-sm">';
        $content .= '</div>';
        $content .= '<div class="col-sm">';
        $content .= '<button class="btn btn-primary btn-block" onclick="selectAndTakeTurn(1)">Up</button>';
        $content .= '</div>';
        $content .= '<div class="col-sm">';
        $content .= '</div>';
        $content .= '</div>';
        //Row 2
        $content .= '<div class="row">';
        $content .= '<div class="col-sm">';
        $content .= '<button class="btn btn-primary btn-block" onclick="selectAndTakeTurn(2)">Left</button>';
        $content .= '</div>';
        $content .= '<div class="col-sm">';
        $content .= 'Choose a Direction to Walk';
        $content .= '</div>';
        $content .= '<div class="col-sm">';
        $content .= '<button class="btn btn-primary btn-block" onclick="selectAndTakeTurn(3)">Right</button>';
        $content .= '</div>';
        $content .= '</div>';
        //Row 3
        $content .= '<div class="row">';
        $content .= '<div class="col-sm">';
        $content .= '</div>';
        $content .= '<div class="col-sm">';
        $content .= '<button class="btn btn-primary btn-block" onclick="selectAndTakeTurn(4)">Down</button>';
        $content .= '</div>';
        $content .= '<div class="col-sm">';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';

        return $content;
    }
}