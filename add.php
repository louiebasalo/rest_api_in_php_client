<?php require "header.html" ?>

<h1>Add New Product</h1>

<form method="post" action="create.php">
    
    <label for="name">Product Name</label>
    <input type="text" name="name" id="name">
    
    <label for="size">Size</label>
    <input type="text" name="size" id="size">

    <label for="is_available">Avialability</label>
    <input type="text" name="size" id="size">
    
    <button>Submit</button>
</form>

<?php require "footer.html" ?>