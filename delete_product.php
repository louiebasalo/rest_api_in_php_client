

<?php

$id = $_GET["id"];

$ch = require "init_curl.php";

curl_setopt($ch, CURLOPT_URL, "localhost/REST_API_in_PHP/products/$id");

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);
?>
<?php require "header.html" ?>
        
    <h1>Delete Product?</h1>
    
    <dl>
        <dt>Name</dt>
        <dd><?= $data["name"] ?></dd>
        <dt>size</dt>
        <dd><?= htmlspecialchars($data["size"]) ?></dd>
    </dl>

    <a href="index.php">NO</a> &nbsp;
    <a href="delete.php? id=<?= $data["id"] ?>">YES</a>


<?php require "footer.html" ?>