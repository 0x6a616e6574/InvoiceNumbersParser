<?php
require_once "Numbers.php";

class InvoiceNumbersParser
{
  const LENGTH_OF_INVOICE_NUMBER = 9;
  const LENGTH_OF_NUMBER_IN_ONE_LINE = 3;

  private function splitLine($line){
    $lineSplitted = str_split($line, self::LENGTH_OF_NUMBER_IN_ONE_LINE);
    return $lineSplitted;
  }

  public function parseFile($path, $out){
    $numbers = Numbers::getInstance();
    $handle = fopen($path, "r");
    file_put_contents($out, "");
    if ($handle) {
      while (($line1 = fgets($handle)) !== false &&
             ($line2 = fgets($handle)) !== false &&
             ($line3 = fgets($handle)) !== false &&
             ($line4 = fgets($handle)) !== false){
        $splittedLine1 = $this->splitLine($line1);
        $splittedLine2 = $this->splitLine($line2);
        $splittedLine3 = $this->splitLine($line3);
        $decimalNumber = "";
        $isLegalLine = true;

        for($i = 0; $i < self::LENGTH_OF_INVOICE_NUMBER; $i++){
          $digit = $numbers->getDecimalDigit(array($splittedLine1[$i], $splittedLine2[$i], $splittedLine3[$i]));
          if (!isset($digit)){
            $digit = "?";
            $isLegalLine = false;
          }
          $decimalNumber .= $digit;
        }
        if (!$isLegalLine){
          $decimalNumber .= " ILLEGAL";
        }
        file_put_contents($out, $decimalNumber."\n", FILE_APPEND);
      }

      $decimalNumber = "";
      if (($line1 !== false) && ($line2 === false) || ($line3 === false) || ($line4 === false)){
        for($i = 0; $i < self::LENGTH_OF_INVOICE_NUMBER; $i++){
          $decimalNumber .= "?";
        }
        $decimalNumber .= " ILLEGAL";
        file_put_contents($out, $decimalNumber."\n", FILE_APPEND);
      }
      fclose($handle);
    }else{
      throw new Exception("Cannot open the file: {$path}");
    }
  }
}
?>
