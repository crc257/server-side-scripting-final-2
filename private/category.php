<?php

class Category extends DatabaseObject {
    
    protected static $table_name = 'categories';
    protected static $db_columns = ['id', 'name', 'description'];
    
    public $id;
    public $name;
    public $description;
    
    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->description = $args['description'] ?? '';
    }
}

?>