<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

function handGetRequest() {
    // Path to the sql database file phpmyadmin
    /* $db_path = 'C:\xampp\htdocs\tienda-musica\vanilla-house\database\tienda.sql'; */

    // Attempt to connect to the database
    $db = new mysqli('localhost', 'root', '', 'tienda');

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Execute a SELECT query
    $query = "SELECT * FROM productos";
    $result = $db->query($query);

    // Check if the query was executed successfully
    if (!$result) {
        die("Error: " . $db->error);
    }

    // Fetch the results and store them in an array
    $products = array();
    while ($row = $result->fetch_assoc()) {
        $product = array();
        $product['id'] = $row['id'];
        $product['artista'] = $row['artista'];
        $product['album'] = $row['album'];
        if (!empty($row['imagen'])) {
            $product['imagen'] = 'data:image/png;base64,' . base64_encode($row['imagen']);
        } else {
            $product['imagen'] = null;
        }
        $product['precio'] = $row['precio'];
        $product['descripcion_es'] = $row['descripcion_es'];
        $product['descripcion_en'] = $row['descripcion_en'];
        $product['stock'] = ($row['stock'] == 1) ? true : false;
        $products[] = $product;

    }

    echo json_encode($products);

    // Close the connection
    $db->close();

}

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    handGetRequest();
}

?>