<?php

namespace Pulsestorm\TutorialPlugin\Model\Example;

class Plugin
{
    public function afterGetMessage($subject, $result)
    {
        return $result;
    }

/*
    public function beforeGetMessage($subject, $thing='World', $should_lc=false)
    {
        echo "Calling " . __METHOD__,"\n";
        return ['Changing the argument', $should_lc];
    }
*/
    public function aroundGetMessage($subject, $procede, $thing='World', $should_lc=false)
    {
        echo 'Calling' . __METHOD__ . ' -- before',"\n";
        //$result = $procede();
        echo 'Calling' . __METHOD__ . ' -- after',"\n";
        return 'New return value';
    }
}