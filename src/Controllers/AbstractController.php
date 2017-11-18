<?php

namespace Teorihandbok\Controllers;
use Teorihandbok\Core\Request;

abstract class AbstractController
{
    protected $request;
    protected $view;
    protected $userId;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    protected function render(string $templates, array $params): string
    {
        extract($params);

        ob_start();
        include ($_SERVER['DOCUMENT_ROOT'] . '/templates/header.html');
        include $templates;
        include ($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.html');
        
        $renderedView = ob_get_clean();

        return $renderedView;
    }

    // To redirect client to different paths.  
    protected function redirect(string $url) // lägg till array $params = null
    {
                                
        header('Location: '.$url);

    }

}


