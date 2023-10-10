<?php

$id = $_GET["id"];

$ch = require "init_curl.php";
require "header.html" ;

curl_setopt($ch, CURLOPT_URL, "localhost/REST_API_in_PHP/products/$id");

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);
?>

<h1>Add New Product</h1>

<form method="post" action="create.php">
    
    <label for="name">Product Name</label>
    <input type="text" name="name" id="name" value="<?= $data["name"] ?>">
    
    <label for="size">Size</label>
    <input type="text" name="size" id="size" value="<?= $data["size"] ?>">

    <label for="is_available">Avialability</label>
    <input type="text" name="is_available" id="is_available" value="<?= $data["is_available"] ?>">
    <!-- <textarea name="is_available" id="is_available"><?= htmlspecialchars($data["is_available"]) ?></textarea> -->
    
    <button>Submit</button>
</form>

<?php require "footer.html" ?>