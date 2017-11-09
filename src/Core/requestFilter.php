<?php
    namespace Teorihandbok\Core;

    // En klass för att kunna hämta ut och filtrera parametrar från requests som nyckel-värde par. (map)
    // Ska användas för att innehålla parametrar vi får via GET och POST metoderna (samt kakor) via requests. 


    class RequestFilter
    {
        private $map;

        public function __construct(array $baseMap)
        {
            $this->map = $baseMap;
        }

        public function has(string $name): bool   // Finns värdet vi letar efter i mappen??
        {
            return isset($this->map[$name]);    
        }

        public function get(string $name)
        {
            return $this->map[$name] ?? null;    // Vill hämta ut namnet på något. Då vill man titta
        }                                        // i mappen. ?? = Annars  


        public function getInt(string $name)     // Type juggling. från sträng -> heltal
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
            return $filter ? addslashes($value) : $value; // För att förhindra SQL injections. ? = Om satt till true;
        }

    }
