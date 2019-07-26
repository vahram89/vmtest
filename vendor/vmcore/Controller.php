<?php
namespace vendor\vmcore;

class Controller
{
    var $vars = [];
    var $layout = "default";
    public $session;
    public $currentUrl;

    function  __construct() {

        session_start();
        $this->session = $_SESSION;
        $this->currentUrl = $_SERVER['REQUEST_URI'];

        spl_autoload_register(function ($class_name) {
            require ROOT.str_replace('\\', "/",$class_name).'.php';
        });
    }


    function render(string $view, $data=[])
    {
        $this->vars = array_merge($this->vars, $data);
        extract($this->vars);
        ob_start();
        require(ROOT . "views/" . lcfirst (str_replace('Controller', '', get_class($this))) . '/' . $view . '.php');
        $mainContent = ob_get_clean();

        if ($this->layout == false)
        {
            $mainContent;
        }
        else
        {
            require(ROOT . "views/layouts/" . $this->layout . '.php');
        }
    }

    function redirect(string $url) {
        header('Location: '.$url);
    }

    function getParams() {
        $parts = parse_url($this->currentUrl);
        if(!empty($parts['query'])) {
            parse_str($parts['query'], $params);
            return $params;
        }
        else {
            return [];

        }

    }

}
?>