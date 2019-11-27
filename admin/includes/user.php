<?php

class User {

    public $id;
    public $username;
    public $password;
    public $status;
    public $createdby;
    public $parent;

public static function find_all_users() {

    return self::find_this_query("SELECT * FROM users ");

}

public static function find_user_by_id($id) {

    $the_result_array = self::find_this_query("SELECT * FROM users WHERE id = $id ");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;

}

public static function find_this_query($sql) {

    global $database;
    $result_set = $database->query($sql); 
    $the_object_array = array();

    while($row = $result_set->fetch(PDO::FETCH_OBJ)) {
        $the_object_array[] = self::instantation($row);
    }

    return $the_object_array;

}

public static function instantation($the_record) {

    $the_object = new self;

    //so instead of doing it manually like this we are using foreach loop
    // $the_object->id         = $found_user['user_id'];
    // $the_object->username   = $found_user['username'];
    // $the_object->password   = $found_user['password'];
    // $the_object->first_name = $found_user['first_name'];
    // $the_object->last_name  = $found_user['last_name'];

    foreach($the_record as $property => $value) {

        if($the_object->has_the_property($property)) {
            $the_object->$property = $value;
        }

    }

    return $the_object;

}

private function has_the_property($property) {

    $object_properties = get_object_vars($this);
    return array_key_exists($property, $object_properties);

}

public static function verify_user($username, $password) {

    global $database;

    $username = $database->escape_string($username);
    $password = $database->escape_string($password);

    // $priprema = $database->connection->prepare("SELECT * FROM users WHERE username = :username AND password = :password LIMIT 1");
    // $priprema->bindParam(':username', $username);
    // $priprema->bindParam(':password', $password);

    // return $priprema->execute();

    $sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1 ";

    $the_result_array = self::find_this_query($sql);
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
    
}

public function create() {

    global $database;

    $sql = "INSERT INTO users (username, password, status, parent) VALUES ('";
    $sql.= $database->escape_string($this->username)   . "', '";
    $sql.= $database->escape_string($this->password)   . "', '";
    $sql.= $database->escape_string($this->status)   . "', '";
    $sql.= $database->escape_string($this->parent)  . "') ";

    $result = $database->query($sql);

    if($result) {
        $this->id = $database->the_insert_id();
        return true;
    } else {
        return false;
    }
    
}

public function update() {

    global $database;

    $sql = "UPDATE users SET ";
    $sql.= "username = '" .   $database->escape_string($this->username) . "', ";
    $sql.= "password = '" .   $database->escape_string($this->password) . "', ";
    $sql.= "first_name = '" . $database->escape_string($this->first_name) . "', ";
    $sql.= "last_name = '" .   $database->escape_string($this->last_name) . "' ";
    $sql.= " WHERE id = " .   $database->escape_string($this->id);

    $database->query($sql);

    return ($database->connection->affected_rows == 1) ? true : false;

}

public function delete() {

    global $database;
    global $session;

    $sql = "DELETE FROM users WHERE id =" . $this->id;
    $database->query($sql);
    
     return($database->connection->affected_rows == 1) ? true : false;


}










}


































?>