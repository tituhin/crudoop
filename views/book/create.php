<?php
require_once '../layout/header.php';
require_once '../../classes/Book.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $post = $_POST;
    $new_book = new Book();
    $result = $new_book->insert("books", $post);
    if($result == "inserted"){
        header("Location: index.php");
    }
} else {
    $cat = new Book();
    $categories = $cat->index('*', 'book_categories');
}
?>




<h1 class="title text-center">
    Add Book Category
</h1>
<span>
    <a href=""></a>
</span>
<div class="book_add">
<?=$_SESSION['id']?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <div class="row">
            <div class="form-group col-6 mx-auto">        
                <label for="bookname">Book Name</label>
                <input class="form-control col" type="text" id="bookname" name="name" placeholder="Book Title.." required>
                
                <label for="aname">Author Name</label>
                <input class="form-control col" type="text" id="aname" name="author" placeholder="Author name.." required>

                <label for="rating">Book Rating</label>
                <input class="form-control col" type="number" step="0.1" min="1" max="5"id="rating" value="3.5" 
                       name="rating" placeholder="Rating of your book" required>

                <label for="publication">Pusblish</label><br>
                <input class="form-control " type="date" id="date" name="publish_date" required> <br>
                
                <input class="form-control " type="number" id="date" name="user_id" hidden value=<?=$_SESSION['id']?>> <br>

                <label class="details" for="subject">Subject</label>
                <textarea id="subject" class="form-control col" name="details" placeholder="Write something.."></textarea>
                
                <label for="category">Select Category</label><br>
                <select class="form-control mb-3" name="category_id" required>
                    
                    <option value="">--Select one--</option>
                    <?php foreach ($categories as $key => $category) { ?>
                        <option value="<?=$category['id']?>"> <?= $category['name'] ?> </option>
                    <?php } ?>

                </select>
                <div class="row">
                    <input class="btn btn-primary col-4 m-2 mx-auto float-center" type="submit" 
                    value="Add Book" class="btn_add_book">

                </div>
            </div>
        </div>
    </form>
</div>






<?php
require_once '../layout/footer.php';
?>