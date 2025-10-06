<?php
require_once('initialize.php');

// Get category ID
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Validate input
if ($category_id != null && $category_id != false) {
    // Find the category and delete it from the database
    $category = Category::find_by_id($category_id);
    
    if ($category) {
        $category->delete();
    }
}

// Display the Category List page
header("Location: category_list.php");
exit();
?>