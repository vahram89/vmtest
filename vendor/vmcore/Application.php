<?php


class Application {

    public $url;
    public $request;

    public function __construct()
    {
        $this->url = $_SERVER["REQUEST_URI"];
    }

    public function run() {
        $this->request = new Request();
        $this->parseRout($this->url, $this->request);

        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    private function parseRout($url, $request) {

        $url = trim($url);

        //check Get
        $getParams = strpos($url, '?');
        if ($getParams !== false) {
            $url = substr($url, 0, $getParams);
        }

        if ($url == "/")
        {
            $request->controller = "site";
            $request->action = "index";
            $request->params = [];
        }
        else {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 1);
            $request->controller = $explode_url[0];
            if(!empty($explode_url[1])) {
                $request->action = $explode_url[1];
            }
            else {
                $request->action = 'index';
            }

            $request->params = array_slice($explode_url, 2);
        }

    }

    public function loadController()
    {
        $name = ucfirst($this->request->controller) . "Controller";
        $file = ROOT . 'controllers/' . $name. '.php';
        require($file);
        $controller = new $name();
        return $controller;
    }
}