<?php

class SleekAdminController extends ModuleAdminController
{

    public function initContent()
    {


        //header("Content-Type: application/json");

    }

    public function ajaxProcessUpdateConfiguration()
    {


        die($this->ajaxRender(json_encode(['success' => true])));

    }



}