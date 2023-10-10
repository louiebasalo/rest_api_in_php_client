<?php

$ch = require "init_curl.php";
// $id = $_GET["id"];

curl_setopt($ch, CURLOPT_URL, "localhost/REST_API_in_PHP/products/{$_GET['id']}");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

curl_close($ch);

$data = json_encode($response, true);

if ($status_code !== 204){
    echo "Unexpected status code: $status_code";
    var_dump($data);
    exit;
}

?>

<?php require "header.html" ?>

<h1>Delete Product</h1>

<p>Product deleted successfully.
    <a href="index.php">Index</a>
</p>

<?php require "footer.html" ?>