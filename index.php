<?php

use Classes\Database;

include_once "./Classes/Database.php";
$db = new Database();

// $result = $db->select(['name', 'author', 'publish_date'], 'books');
// if ($result) {
//     echo "<pre>";
//     foreach ($result as $key => $value) {
//         print_r($value);
//     }
// }

$result = $db->select("*", 'books', ['name' => "OOP", "author" => "Programmer"]);
if ($result) {
    $row = (object) $result->fetch_assoc();
    echo "<pre>";
    print_r($row->id);
}

// $result = $db->insert('books', ["name" => "OOP", "author" => "Programmer", "rating" => 3.5, "publish_date" => "2009-02-14", "details" => "simple Details", "user_id" => 9, "category_id" => 3]);
// echo "<pre>";
// print_r($result);
