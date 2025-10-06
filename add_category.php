<?php
require_once('initialize.php');

// Get the category data
$category_name = filter_input(INPUT_POST, 'categoryName');

// Validate input
if ($category_name == null || empty(trim($category_name))) {
    $error = "Invalid category name. Please enter a valid category name.";
    include('error.php');
} else {
    // Create a new Category object and save it to the database
    $category = new Category([
        'categoryName' => $category_name
    ]);
    
    $result = $category->save();
    
    if ($result) {
        // Display the Category List page
        header("Location: category_list.php");
        exit();
    } else {
        $error = "Failed to add category to the database.";
        include('error.php');
    }
}
?>