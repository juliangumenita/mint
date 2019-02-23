<?php
  class Random{
    const ALL = "all";
    const NUMBER = "number";
    const LOWERCASE = "lowercase";
    const LOWERCASE_NUMBER = "lowercase-number";
    const UPPERCASE = "uppercase";
    const UPPERCASE_NUMBER = "uppercase-number";
    const LOWERCASE_UPPERCASE = "lowercase-uppercase";

    public static function number(int $minNumber, int $maxNumber, $between = false){
      $min = ($between) ? $minNumber + 1 : $minNumber;
      $max = ($between) ? $maxNumber - 1 : $maxNumber;
      return rand($min, $max);
    }
    public static function string($lenght = 16, $mode = self::ALL){
      $set = array(
        "lowercase" => "abcdefghijklmnopqrstuvwxyz",
        "uppercase" => "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
        "number" => "0123456789"
      );
      $list = array(
        self::ALL => $set["lowercase"] . $set["uppercase"] . $set["number"],
        self::NUMBER => $set["number"],
        self::LOWERCASE => $set["lowercase"],
        self::LOWERCASE_NUMBER => $set["lowercase"] . $set["number"],
        self::UPPERCASE => $set["uppercase"],
        self::UPPERCASE_NUMBER => $set["uppercase"] . $set["number"],
        self::LOWERCASE_UPPERCASE => $set["lowercase"] . $set["uppercase"]
      );
      $charset = $list[$mode];
      $charsetLenght = strlen($charset);
      $string = NULL;
      for ($i = 0; $i < $lenght; $i++) {
          $string .= $charset[rand(0, $charsetLenght - 1)];
      }
      return $string;
    }
    public static function select(){
      $count = func_num_args();
      if($count == 0){
        return NULL;
      }
      $arguments = func_get_args();
      return $arguments[self::number(0, $count - 1)];
    }
  }
?>
