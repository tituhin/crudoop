<?php
require_once '../layout/header.php';
require_once '../../classes/Book.php';

$book = new Book();
$books = $book->index('*', 'books');
?>

<!-- Add new button -->
<div class="row m-3">
    <div class="col-7">
        <a href="create.php" class="btn btn-primary float-right col-2"><small>New Book</small></a>
    </div>
</div>

<?php if(isset($_SESSION['failed'])){?>
<div class="alert alert-success" role="alert">
  <?php echo $_SESSION['failed'];        unset($_SESSION['failed'])?>
</div>
    
<?php }  ?>
<!-- data table  -->

<table class="table table-striped table-bordered nowrap text-left" id="bookTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Book Name</th>
            <th>Auhor</th>
            <th>Rating</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $key => $book) { ?>
            <tr>            
                <th><?= ++$key; ?></th>
                <td><?= $book['name'] ?> </td>
                <td><?= $book['author'] ?> </td>
                <td>
                    <?= $book['rating']
                    ?>
                </td>
                <td>
                    <a href="<?php echo 'http://localhost/crudoop/views/book/edit.php?id='. $book['id'] ?>"class="btn btn-primary col">Edit</a>
                    <a href="<?php echo 'http://localhost/crudoop/views/book/delete.php?id=' . $book['id'] ?>" class="btn btn-danger col">Delete</a>
                    <button type="button" onclick="myfunc(this)" value="<?= $book['id'] ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Details
                    </button>
                </td>

            </tr>
        <?php } ?>
    </tbody>
</table>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">Book Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">

                    <tbody class="table-striped" id="book_details">

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- <script>
            var modal = document.getElementsByClassName("modal fade")[0];
            myfunc = (element) = > {
            console.log(element);
            var url = 'bookdetails_ajax.php?id=' + element.value;
            console.log(url);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
            document.getElementById("book_details").innerHTML = '';
                    if (this.readyState == 4 && this.status == 200) {
            document.getElementById("book_details").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
    }
</script> -->
<script>
    // $(document).ready(function () {
    //     $('#bookTable').DataTable();
    // });
</script>

<?php
require_once '../layout/footer.php';
?>