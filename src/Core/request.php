<?php

namespace Teorihandbok\Core;

class Request {

    // Parameters as methods. 
    const GET = 'GET';   // Type of method
    const POST = 'POST'; // Type of method

    private $domain; 
    private $path;
    private $method;     // The method itself
    private $params;
    private $cookies;

    
    public function __construct() {
        $this->domain = $_SERVER['HTTP_HOST'];                          // t.ex teorihandboken.se 
        $this->path = explode('?', $_SERVER['REQUEST_URI'])[0];         // t.ex /posts
        $this->method = $_SERVER['REQUEST_METHOD'];                     // GET, POST
        $this->params = new RequestFilter(array_merge($_POST, $_GET));  // uses the filter-class
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
        return $this->method === self::POST;        // If the method = const POST
    }

    public function isGet(): bool {
        return $this->method === self::GET;         // If the method = const GET
    }

    public function getParams(): RequestFilter {
        return $this->params;
    }

    public function getCookies(): RequestFilter {
        return $this->cookies;
    }
}