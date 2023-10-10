<?php

$ch = require "init_curl.php";
$id = $_GET["id"];


curl_setopt($ch, CURLOPT_URL, "localhost/REST_API_in_PHP/products/$id");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));   //libcurl will default the HTTP method to POST when using CURLOPT_POSTFIELDS

$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

curl_close($ch);

$data = json_decode($response, true);

if ($status_code === 422) {
    
    echo "Invalid data: ";
    print_r($data["errors"]);
    exit;
}

if ($status_code !== 200) {
    
    echo "Unexpected status code: $status_code";
    var_dump($data);    
    exit;
}

?>
<?php require "header.html" ?>

<p>Product updated successfully.
    <a href="show.php ? id=<?= $data["id"] ?>">Show</a>
</p>

<?php require "footer.html" ?>