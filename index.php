<?php

$ch = require "init_curl.php";

curl_setopt($ch, CURLOPT_URL, "localhost/REST_API_in_PHP/products/");

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);
// var_dump(($data));

?>


<?php require "header.html" ?>
        
    <h1>Products</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Avialable</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($data as $item): ?>
                
                <tr>
                    <td>
                        <?= htmlspecialchars($item["id"]) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($item["name"]) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($item["size"]) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($item["is_available"]) ?>
                    </td>
                    <td>
                        <a href="show.php?id=<?= $item["id"] ?>">View</a>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $item["id"] ?>">Edit</a>
                    </td><td>
                        <a href="delete_product.php?id=<?= $item["id"] ?>">Delete</a>
                    </td>
                </tr>
                
            <?php endforeach; ?>
            
        </tbody>
    </table>
    
    <a href="add.php">Add</a>
    
<?php require "footer.html" ?>