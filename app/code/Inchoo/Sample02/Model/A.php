<?php


namespace Inchoo\Sample02\Model;


use Inchoo\Sample02\Controller\Letter;

class A implements Letter
{
    protected $letter;

    public function __construct()
    {
        echo "aaaaaaaaaaaaaaaaaaaaaa";
    }
}