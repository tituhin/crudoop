<?php
require_once '../layout/header.php';
require_once '../../classes/Book.php';

if (empty($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
if (empty($_POST['limit']) && empty($_GET['limit'])) {
    $limit = 5;
} elseif (isset($_POST['limit'])) {
    $limit = $_POST['limit'];
} else {
    $limit = $_GET['limit'];
}
//exit;
//echo $limit;exit;

$limit = (int) $limit;
$offset = ($page - 1) * $limit;
//echo $limit;exit;
$bookObj = new Book();
$books = $bookObj->pagination('*', 'books', $limit, $offset);
$totalRowCount = $bookObj->index("*", "books")->num_rows;
$totalPage = ceil($totalRowCount / $limit);
//print_r($totalPage);
?>

<style>
    .text-center{
        float: right;
    }
    .pagination {
        display: inline-block;
        float: right;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination a.active {
        background-color: lightsalmon;
        color: white;
        border-radius: 5px;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
        border-radius: 5px;
    }
    a.btn.btn-primary.float-right.col-2{
        float: right;
    }
</style>
<!-- Add new button -->
<div class="row m-3">
    <div class="col-7">
        <a href="create.php" class="btn btn-primary float-right col-2"><small>New Book</small></a>
    </div>
</div>

<div class="col-10">
    
    <form id="limit_form" action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
        <div class="input-group mb-3 col">
            <select class="custom-select col-3" name="limit" id="inputGroupSelect02">
                <option selected value="">Choose a Limit..</option>
                <option <?php ($limit == $totalRowCount) ? 'selected' : '' ?> value=<?= $totalRowCount ?> > See All (<?= $totalRowCount ?>) Books</option>
                <option<?php ($limit == 5) ? 'selected' : '' ?> value=5>5 Row</option>
                <option <?php ($limit == 10) ? 'selected' : '' ?> value=10>10 Row</option>
                <option <?php ($limit == 20) ? 'selected' : '' ?> value=20>20 Row</option>
            </select>
            <div class="input-group-append ">
                <label class="input-group-text" for="inputGroupSelect02">
                    <input class="input-group-text btn btn-secondary" type="submit" value="Go"/>
                </label>
            </div>
        </div>
    </form>
</div>

<?php if (isset($_SESSION['failed'])) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['failed'];
        unset($_SESSION['failed'])
        ?>
    </div>
<?php } ?>
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
                    <a href="<?php echo 'http://localhost/officecrudapp/crudoop/views/book/edit.php?id=' . $book['id'] ?>"class="btn btn-primary col">Edit</a>
                    <a href="<?php echo 'http://localhost/officecrudapp/crudoop/views/book/delete.php?id=' . $book['id'] ?>" onclick=" return confirm('Are you sure?')" class="btn btn-danger col">Delete</a>
                    <button type="button" onclick="myfunc(this)" value="<?= $book['id'] ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Details
                    </button>
                </td>

            </tr>
<?php } ?>
    </tbody>
</table>
<div class="float-right">
    <div class="pagination">
        <a href="#">&laquo;</a>

        <?php $i = 1;
        while ($i <= $totalPage) { ?>
            <a href="<?= $_SERVER["PHP_SELF"] . '?page=' . $i . '&limit=' . $limit ?>" class="<?= ($page == $i) ? 'active' : '' ?>"><?= $i ?></a>
    <?php $i++;
} ?>
        <a href="#">&raquo;</a>
    </div>

</div>



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
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<script>
            if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
    }
</script>

<script>
    var modal = document.getElementsByClassName("modal fade")[0];
    myfunc = (element) => {
        $.ajax({
        type:'GET',
        url: 'show.php?id=' + element.value,
        success: function(res){
            $('#book_details').empty();
                if (res){
                    $('#book_details').html(res);
                }
            }});
//            console.log(element);
//            var url = 'bookdetails_ajax.php?id=' + element.value;
//            console.log(url);
//            var xmlhttp = new XMLHttpRequest();
//            xmlhttp.onreadystatechange = function () {
//            document.getElementById("book_details").innerHTML = '';
//                    if (this.readyState == 4 && this.status == 200) {
//            document.getElementById("book_details").innerHTML = this.responseText;
//            }
//            };
//            xmlhttp.open("GET", url, true);
//            xmlhttp.send();
    };</script> 
<script>
            // $(document).ready(function () {
            //     $('#bookTable').DataTable();
            // });
</script>

<?php
require_once '../layout/footer.php';
?>