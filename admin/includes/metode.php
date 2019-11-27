<?php

class Metode{

    public static function find_all() {

        return static::find_this_query("SELECT * FROM " . static::$db_table. " ");
    
    }
    
    public static function find_sto_by_id($id) {
    
        $the_result_array = static::find_this_query("SELECT * FROM ". static::$db_table . " WHERE id = $id ");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    
    }




}

















?>