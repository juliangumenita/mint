<?php
  class Database{
    private static $_HOST = "localhost";
    private static $_USERNAME = "root";
    private static $_PASSWORD = "";
    private static $_DATABASE = "database";
    /* You can change connection strings here. */


    private static $CONNECTED = FALSE;
    private static $CONNECTION;


    public function __construct(){
      self::$CONNECTION = @mysqli_connect(
        self::$_HOST,
        self::$_USERNAME,
        self::$_PASSWORD,
        self::$_DATABASE
      );
      if(!mysqli_connect_errno(self::$CONNECTION)){
        mysqli_set_charset(self::$CONNECTION, "utf8");
        /* Sets the default charset to UTF8. */
        self::$CONNECTED = true;
      }
  	}


    public static function connected(){
      return self::$CONNECTED;
    }


    public static function secure($STRING){
      if(self::connected()){
        return @mysqli_real_escape_string(self::$CONNECTION, $STRING);
      } return FALSE;
    }
    /* Returns a secure string for risky areas. */


    public static function execute(Query $QUERY){
      @mysqli_query(self::$CONNECTION,$QUERY::sql());
    }
    /* Only executes the query, good for heavy usage. */

    private static function returnCount(string $QUERY){
      $RESULT = @mysqli_query(self::$CONNECTION,$QUERY);
      if($RESULT){
        $COUNT = mysqli_num_rows($RESULT);
        return $COUNT;
      } return 0;
    }
    public static function count(Query $QUERY){
      if(self::connected()){
        return self::returnCount($QUERY::sql());
      } return FALSE;
    }
    /* Returns the count of rows; if not successful, returns 0. */


    private static function returnFetch(string $QUERY){
      $RESULT = @mysqli_query(self::$CONNECTION,$QUERY);
      if($RESULT){
        $ROW = @mysqli_fetch_array($RESULT,MYSQLI_ASSOC);
        return $ROW;
      } return NULL;
    }
    public static function fetch(Query $QUERY){
      if(self::connected()){
        return self::returnFetch($QUERY::sql());
      } return FALSE;
    }
    /* Fetches only one row from query. */


    private static function returnSuccess(string $QUERY){
      return @mysqli_query(self::$CONNECTION,$QUERY);
    }
    public static function success(Query $QUERY){
      if(self::connected()){
        return self::returnSuccess($QUERY::sql());
      } return FALSE;
    }
    /* Returns true if the query successfully executed. */


    private static function returnMultiple(string $QUERY){
      $RESULT = @mysqli_query(self::$CONNECTION,$QUERY);
      if($RESULT){
        $ARRAY = [];
        while($ROW = @mysqli_fetch_array($RESULT,MYSQLI_ASSOC)) {
          @array_push($ARRAY, $ROW);
        }
        return $ARRAY;
      } return FALSE;
    }
    public static function multiple(Query $QUERY){
      if(self::connected()){
        return self::returnMultiple($QUERY::sql());
      } return FALSE;
    }
    /* Fetches multiple rows from query and puts them into an array. */
  }
?>
