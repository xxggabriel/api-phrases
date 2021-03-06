<?php 

namespace App\Model;

use App\Config;

class Sql
{

    private $conn;
    public function __construct()
    {
		header("Content-Type: text/html; charset=UTF-8",true);
        try {
            $config = new Config();
            $this->conn = new \PDO('mysql:host='.$config->getDatabase('host').
            ';dbname='.$config->getDatabase('dbname').';',
            $config->getDatabase('user'),
			$config->getDatabase('password'),
			array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));   
        } catch (\PDOException $e) {
            throw new \Exception("Erro: ".$e->getMessage()."\n".
                                "Code: ".$e->getCode()."\n".
                                "File: ".$e->getFile()."\n".
                                "Line: ".$e->getLine()."\n" );
        }
        
    }

    private function setParams($statement, $parameters = array())
	{
		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);
		}
	}
	private function bindParam($statement, $key, $value)
	{
		$statement->bindParam($key, $value);
	}
	public function query($rawQuery, $params = array())
	{
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
	}
	public function select($rawQuery, $params = array()):array
	{
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function backup()
	{
		$config = new Config;
		exec("mysqldump --routines -u ".$config->getDatabase("user")." -p". $config->getDatabase("password")." ".$config->getDatabase("dbname") ."> ". $_SERVER["DOCUMENT_ROOT"] . "/app/Backups/backup-".date("Y-m-d_H:i:s").".sql");
		
		// sleep(5);
		exec("git add ".$_SERVER["DOCUMENT_ROOT"] . "/app/Backups/*");
		exec("git commit -m 'Backup do banco de dados '". date("Y/m/d"));
		exec("git push origin master");
		
	}	
}