<?php

use PHPUnit\Framework\Constraint\IsReadable;

class Operations
{
    public function __construct()
    {
        
    }

    /**
     * Sum 2 numbers
     *
     * @param $n1
     * @param $n2
     * @return integer
     */
    public function sum($n1, $n2)//: int
    {
        if (($n1 == NULL) || ($n2 == NULL) || (!(is_numeric($n1))) || (!(is_numeric($n2))))
        {
            throw new InvalidArgumentException("Values are not numeric");
        }

        return $n1 + $n2;
    }

    public function divide($n1, $n2)//: float
    {
        if (($n1 === NULL) || ($n2 === NULL) || (!(is_numeric($n1))) || (!(is_numeric($n2))))
        {
            throw new InvalidArgumentException("Values are not numeric");
        }

        if ($n2 == 0)
        {
            throw new DivisionByZeroError();
        }

        return $n1 / $n2;
    }
}

?>