<?php
function LoadView(string $view, array $data=[], $layout="base"){

        ob_start();
        extract($data);
        require_once(ROOT."/Views/".$view);
        $contentForView=ob_get_clean();
        require_once(ROOT."/Views/layout/".$layout.".layout.php");
}
function dd($data){
    echo "<pre>";
      var_dump($data);
    echo "</pre>";
    die("ok");
}

function path(string $controller,string $action):string{
        return WEBROOT."/?controller= $controller&action=$action";
}