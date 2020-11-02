<?php

/** 
 * @author              Author: Adenilton Batista Xavier. (adeniltonxavier14@gmail.com, number: 31 99473-7478)
 */

namespace chatC;

use \PDO;
use PDOException;
use \DateTime;
use \DateTimeZone;
use Exception;

class DataBase2
{
    # @var, Db param
    private $hostname = 'localhost';
    private $user = 'credmilla2';
    private $password = 'Hbg_37';
    private $dbname = 'credmillacomchat';



    private $dsn;
    # @object, The PDO object
    private $pdo;
    private $bConnected = false;


    public function __construct()
    {
        $this->Connect();
    }

    public function Connect()
    {
        $dsn = 'mysql:dbname=' . $this->dbname . ';host=' . $this->hostname;
        try {

            $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $th) {
            throw new Exception( $th->getMessage());
        }
    }

    public function CloseConnection()
    {
        # Set object pdo to null to close connection
        $this->pdo = null;
    }

    public function FetchAllData($sql, $props)
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($props);
            return $stmt->fetchAll();
        } catch (PDOException $th) {
            echo $th->getMessage();
            die();
        }
    }

    public function AddChatMessage($dbname, $sql)
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetch;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function insertData($sql, $param){
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($param);
            return $stmt->rowCount();
        } catch (PDOException $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function deleteData($sql, $param){
        $this->insertData($sql, $param);
    }
    public function updateData($sql, $param){
        $this->insertData($sql, $param);
    }

}
