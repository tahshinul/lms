<?php
require_once 'header.php';

if (  isset($_POST['save_book'])  ){
  $book_name = $_POST['book_name'];
  $book_author_name = $_POST['book_author_name'];
  $book_publication_name = $_POST['book_publication_name'];
  $book_purchase_date = $_POST['book_purchase_date'];
  $book_price = $_POST['book_price'];
  $book_qty = $_POST['book_qty'];
  $available_qty = $_POST['available_qty'];
  $image = explode('.',$_FILES['book_image']['name']);
  $image_ext = end($image);
  $image = date('Ymdhis.').$image_ext;
  $librarian_usernames = $_SESSION['librarian_username'];
  

  $result = mysqli_query($con,query:" INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`) VALUES ('$book_name','$image','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$librarian_usernames')  ");

  if ($result){
    move_uploaded_file( $_FILES['book_image']['tmp_name'],'../images/books/'.$image);
$success=" Data Saved Successfully";
  }
  else {
$error = " Data not saved !";
  }

}

?>
<br>
<br>
<div class="container">
  <div class="card">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="card-body" style="padding-left: 140px ;">
        <h5 class="card-title" style=" text-align: center; padding-right:50px ;"> Add Books</h5>



        <div class="form-group" style="padding-bottom: 10px ;">
          <label for="book_name">Book name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="book_name" name="book_name" required>
          </div>
        </div>

        <div class="form-group" style="padding-bottom: 10px ;">
          <label for="book_image">Book Image</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="book_image" name="book_image" required>
          </div>
        </div>

        <div class="form-group" style="padding-bottom: 10px ;">
          <label for="book_author_name">Book author name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="book_author_name" name="book_author_name" required>
          </div>
        </div>


        <div class="form-group" style="padding-bottom: 10px ;">
          <label for="book_publication_name">Book publication name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" required>
          </div>
        </div>


        <div class="form-group" style="padding-bottom: 10px ;">
          <label for="book_purchase_date">Book purchase date</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="book_purchase_date" name="book_purchase_date" required>
          </div>
        </div>


        <div class="form-group" style="padding-bottom: 10px ;">
          <label for="book_price">Book price</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="book_price" name="book_price" required>
          </div>
        </div>


        <div class="form-group" style="padding-bottom: 10px ;">
          <label for="book_qty">Book Quantity</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="book_qty" name="book_qty" required>
          </div>
        </div>

        <div class="form-group" style="padding-bottom: 10px ;">
          <label for="available_qty">Available quantity</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="available_qty" name="available_qty" required>
          </div>
        </div>





        <div class="form-group" style="padding-bottom: 10px ;">
          <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" name="save_book" class="btn btn-primary">Save Book</button>
          </div>
        </div>
        <?php
										if (isset($success)){
											?>
        <br>
        <div class="alert alert-success alert-dismissible fade show" style="width: 83%;" role="alert">
          <div>
            <?= $success ?>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
										}
										?>
        <?php
										if (isset($error)){
											?>
        <br>
        <div class="alert alert-danger alert-dismissible fade show" style="width: 83%;" role="alert">
          <div>
            <?= $error ?>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
										}
										?>
    </form>
  </div>
</div>
</div>
</div>
</div>



<?php
require_once 'footer.php';
?>