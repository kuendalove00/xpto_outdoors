<?php

namespace app\controller;

class HomeController{

    public function index($params)
    {
        return view('home');
    }

}