<?php
require_once 'header.php';
?>
<div class="container">
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="row">
    <!--BOX Style 1-->
    <div class="col-sm-4">
      <div class="card" style="text-decoration : none">
        <a href="students.php" style="text-decoration : none">
          <div class="card-body">
            <div class="row">
              <?php

$students = mysqli_query($con, query:" SELECT * FROM `student` ");
$s_count = mysqli_num_rows($students);

// mysqli_fetch_assoc($data);
?>
              <div class="col-sm-3" style="padding-top:5px ;">
                <i data-feather="users" style="width:36px;height:36px;"></i>
              </div>
              <div class="col-sm-6" style="padding-top:10px ;">
                <h3 class="text-nowrap" style="text-align:center ;"> <strong> Total Students</strong> </h3>
              </div>
            </div>
            <br>
            <h2 class="text-muted" style="text-align:center ;"> <?= $s_count ?> </h2>
          </div>
        </a>
      </div>
    </div>
    <!--BOX Style 1-->
    <div class="col-sm-4">
      <div class="card" style="text-decoration : none">
        <a href="manage-books.php" style="text-decoration : none">
          <div class="card-body">
            <div class="row">

              <?php

$books = mysqli_query($con, query:" SELECT * FROM `books` ");
$book_count = mysqli_num_rows($books);

// mysqli_fetch_assoc($data);
?>


              <div class="col-sm-3" style="padding-top:5px ;">
                <i data-feather="book" style="width:36px;height:36px;"></i>
              </div>
              <div class="col-sm-6" style="padding-top:10px ;">
                <h3 class="text-nowrap" style="text-align:center ;"> <strong> Total Books </strong> </h3>
              </div>
            </div>
            <br>
            <h2 class="text-muted" style="text-align:center ;"> <?= $book_count ?></h2>
          </div>
        </a>
      </div>
    </div>
    <!--BOX Style 1-->
    <div class="col-sm-4">
      <div class="card" style="text-decoration : none">
        <a href="manage-books.php" style="text-decoration : none">
          <div class="card-body">
            <div class="row">

              <?php

$books_a = mysqli_query($con, query:" SELECT * FROM `books` WHERE `available_qty` > 0  ");
$book_counta = mysqli_num_rows($books);

// mysqli_fetch_assoc($data);
?>


              <div class="col-sm-3" style="padding-top:5px ;">
                <i data-feather="book-open" style="width:36px;height:36px;"></i>
              </div>
              <div class="col-sm-6" style="padding-top:10px ;">
                <h3 class="text-nowrap" style="text-align:center ;"> <strong> Available Books </strong> </h3>
              </div>
            </div>
            <br>
            <h2 class="text-muted" style="text-align:center ;"> <?= $book_counta ?></h2>
          </div>
        </a>
      </div>
    </div>


  </div>
</div>
</div>
</div>
</div>
<?php
require_once 'footer.php';
?>