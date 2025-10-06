<?php
require_once('private/initialize.php');

// Get all categories

?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        
        <!-- add code for the rest of the table here -->
        <tr>
            <td>Guitars</td>
            <td>&nbsp;</td>
        </tr>
                <tr>
            <td>Basses</td>
            <td>&nbsp;</td>
        </tr>
                <tr>
            <td>Drums</td>
            <td>&nbsp;</td>
        </tr>
        
    </table>

    <h2>Add Category</h2>
    
    <form name="add_category" action="add_category.php" method="post" enctype="multipart/form-data">
        <label for="categoryName">New Category</label>
        <input type="text" id="categoryName" name="categoryName" />
        <button type="submit">Submit</button>
    </form>
    <!-- add code for the form here -->
    
    <br>
    <p><a href="index.php">List Products</a></p>

    </main>

    <?php require_once("footer.php"); ?>
</body>
</html>