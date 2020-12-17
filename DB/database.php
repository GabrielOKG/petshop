<?php 
namespace DB;
class Conn{
    private static $conn;

    public function connect(){
        $params = parse_ini_file('database.ini');
        if ($params === false){
            throw Exception("Erro reading database configuration file");

        }
     // Conecta ao postgres
     $conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=!a2b3c4d5", 
     $params['host'], 
     $params['port'], 
     $params['database'], 
     $params['user'], 
    );

$pdo = new \PDO($conStr);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

return $pdo;
}

/**
* retorna uma instancia da coneccao do banco de dados
* @return type
*/
public static function get() {
if (null === static::$conn) {
 static::$conn = new static();
}

return static::$conn;
}
}