<?php

namespace app\controller;
class Test
{
    public function hello()
    {
        $date=array('a'=>1,'b'=>2,'c'=>3);
        return json($date);

    }

}