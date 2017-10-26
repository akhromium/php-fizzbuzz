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

  /**
   * Just for fun.
   *
   * @param int $limit
   *
   * @return array
   */
  public function toBinary(int $limit) {
    // labels element offset.
    $labels = ['', 'fizz', 'buzz', 'fizzbuzz'];
    $output = [];

    // Right -> Left
    // Divisible state:
    // 11 00 00 01 00 10 01 00 00 01 10 00 01 00 00
    // 15 14 13 12 11 10 9  8  7  6  5  4  3  2  1
    // 11 - fizzbuzz
    // 10 - buzz
    // 01 - fizz
    // 00 - number
    $state = bindec("110000010010010000011000010000"); // 0x810092048

    foreach (range(1, $limit) as $i) {
      // Match on last two bits ( 3 is 0011 - only last 2 bits set )
      $offset = $state & 3;

      // if $offset > 0
      if ($offset) {
        $output[] = $labels[$offset];
      }
      else {
        $output[] = $i;
      }
      // shift right, shift left, then or
      // 1. shift 2 bits right to a next 00 -> 00 -> 01 .. etc
      // 2. add 28 bits on the left offset
      $state = $state >> 2 | $offset << 28;
    }

    return $output;
  }
}
