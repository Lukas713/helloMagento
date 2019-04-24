<?php

namespace Inchoo\Sample02\Model;

class Dummy implements DummyInterface
{

    public function __construct($input)
    {
        /*
        foreach($input as $key => $value){
            $this->$key = $value;
        }
        */
        print_r($input);
        echo '<br>' . "Dummy";
    }
}