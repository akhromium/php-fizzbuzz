<?php

namespace Insane;

class FizzBuzz
{
  /**
   * Returns number or fizz|buzz|fizzbuzz for given item.
   *
   * @param int $number
   *
   * @return string
   */
    public function fire($number)
    {
        if($number%15 == 0) return 'fizzbuzz';
        if($number%5 == 0) return 'buzz';
        if($number%3 == 0) return 'fizz';
        return $number;
    }
}
