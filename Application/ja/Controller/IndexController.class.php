<?php

class IndexController extends Controller
{

    public function index()
    {
        include APP_PATH . $this->url_lang . '/Views/Index_index.html';
    }

    public function mobile()
    {
        include APP_PATH . $this->url_lang . '/Views/Index_mobile.html';
    }

    public function games()
    {
        include APP_PATH . $this->url_lang . '/Views/Index_games.html';
    }
}
