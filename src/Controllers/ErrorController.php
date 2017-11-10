<?php

namespace Teorihandbok\Controllers;
use Teorihandbok\Core\Request;

class ErrorController extends AbstractController
{
    public function notFound(): string
    {
        // Visar error message i error.php
        $properties = ['errorMessage' => 'Page not found!'];
        return $this->render('views/error.php', $properties);
    }
}
