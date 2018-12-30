<?php
  class Random{
    public static function number(int $minNumber, int $maxNumber, $between = false){
      $min = ($between) ? $minNumber + 1 : $minNumber;
      $max = ($between) ? $maxNumber - 1 : $maxNumber;
      return rand($min, $max);
    }
    public static function string($lenght = 16, $mode = "all"){
      $set = array(
        "lovercase" => "abcdefghijklmnopqrstuvwxyz",
        "uppercase" => "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
        "number" => "0123456789"
      );
      $list = array(
        "all" => $set["lovercase"] . $set["uppercase"] . $set["number"],
        "number" => $set["number"],
        "lovercase" => $set["lovercase"],
        "lovercase-number" => $set["lovercase"] . $set["number"],
        "uppercase" => $set["uppercase"],
        "uppercase-number" => $set["uppercase"] . $set["number"],
        "lovercase-uppercase" => $set["lovercase"] . $set["uppercase"]
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
