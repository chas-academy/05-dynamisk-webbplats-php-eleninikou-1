<?php

    /* Håller koll på alla instanser av klasser och ser till
    så att de bara har blivit instaniserade en gång. Bra när
    man sitter med en databasuppkopling, så man vet att det är
    samma uppkoppling man har.   */

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
