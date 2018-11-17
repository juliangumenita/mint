<?php
  class Query{
    private static $_SQL;
    public function __construct($SQL = NULL){
      self::$_SQL = $SQL;
  	}
    public static function sql(){
      return self::$_SQL;
    }
    /*
      We will use this class for more utilization later on.
    */
  }
?>
