<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        if(isset($key)) {
            return(true);
        } else {
            return false;
        }
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        if(isset($key)) {
            return $_POST[$key];
        } else {
            throw new OutOfRangeException('Key entered is not valid');
            return $default;
        }
    }

    public static function getString($key , $max=100, $min=0)
    {   
        $variable = trim(static::get($key));
        if(!isset($variable)) {
            throw new Exception('Variable is not set');
        } 
        if(!is_string($variable)) {
            throw new InvalidArgumentException('Variable is not a string');
        }

        if($variable < $min || strlen($variable) > $max) {
            throw new LengthException('Min and/or max entered were not valid');
        }
        return $variable;
    }

    public static function getNumber($key , $max=100 , $min=0)
    {   
        $variable = str_replace(',', '', static::get($key));
        if(!is_numeric($variable)) {
            throw new InvalidArgumentException('Variable is not set');
        }

        if($min < $variable || $max < strlen($variable)) {
            throw new RangeException('Min and/or max entered were not valid');
        }
        
        return $variable;

        
    }
    public static function dateCheck($key) 
    {   
        $variable = static::get($key);
        $format = 'Y-m-d';
        $dateObject = DateTime::createFromFormat($format, $variable);
        
        if($dateObject) {
            $dateString = $dateObject->date;
            return $dateString;
        } else {
            throw new Exception ('Variable is not a date format');
        }
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}

