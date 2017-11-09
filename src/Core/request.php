<?php

namespace Teorihandbok\src\Core;
use Teorihandbok\src\Core\requestFilter;

class Request {

    // Parametrar som kommer som metoder
    const GET = 'GET';   // Metodtyper
    const POST = 'POST'; // Metodtyper

    private $domain; 
    private $path;
    private $method;     // Metoden i sig
    private $params;
    private $cookies;

    
    public function __construct() {
        $this->domain = $_SERVER['HTTP_HOST'];                          // t.ex teorihandboken.se 
        $this->path = explode('?', $_SERVER['REQUEST_URI'])[0];         // t.ex /my-posts
        $this->method = $_SERVER['REQUEST_METHOD'];                     // GET, POST
        $this->params = new RequestFilter(array_merge($_POST, $_GET));  // Ska utnyttja filter-klassen
        $this->cookies = new RequestFilter($_COOKIE);                   
    }

    public function getUrl(): string {
        return $this->domain . $this->path;
    }

    public function getDomain(): string {
        return $this->domain;
    }

    public function getPath(): string {
        return $this->path;
    }

    public function getMethod(): string {
        return $this->method;
    }

    public function isPost(): bool {
        return $this->method === self::POST;        // Om metoden = konstanten POST
    }

    public function isGet(): bool {
        return $this->method === self::GET;         // Om metoden = konstanten GET
    }

    public function getParams(): RequestFilter {
        return $this->params;
    }

    public function getCookies(): RequestFilter {
        return $this->cookies;
    }
}