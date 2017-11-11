<?php

namespace Teorihandbok\Controllers;

class DefaultController extends AbstractController
{
    public function start(): string
    {
        // Empty beacuse i need to send it in as a parameter render();
        $properties = [];

        return $this->render('./views/layout.html', $properties);
    }

}
