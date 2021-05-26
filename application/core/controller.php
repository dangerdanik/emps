<?php

class Controller
{

    public $model;
    public $view;
    public $model_main;

    function __construct()
    {
        $this->view = new View();
    }

    // действие (action), вызываемое по умолчанию
    function action_index()
    {
        // todo	
    }

    function action_change()
    {
        // todo	
    }

}
