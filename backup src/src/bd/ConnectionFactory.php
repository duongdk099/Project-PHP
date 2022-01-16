<?php
namespace wish\bd;
use \PDO;

class ConnectionFactory{
    private static $config;

    public static function setconfig($fileConfig ){
        self::$config=parse_ini_file($fileConfig,true);
    }

    public static function makeConnection(){
        try {
        $dsn= self::$config['driver'].':host='.self::$config['host'].';dbname='.self::$config['database'];
        $db= new PDO($dsn,self::$config['username'],self::$config['password'],array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES=> false,
            PDO::ATTR_STRINGIFY_FETCHES =>false
        )  );
        $db->prepare('SET NAMES\'UTF8\'')->execute();
        return $db;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function callAuto(){
        self::setconfig('C:\PHP\htdocs\projet_v1\src\conf\conf.ini');
        return self::makeConnection();
        
    }

}

?>