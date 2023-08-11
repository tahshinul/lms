<?php
require_once 'header.php';
?>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
  integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
  integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->


<main class="content">
  <div class="container-fluid p-0">

    <div class="card row animated fadeInRight">

      <h4 class="card-header section-subtitle"><b>Books </b></h4>
      <div class="table">
        <div class="panel-content">
          <div class="table-responsive">
            <input class="container-fluid p-1  " type="text" id="myInput" onkeyup="myFunction()"
              placeholder="   Search for books..">
            <table id="basic-table" class="data-table table table-striped nowrap table-bordered" cellspacing="0"
              width="100%">
              <thead class="table-secondary">
                <tr>
                  <th>Book Name</th>
                  <th>Book Image</th>
                  <th>Author Name</th>
                  <th>Publication Name</th>
                  <th>Purchase date</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Available Quantity</th>
                  <th>Librarian</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $result = mysqli_query($con, query: " SELECT * FROM `books` ");
                    while ( $row = mysqli_fetch_assoc($result)) {
                 ?>
                <tr>
                  <td> <?=  $row['book_name'] ?></td>
                  <td> <img src="../images/books/<?=  $row['book_image'] ?>" width="80" height="90" alt=""></td>
                  <td> <?=  $row['book_author_name'] ?></td>
                  <td> <?=  $row['book_publication_name'] ?></td>
                  <td> <?=  $row['book_purchase_date'] ?></td>
                  <td> <?=  $row['book_price'] ?></td>
                  <td> <?=  $row['book_qty'] ?></td>
                  <td> <?=  $row['available_qty'] ?></td>
                  <td> <?=  $row['librarian_username'] ?></td>
                  <td>
                    <!-- <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal"
                      data-bs-target="#exampleModal">
                      <i data-feather="eye"></i>
                    </button> -->

                    <a href="" class="btn btn-success btn-lg" data-bs-toggle="modal"
                      data-bs-target="#book-<?=$row['id'] ?>"><i data-feather="eye"></i></a>
                    <a href="" class="btn btn-info btn-lg" data-bs-toggle="modal"
                      data-bs-target="#book-update<?=$row['id'] ?>"><i data-feather="edit"></i></a>
                    <a href="delete.php?bookdelete=<?= $row['id'] ?>" class="btn btn-danger btn-lg"
                      onclick=" return confirm('Are You sure ? \nDeleted data can not be retrieved !') "><i
                        data-feather="trash"></i></a>
                  </td>
                </tr>
                <?php
                  }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

  <?php
                    $result = mysqli_query($con, query: " SELECT * FROM `books` ");
                    while ( $row = mysqli_fetch_assoc($result)) {
                 ?>

  <!-- Modal -->
  <div class="modal fade" id="book-<?=$row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Book Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table id="basic-table" class="data-table table table-striped nowrap table-bordered" cellspacing="0">
            <tr>
              <th>Book Name</th>
              <td> <?=  $row['book_name'] ?></td>

            </tr>
            <tr>
              <th>Book Image</th>

              <td> <img src="../images/books/<?=  $row['book_image'] ?>" width="80" height="90" alt=""></td>

            </tr>
            <tr>
              <th>Author Name</th>
              <td> <?=  $row['book_author_name'] ?></td>
            </tr>
            <tr>
              <th>Publication Name</th>

              <td> <?=  $row['book_publication_name'] ?></td>
            </tr>
            <tr>
              <th>Purchase date</th>

              <td> <?=  $row['book_purchase_date'] ?></td>
            </tr>
            <tr>
              <th>Price</th>

              <td> <?=  $row['book_price'] ?></td>
            </tr>
            <tr>
              <th>Quantity</th>

              <td> <?=  $row['book_qty'] ?></td>
            </tr>
            <tr>
              <th>Available Quantity</th>

              <td> <?=  $row['available_qty'] ?></td>
            </tr>
            <tr>
              <th>Librarian</th>

              <td> <?=  $row['librarian_username'] ?></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <?php
                  }
                  ?>

  <?php
                    $result = mysqli_query($con, query: " SELECT * FROM `books` ");
                    try {
                    while ( $row = mysqli_fetch_assoc($result)) {
                      
                      $id = $row['id'];
                      $book_info = mysqli_query($con, query:"SELECT * FROM `books` WHERE `id` = '$id'");
                      $book_info_row = mysqli_fetch_assoc($book_info);
                      
                 ?>

  <!-- Modal -->
  <div class="modal fade" id="book-update<?=$row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Book Info</h5>
        </div>
        <!-- <div class="modal-body">
          <div class="panel">
            <div class="panel-content">
              <div class="row">
                <div class="col-md-12"> -->
        <div class="container">
          <div class="card">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
              <div class="card-body" style="padding-left: 85px ;">
                <!-- style="padding-left: 140px ;" -->
                <!-- <h5 class="card-title" style=" text-align: center; padding-right:50px ;"> Add Books</h5> -->



                <div class="form-group" style="padding-bottom: 10px ;">
                  <label for="book_name">Book name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="book_name" value="<?= $book_info_row['book_name'] ?>"
                      name="book_name" required>
                    <input type="hidden" class="form-control" value="<?= $book_info_row['id'] ?>" name="id" required>
                  </div>
                </div>


                <!-- <div class="form-group" style="padding-bottom: 10px ;">
                  <label for="book_image">Book Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="book_image" name="book_image" required>
                    <br>
                    <img src="../images/books/<?= $book_info_row['book_image'] ?>" width="80" height="90" alt="">
                  </div>
                </div> -->



                <div class="form-group" style="padding-bottom: 10px ;">
                  <label for="book_author_name">Book author name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="book_author_name"
                      value="<?= $book_info_row['book_author_name'] ?>" name="book_author_name" required>
                  </div>
                </div>


                <div class="form-group" style="padding-bottom: 10px ;">
                  <label for="book_publication_name">Book publication name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="book_publication_name"
                      value="<?= $book_info_row['book_publication_name'] ?>" name="book_publication_name" required>
                  </div>
                </div>


                <div class="form-group" style="padding-bottom: 10px ;">
                  <label for="book_purchase_date">Book purchase date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="book_purchase_date"
                      value="<?= $book_info_row['book_purchase_date'] ?>" name="book_purchase_date" required>
                  </div>
                </div>


                <div class="form-group" style="padding-bottom: 10px ;">
                  <label for="book_price">Book price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="book_price" value="<?= $book_info_row['book_price'] ?>"
                      name="book_price" required>
                  </div>
                </div>


                <div class="form-group" style="padding-bottom: 10px ;">
                  <label for="book_qty">Book Quantity</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="book_qty" value="<?= $book_info_row['book_qty'] ?>"
                      name="book_qty" required>
                  </div>
                </div>

                <div class="form-group" style="padding-bottom: 10px ;">
                  <label for="available_qty">Available quantity</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="available_qty"
                      value="<?= $book_info_row['available_qty'] ?>" name="available_qty" required>
                  </div>
                </div>





                <div class="form-group" style="padding-bottom: 10px ;">
                  <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" name="update_book" class="btn btn-primary">Update
                      Book</button>
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
                    if (  isset($_POST['update_book'])  ){
                      $id = $_POST['id'];
                      $book_name = $_POST['book_name'];
                      $book_author_name = $_POST['book_author_name'];
                      $book_publication_name = $_POST['book_publication_name'];
                      $book_purchase_date = $_POST['book_purchase_date'];
                      $book_price = $_POST['book_price'];
                      $book_qty = $_POST['book_qty'];
                      $available_qty = $_POST['available_qty'];
                    
                    
                      $result = mysqli_query($con,query:"UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty' WHERE `id` = '$id'");
                  
                      if ($result){
                        ?>
                <script>
                alert('Book Updated Successfully !');
                javascript: history.go(-1);
                </script>

                <?php
                
                          
                        } else {
                        
                          ?>
                <script type="text/javascript">
                alert('Book not Updated !');
                javascript: history.go(-1);
                </script>

                <?php
                          
                        }
                       

                    }
                    
										?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  </div>
  </div>
  </div>

  <?php
                  }
                }
                catch (TypeError $e){
                 
                }
                  ?>


  <script>
  function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("basic-table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  </script>

  <?php
require_once 'footer.php';
?>