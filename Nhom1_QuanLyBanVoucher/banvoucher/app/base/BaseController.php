<?php


class BaseController
{
    private $twig;

    function  __construct()
    {

        $loader = new \Twig\Loader\FilesystemLoader('app/view/');
        $this->twig = new \Twig\Environment($loader);
    }

    protected function render($view_name, $data = array()){
        $view_folder = get_called_class();
        $view_folder = str_replace('Controller','',$view_folder);
        $view_folder = strtolower($view_folder);

        $view_path = "$view_folder/$view_name";
        echo $this->twig->render($view_path,$data);
    }


    public function error(){
        echo "Không tìm thấy action";
    }


}


