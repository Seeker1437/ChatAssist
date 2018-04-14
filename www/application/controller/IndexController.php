<?php

/**
 * Created by PhpStorm.
 * User: Darnell
 * Date: 12/11/2016
 * Time: 3:33 PM
 */
class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->View->render("index/index");
    }
}