<?php

  function is_number($number, $min = 0, $max = 100): bool
  {
    return ($number >= $min and $number <= $max);
  } 

  function is_valid_integer($input) {
    if (filter_var($input, FILTER_VALIDATE_INT) === false) {
        return false;
    } else {
        return true;
    }
}

  function is_username($text, $min = 0, $max = 1000)
  {
    $length = mb_strlen($text);
    return ($length >= $min and $length <= $max);
  } 

  function is_name($text, $min = 0, $max = 1000)
  {
  
    if ( mb_strlen($text) >= 1 and mb_strlen($text) <=30
         || preg_match('/[A-Z]/', $text)
         || preg_match('/[a-z]/', $text)
       ) {
      return true;  // Passed all tests
    } 
    return false;
  } 
  function is_password($password): bool
  {
    if ( mb_strlen($password) >= 8 and mb_strlen($password) <=20
         and preg_match('/[A-Z]/', $password)
         and preg_match('/[a-z]/', $password)
         and preg_match('/[0-9]/', $password)
       ) {
      return true;  // Passed all tests
    } 
    return false;   // Invalid
  }
 ?> 