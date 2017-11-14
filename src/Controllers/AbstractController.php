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
        // include $views;
        include $templates;
        include ($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.html');
        
        $renderedView = ob_get_clean();

        return $renderedView;
    }

    // To redirect client to different paths.  
    protected function redirect(string $url) // lägg till array $params = null
    {

        // if (isset($params)) {
        //    $queryparams = http_build_query($params);
        //    $url = $url . '?' . $queryparams;
        //}

        ob_start();                          // ob_start will turn output buffering on. While output  
        header('Location: '.$url);           // buffering is active no output is sent from the script
        ob_end_flush();                      // (other than headers), instead the output is stored in 
        die();                               // an internal buffer. ob_en_flush Flush (send) the output
                                             // buffer and turn off output buffering
    }

}


