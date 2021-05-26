<?php

class View
{
    function generate($content_view, $template_view, $data = null, $alert = null)
    {
        include 'application/views/' . $template_view;
    }
}
