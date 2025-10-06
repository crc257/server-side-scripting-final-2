<?php

class Product extends DatabaseObject {
    
    static protected $table_name = 'products';
    static protected $db_columns = ['productID', 'categoryID', 'productCode', 'productName', 'listPrice'];
    
    public $productID;
    public $categoryID;
    public $productCode;
    public $productName;
    public $listPrice;
    
    public function __construct($args = []) {
        $this->productID = $args['productID'] ?? null;
        $this->categoryID = $args['categoryID'] ?? '';
        $this->productCode = $args['productCode'] ?? '';
        $this->productName = $args['productName'] ?? '';
        $this->listPrice = $args['listPrice'] ?? 0.00;
    }
    
    // Custom method to find products by category
    static public function find_by_category($category_id) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE categoryID='" . self::$database->escape_string($category_id) . "'";
        return static::find_by_sql($sql);
    }
}

?>