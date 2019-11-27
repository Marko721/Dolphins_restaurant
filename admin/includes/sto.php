
<?php

class Sto extends Metode {

    public static $db_table = "stolovi";

    public $id;
    public $broj_stolica;
    public $zauzete_stolice;
    public $poruceno;
    public $iznos_racuna;
    public $rezervacija;
    public $zarada;
    public $id_konobara;
    public $ime_konobara;
    public $naplaceno;

    // public static function find_all() {

    //     return static::find_this_query("SELECT * FROM " . static::$db_table. " ");
    
    // }
    
    // public static function find_sto_by_id($id) {
    
    //     $the_result_array = self::find_this_query("SELECT * FROM stolovi WHERE id = $id ");
    //     return !empty($the_result_array) ? array_shift($the_result_array) : false;
    
    // }

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

        $calling_class = get_called_class();
        $the_object = new $calling_class;
    
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

    public function create() {

        global $database;
    
        $sql = "INSERT INTO stolovi (broj_stolica) VALUES ('";
        $sql.= $database->escape_string($this->broj_stolica)  . "') ";
    
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
    
        $sql = "UPDATE stolovi SET ";
        $sql.= "broj_stolica = '" .   $database->escape_string($this->broj_stolica) . "', ";
        $sql.= "zauzete_stolice = '" .   $database->escape_string($this->zauzete_stolice) . "', ";
        $sql.= "rezervacija = '" .   $database->escape_string($this->rezervacija) . "' ";
        $sql.= " WHERE id = " .   $database->escape_string($this->id);
    
        $database->query($sql);
    
    }

    public function update_konobar() {
    
        global $database;
    
        $sql = "UPDATE stolovi SET ";
        $sql.= "id_konobara = '" .   $database->escape_string($this->id_konobara) . "' ";
        $sql.= " WHERE id = " .   $database->escape_string($this->id);
    
        $database->query($sql);
    
        return ($database->connection->affected_rows == 1) ? true : false;
    
    }

    public function porudzbina() {
    
        global $database;

        $sql = "UPDATE stolovi SET ";
        $sql.= "poruceno = '" .   $database->escape_string($this->poruceno) . "', ";
        $sql.= "iznos_racuna = '" .   $database->escape_string($this->iznos_racuna) . "', ";
        $sql.= "zarada = '" .   $database->escape_string($this->zarada) . "', ";
        $sql.= "zauzete_stolice = '" .   $database->escape_string($this->zauzete_stolice) . "', ";
        $sql.= "naplaceno = '" .   $database->escape_string($this->naplaceno) . "' ";
        $sql.= " WHERE id = " .   $database->escape_string($this->id);
    
        $database->query($sql);
    
        return ($database->connection->affected_rows == 1) ? true : false;
    
    }
    
    public function delete() {
    
        global $database;
    
        $sql = "DELETE FROM stolovi WHERE id =" . $this->id;
        $database->query($sql);
        
         return($database->connection->affected_rows == 1) ? true : false;
    
    
    }





}



























?>