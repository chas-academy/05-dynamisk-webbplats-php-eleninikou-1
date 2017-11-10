<?php

namespace Teorihandbok\Controllers;

class DefaultController extends AbstractController
{
    public function start(): string
    {
        // Tom för att jag måste ha med en array i render();
        $properties = [];

        return $this->render('./views/layout.php', $properties);
    }

}
