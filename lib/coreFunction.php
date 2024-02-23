<?php
include_once("db.php");

class CoreFunction extends Database{
    function setQuery ($sql) {
        $result = $this->conn->query($sql);
        if (!$result) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }
    
    function setQueryReturnId ($sql) {
        $result = $this->conn->query($sql);
        if (!$result) {
            die("Query failed: " . $this->conn->error);
        }
        $id=mysqli_insert_id($this->conn);
        return $id;
    }
    function getAll($sql){
        $result = $this->setQuery($sql);
        $a = array();
        while ($row = $result ->fetch_assoc()) { 
            $a[] = $row;
        }
        return $a;
    }
    function getOne($sql) {
        $result = $this->setQuery($sql);
        $a = $result->fetch_assoc();
        return $a;
    }
    function getNumRows($result){
        return $this->conn->mysql_num_rows($result);
    }
    function authUser($user, $pwd)
    {
        $sql = 'SELECT password FROM user WHERE username = "'.$user.'"';
        $result = $this->getOne($sql);
        return password_verify($pwd, $result['password']);
        //true login thành công, false login thất bại
        //return password_verify($pwd, $a['password']); //check pwd
        //password_hash($pwd, PASSWORD_DEFAULT); //create pwd
    }
    
    function addRecord($table, $params= array()){
        $sql = "INSERT INTO ". $table ."(";
        $txtkey = "";
        $txtValue="";
        $i = 0;
        foreach ($params as $key => $value) { 
            if($i<count($params) -1) {
                $txtkey .= "`". $key ."`, "; 
                $txtValue .= "'". $value ."', ";
            }
            else{
                $txtkey .="`". $key."`"; 
                $txtValue .="'". $value."'";
            }
            $i++;
        }
        $sql .= $txtkey;
        $sql .= ") VALUES (";
    
        $sql .= $txtValue;
        $sql .= ")";
        $this->setQuery($sql);
    }
    
    function addRecordReturnId($table, $params= array()){
        $sql = "INSERT INTO ". $table ."(";
        $txtkey = "";
        $txtValue="";
        $i = 0;
        foreach ($params as $key => $value) { 
            if($i<count($params) -1) {
                $txtkey .= "`". $key ."`, "; 
                $txtValue .= "'". $value ."', ";
            }
            else{
                $txtkey .="`". $key."`"; 
                $txtValue .="'". $value."'";
            }
            $i++;
        }
        $sql .= $txtkey;
        $sql .= ") VALUES (";
    
        $sql .= $txtValue;
        $sql .= ")";
       return $this->setQueryReturnId($sql);
    }
    function editRecord($table, $id, $params) {
        $txtSet = "";
        $i = 0;
        foreach($params as $key => $value) {
            if($i<count($params) - 1){
                $txtSet .= "$key = '$value', ";
            }
            else{
                $txtSet .= "$key = '$value' ";
            }
            $i++;
        }
        $sql = "UPDATE ". $table. " SET ". $txtSet. " WHERE id = $id";
        $this->setQuery($sql);
    }
    function delRecord($table, $id) {  
        $sql = "DELETE FROM ".$table." WHERE id = ".$id;
        $this->setQuery($sql);
    }



    //kiem tra sự tồn tại 
    function checkExist($table, $record, $value){
        $sql = "SELECT * FROM $table WHERE $record = '$value'";
        $result = $this->getAll($sql);
        $message ="";
        if(count($result) > 0){
            $message = "$value đã tồn tại";
            return $message;
        }
        return 1;  
    }
    function message($txt){
        $url=$_SERVER['REQUEST_URI'];
        $s="<script>";
        $s.= "confirm('".$txt."');";
        $s.= "window.location ='".$url."'";
        $s.="</script>";
        echo $s;
    }
}
?>

