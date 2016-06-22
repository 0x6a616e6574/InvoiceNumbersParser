<?php
class Digit
{
  private $asciiDigit;
  private $decimalDigit;
  const ASCII_DIGIT_SIZE = 3;

  function __construct(array $asciiDigit, $decimalDigit) {
    if (count($asciiDigit) !== self::ASCII_DIGIT_SIZE || !is_int($decimalDigit)
     || $decimalDigit < 0 || $decimalDigit > 9){
      throw new Exception('Illegal digit, please enter array of size '.self::ASCII_DIGIT_SIZE.' and a digit');
    }
    $this->asciiDigit = $asciiDigit;
    $this->decimalDigit = $decimalDigit;
  }

  public function getAsciiDigit(){
    return $this->asciiDigit;
  }

  public function getDecimalDigit(){
    return $this->decimalDigit;
  }

  public function isEqual(array $asciiDigit){
    if (count($asciiDigit) !== self::ASCII_DIGIT_SIZE){
      return false;
    }
    for ($i = 0; $i < self::ASCII_DIGIT_SIZE; $i++) {
      if ($this->asciiDigit[$i] !== $asciiDigit[$i]) {
        return false;
      }
    }
    return true;
  }
}
?>
