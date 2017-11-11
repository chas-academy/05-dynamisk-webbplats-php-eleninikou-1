<?php
    namespace Teorihandbok\Core;

    // The RequestFilter is a class that can extract att filter parameters from requests as key values.
    // Will hold the parameters we get from GET, POST and COOKIES. 


    class RequestFilter
    {
        private $map;

        public function __construct(array $baseMap)
        {
            $this->map = $baseMap;
        }

        public function has(string $name): bool   // Do we have the value we are looking for in map?
        {
            return isset($this->map[$name]);    
        }

        public function get(string $name)
        {
            return $this->map[$name] ?? null;    // Want to get the name -> look in map
        }                                        // ?? = Or


        public function getInt(string $name)     // Type juggling. from string -> int
        {
            return (int) $this->get($name);
        }


        public function getNumber(string $name)
        {
            return (float) $this->get($name);
        }

        public function getString(string $name, bool $filter = true) 
        {
            $value = (string) $this->get($name);
            return $filter ? addslashes($value) : $value; // First step to prevent SQL injections. ? = if true;
        }

    }
