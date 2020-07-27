<?php

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Category.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate category object
    $category = new Category($db);

    // Category read query
    $result = $category->read();

    // Get row count
    $num = $result->rowCount();

    // Check if there is any categories
    if ($num > 0) {
        // Post array
        $category_arr = [];
        $category_arr['data'] = [];

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            // echo print_r($row);
            $category_item = [
                'id' => $id, 
                'name' => $name
            ];

            // Push to 'data'
            array_push($category_arr['data'], $category_item);
        }

        // Turn to JSON & output
        echo json_encode($category_arr); 

    } else {
        // No categories found
        echo json_encode([
            'message' => 'No category found'
        ]);
    }
?>

