<?php


namespace Inchoo\Sample02\Model;


use Inchoo\Sample02\Controller\Letter;

class B implements Letter
{
    protected $letter;

    public function __construct(
        \Inchoo\Sample02\Controller\Letter $letter
    ){
        $this->letter = $letter;
        echo '<br>' . "bbbbbbbbbbbbbbbbbbbbbbb";
        echo '<hr>';
        var_dump($this->letter);
    }
}