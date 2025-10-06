<?php

class Category extends DatabaseObject {
    
    static protected $table_name = 'categories';
    static protected $db_columns = ['categoryID', 'categoryName'];
    
    public $categoryID;
    public $categoryName;
    
    public function __construct($args = []) {
        $this->categoryID = $args['categoryID'] ?? null;
        $this->categoryName = $args['categoryName'] ?? '';
    }
    
    // Override find_by_id to use categoryID
    static public function find_by_id($id) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE categoryID='" . self::$database->escape_string($id) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }
    
    // Override delete to use categoryID
    public function delete() {
        $sql = "DELETE FROM " . static::$table_name . " ";
        $sql .= "WHERE categoryID='" . self::$database->escape_string($this->categoryID) . "' ";
        $sql .= "LIMIT 1";
        
        // Log the SQL query
        if(isset(self::$logger)) {
            self::$logger->info("SQL Query: " . $sql);
        }
        
        $result = self::$database->query($sql);
        if(!$result) {
            if(isset(self::$logger)) {
                self::$logger->error("Delete query failed: " . $sql);
            }
        }
        return $result;
    }
    
    // Override attributes to exclude categoryID
    public function attributes() {
        $attributes = [];
        foreach(static::$db_columns as $column) {
            if($column == 'categoryID') { continue; }
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }
    
    // Override update to use categoryID
    protected function update() {
        $this->validate();
        if(!empty($this->errors)) { return false; }

        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE categoryID='" . self::$database->escape_string($this->categoryID) . "' ";
        $sql .= "LIMIT 1";
        
        // Log the SQL query
        if(isset(self::$logger)) {
            self::$logger->info("SQL Query: " . $sql);
        }
        
        $result = self::$database->query($sql);
        if(!$result) {
            if(isset(self::$logger)) {
                self::$logger->error("Update query failed: " . $sql);
            }
        }
        return $result;
    }
    
    // Override save to check categoryID instead of id
    public function save() {
        if(isset($this->categoryID)) {
            return $this->update();
        } else {
            return $this->create();
        }
    }
}

?>