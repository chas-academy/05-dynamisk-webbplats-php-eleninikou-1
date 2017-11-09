<?php

namespace Teorihandbok\Controllers;

use Teorihandbok\Exceptions\NotFoundException;

class DefaultController extends AbstractController
{
    public function start(): string
    {
        $properties = [
        
        ];

        return $this->render('views/layout.php', $properties);
    }

}
