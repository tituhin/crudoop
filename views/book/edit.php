<?php
require_once '../layout/header.php';
require_once '../../classes/Book.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $post = $_POST;
//    print_r($post);exit;
    $objBook = new Book();
    $result = $objBook->update("books", $post, ['id'=>$id]);
    if($result){
        header('location: index.php');
    }
    
} else {
    $id = $_GET['id'];
    $objbook = new Book();
//    echo $id; exit;
    $book = $objbook->find("*", 'books', ['id' => $id]);
//    print_r($book);
//    exit;
    $cat = new Book();
    $categories = $cat->index('*', 'book_categories');
}
?>
<h1 class="title text-center">
    Edit Book
</h1>
<div class="book_add">
    <div class="row ">
        <div class="form-group col-6 mx-auto">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">

                <label for="bookname">Book Name</label>
                <input class="form-control" type="text" name="id" hidden value="<?=$book['id'] ?>" >
                <input class="form-control" type="text" id="bookname" name="name" placeholder="Book Title.."
                       value="<?=$book['name'] ?>" >

                <label for="aname">Author Name</label>
                <input class="form-control" type="text" id="aname" name="author" placeholder="Author name.."
                       value="<?=$book['author'] ?>">

                <label for="rating">Book Rating</label>
                <input class="form-control" type="number" step="0.1" min="1" max="5"id="rating" name="rating"
                       value=<?=(int)$book['rating']?>> </br>

                <label for="publication"><strong class="text-danger"> Publish Date: <?=$book['publish_date']?></strong></label><br>
                <input class="form-control" type="date" id="date" name="publish_date" value="<?=$book['publish_date']?>"> <br>

                <label class="details" for="subject">Subject</label>
                <textarea id="subject" name="details" placeholder="Write something.." class="form-control"><?=$book['details'] ?></textarea>
                
                <label for="category">Select Category</label><br>
                <select class="form-control mb-3" name="category_id" required>
                    <option selected value="">Category</option>
                    <?php foreach ($categories as $key => $category) { ?>
                    <option <?php if($book['category_id'] == $category['id'] ) echo 'selected'; ?> value=<?=$category['id']?>> <?= $category['name'] ?> </option>
                    <?php } ?>
                </select>
                
                <div class="row">
                    <input class="btn btn-warning col-2 m-2 mx-auto float-center" type="submit" value="Update Book">
                </div>
            </form>

        </div>
    </div>
</div>

<?php
require_once '../layout/footer.php';
?>