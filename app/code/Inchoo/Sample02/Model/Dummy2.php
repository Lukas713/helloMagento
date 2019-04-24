<?php

namespace Inchoo\Sample02\Model;

class Dummy2 extends Dummy
{
    public function __construct($input)
    {
        foreach($input as $key => $value){
            $this->$key = $value;
        }
        echo "Dummy2";
    }
}