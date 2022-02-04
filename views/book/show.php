<?php

require_once '../../classes/Book.php';


if ($_GET['id']) {
    $id = $_GET['id'];
    $ObjBook = new Book();
    $result = $ObjBook->find("*", 'books', ["id" => $id]);
    if ($result) {
        print_r($result);
        $string = '';
        // print_r($result);
        foreach ($result as $key => $value) {
            if ($key == 'id' || $key == 'user_id' || $key == 'category_id') {
                continue;
            }
            $string .= "<tr> <td><b>".ucfirst($key)."</b></td>
                            <td>".$value."</td>
                        </tr>";
        }

        echo $string;
    }
}