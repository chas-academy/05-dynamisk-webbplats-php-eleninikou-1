<?php

    /* Keeps track of all instances of classes and makes sures
    that they only get instanciated? once. Good when you use
    this typ of connection to a database and you want to make
    sure that you are using the same connection all the time */ 

    // In utils
    namespace Teorihandbok\Utils;
    
    /* Don't want to create a new Singelton so -> 
    ABSTRACT so that they can extend from it instead */
    abstract class Singleton
    {
        // Can be used from different classes in different places
        private static $instances = array();
        protected function __construct()
        {
        }

        public static function getInstance()
        {   
            // Gets the name of the class the static method is called in 
            $class = get_called_class();
            // If the class isn't in the array of $instances -> create a new static
            if (!isset(self::$instances[$class])) {
                self::$instances[$class] = new static();
            }
            return self::$instances[$class];
        }
        private function __clone()
        {
        }
        private function __wakeup()
        {
        }
    }
