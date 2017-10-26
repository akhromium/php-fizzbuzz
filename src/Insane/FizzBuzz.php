<?php

namespace Insane;

class FizzBuzz {

  /**
   * Returns number|fizz|buzz|fizzbuzz for given item.
   *
   * @param int $number
   *
   * @return string
   */
  public function fire(int $number) {
    if ($number % 15 == 0) {
      return 'fizzbuzz';
    }
    if ($number % 5 == 0) {
      return 'buzz';
    }
    if ($number % 3 == 0) {
      return 'fizz';
    }
    return $number;
  }

  /**
   * Returns array of number|fizz|buzz|fizzbuzz for a given range.
   *
   * @param array $array
   *
   * @return array of FizzBuzz stuff.
   */
  public function sequence(array $array): array {
    $output = [];
    for ($i = 0; $i < count($array); $i++) {
      $output[] = $this->fire($array[$i]);
    }
    return $output;
  }

  /**
   * Returns array of number|fizz|buzz|fizzbuzz for a given upper limit.
   *
   * @param int $limit
   *
   * @return array
   */
  public function to(int $limit) {
    $output = array_map(function ($index) {
      return $this->fire($index);
    }, range(1, $limit));
    return $output;
  }
}
