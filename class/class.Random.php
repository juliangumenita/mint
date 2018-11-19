<?php
  class Random{
    public static function number(int $_MIN, int $_MAX, $BETWEEN = FALSE){
      $MIN = ($BETWEEN) ? $_MIN + 1 : $_MIN;
      $MAX = ($BETWEEN) ? $_MAX - 1 : $_MAX;
      return rand($MIN, $MAX);
    }
    public static function string($LENGHT = 16, $MODE = "all"){
      $SET = array(
        "lovercase" => "abcdefghijklmnopqrstuvwxyz",
        "uppercase" => "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
        "number" => "0123456789"
      );
      $LIST = array(
        "all" => $SET["lovercase"] . $SET["uppercase"] . $SET["number"],
        "number" => $SET["number"],
        "lovercase" => $SET["lovercase"],
        "lovercase-number" => $SET["lovercase"] . $SET["number"],
        "uppercase" => $SET["uppercase"],
        "uppercase-number" => $SET["uppercase"] . $SET["number"],
        "lovercase-uppercase" => $SET["lovercase"] . $SET["uppercase"]
      );
      $CHARSET = $LIST[$MODE];
      $CHARSET_LENGHT = strlen($CHARSET);
      $STRING = NULL;
      for ($i = 0; $i < $LENGHT; $i++) {
          $STRING .= $CHARSET[rand(0, $CHARSET_LENGHT - 1)];
      }
      return $STRING;
    }
    public static function select(){
      $COUNT = func_num_args();
      if($COUNT == 0){
        return NULL;
      }
      $ARGUMENTS = func_get_args();
      return $ARGUMENTS[self::number(0, $COUNT - 1)];
    }
  }
?>
