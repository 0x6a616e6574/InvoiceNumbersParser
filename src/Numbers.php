<?php
require_once "Digit.php";

class Numbers
{
  private static $instance = null;
  private $legalDigits;

  public static function getInstance()
  {
    if (!self::$instance)
    {
      self::$instance = new Numbers();
      self::$instance->init();
    }
    return self::$instance;
  }

  private function init(){
    $this->legalDigits = array(
      new Digit(array(' _ ',
                      '| |',
                      '|_|'), 0),

      new Digit(array('   ',
                      '  |',
                      '  |',), 1),

      new Digit(array(' _ ',
                      ' _|',
                      '|_ ')  , 2),

      new Digit(array(' _ ',
                      ' _|',
                      ' _|')  , 3),

      new Digit(array('   ',
                      '|_|',
                      '  |')  , 4),

      new Digit(array(' _ ',
                      '|_ ',
                      ' _|')  , 5),

      new Digit(array(' _ ',
                      '|_ ',
                      '|_|')  , 6),

      new Digit(array(' _ ',
                      '  |',
                      '  |') , 7),

      new Digit(array(' _ ',
                      '|_|',
                      '|_|') , 8),

      new Digit(array(' _ ',
                      '|_|',
                      ' _|') , 9)
    );
  }

  private function __construct(){}

  public function getDecimalDigit(array $asciiDigit){
    foreach ($this->legalDigits as $key => $digit) {
      if ($digit->isEqual($asciiDigit)){
        return $digit->getDecimalDigit();
      }
    }
  }
}
