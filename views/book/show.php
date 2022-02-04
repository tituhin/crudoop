<?php

require_once '../../classes/Book.php';


if ($_GET['id']) {
    $id = $_GET['id'];
    $ObjBook = new Book();
    $result = $ObjBook->join("books.*, book_categories.name as category_name,users.name as user_name", "books", ['INNER JOIN',"INNER JOIN"], ["users","book_categories"], ["users.id = books.user_id","book_categories.id = books.category_id"],["books.id" => $id]);
    if ($result) {
        print_r($result);
        $string = '';
//         print_r($result);exit;
        foreach ($result->fetch_assoc() as $key => $value) {
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