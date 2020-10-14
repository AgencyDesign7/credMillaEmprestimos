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

class DataBase
{
    # @var, Db param
    private $hostname = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'credmilla_db';



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

    public function FetchAllData($sql)
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
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

    public function initSession($nameUser)
    {
        $timeZone = new DateTimeZone('Brazil/East');
        $dateTime = new DateTime();
        $dateTime->setTimezone($timeZone);
        try {
            $stmt = $this->pdo->prepare("INSERT INTO `queue_users` (`name`, `session`, `date_time`) VALUES (?,?,?)");
            // $stmt->bindParam(1, $nameUser);
            // $stmt->bindParam(2,session_id());
            // $stmt->bindParam(3, $dateTime->format('Y-m-d H:i:s'));
            $stmt->execute(['marcos', '15123151', '2020-10-10 22:22:45']);
            //return $stmt->fetch;
        } catch (\Exception $th) {
            $_SESSION['ERROR-DB'] = $th->getMessage();
        }
    }
    public function insetData($sql, $param = []){
        try {
            $stmt = $this->pdo->prepare($sql);
            // $stmt->bindParam(1, $nameUser);
            // $stmt->bindParam(2,session_id());
            // $stmt->bindParam(3, $dateTime->format('Y-m-d H:i:s'));
            $stmt->execute($param);
            //return $stmt->fetch;
        } catch (PDOException $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function deleteData($sql, $param = []){
        $this->insetData($sql, $param);
    }
    public function updateData($sql, $param = []){
        $this->insetData($sql, $param);
    }

}
