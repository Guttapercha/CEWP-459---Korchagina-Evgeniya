<?php

require_once 'DBClass_Settings.php';

class DBClass {

    private $pdo;
    private $query;

    public function __construct() {
        if (!$this->isConnected())
            $this->connect();
    }

    public function __destruct() {
        if ($this->isConnected())
            $this->disconnect();
    }

    private function connect() {
        try {
            //Create new PDO object.3
            $this->pdo = new PDO("mysql:host=" . DB_URL . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connected = true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function disconnect() {
        try {
            //Setting the connection to null will disconnect from the DB.
            $this->pdo = null;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function isConnected() {
        //If connection is null, means there's no connection.
        return !is_null($this->pdo);
    }

    public function GetContacts() {
        try {
            //Define statement
            $this->query = $this->pdo->query("SELECT id, name, phone, active FROM contact;");            

            //Fetch an array from statement
            return $this->query->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
            return false;
        }
    }

    public function DeleteContact($id) {
        
        $this->query = $this->pdo->prepare("update contact set active='N', deactivate_date=NOW() where id=:id;");
        $this->query->bindParam(':id', $id, PDO::PARAM_INT);
        $this->query->execute();
        }

    public function SortContact($sort) {
        $type="";
            if ($sort == 'name_as') {
                $sort_param = "name";
            } 
            elseif ($sort == 'name_desc') {
                $sort_param = "name";
                $type = "DESC";
            }
            elseif ($sort == 'phone_as') {
                $sort_param = "phone";
            } 
            elseif ($sort == 'phone_desc') {
                $sort_param = "phone";
                $type = "DESC";
            } 
            
            $this->query = $this->pdo->query("SELECT id, name, phone, active FROM contact order by $sort_param $type;");        
            //Fetch an array from statement
            return $this->query->fetchAll(PDO::FETCH_ASSOC);
            
        }
        
    public function AddContact($name, $phone) {
        $this->query = $this->pdo->prepare("insert into contact (name, phone) values (:name, :phone);");

        $this->query->bindParam(':name', $name);
        $this->query->bindParam(':phone', $phone);

        $this->query->execute();
    }

	// Update Contact
    public function UpdateContact($id, $name, $phone) {
        $this->query = $this->pdo->prepare("update contact set name=:name, phone=:phone where id=:id;");
        
        $this->query->bindParam(':id', $id);
        $this->query->bindParam(':name', $name);
        $this->query->bindParam(':phone', $phone);

        $this->query->execute();
    }
	
}
