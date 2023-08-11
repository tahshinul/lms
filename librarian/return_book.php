<?php
require_once 'header.php';


?>

<main class="content">
  <div class="container-fluid p-0">

    <div class="card row animated fadeInRight">

      <h4 class="card-header section-subtitle"><b>Return Menu</b></h4>
      <div class="table">
        <div class="panel-content">
          <div class="table-responsive">
            <input class="container-fluid p-1  " type="text" id="myInput" onkeyup="myFunction()"
              placeholder="   Search for students..">
            <table id="basic-table" class="data-table table table-bordered nowrap table-hover" cellspacing="0"
              width="100%">
              <thead class="table-secondary">
                <tr>

                  <th>Student Id</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Book Name</th>
                  <th>Book Image</th>
                  <th>Issue Date</th>
                  <th>Return Book</th>

                </tr>
              </thead>
              <tbody>
                <?php
                    $result = mysqli_query($con, query: " SELECT `issue_books`.`issue_date`,`issue_books`.`book_id`,`issue_books`.`id`,`student`.`name`,`student`.`sid`,`student`.`phone`,`books`.`book_name`,`books`.`book_image`
                    FROM `issue_books`
                    INNER JOIN `student` ON `student`.`id` = `issue_books`.`sid`
                    INNER JOIN `books` ON `books`.`id` = `issue_books`.`book_id`
                    WHERE `issue_books`.`return_date` = '' ");
                    while ( $row = mysqli_fetch_assoc($result)) {
                 ?>
                <tr>

                  <td> <?=  $row['sid'] ?></td>
                  <td> <?=  $row['name'] ?></td>
                  <td> <?=  $row['phone'] ?></td>
                  <td> <?=  $row['book_name'] ?></td>
                  <td> <img src="../images/books/<?=  $row['book_image'] ?>" width="80" height="90" alt=""></td>
                  <td> <?=  $row['issue_date'] ?></td>
                  <td><a href="return_book.php?id=<?=  $row['id'] ?>&bookid=<?=  $row['book_id'] ?>"
                      class="btn btn-info btn-lg"><i data-feather="corner-down-left"></i></a>
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

  <?php
  if( isset($_GET['id'])) {
    $id =  $_GET['id'];
    $date = date('d-m-y');
    $book_id = $_GET['bookid'];
    $result = mysqli_query($con, query:"UPDATE `issue_books` SET `return_date`='$date' WHERE `id` = '$id'");

    if ($result) {
      mysqli_query($con, " UPDATE `books` SET `available_qty` = `available_qty` + 1 WHERE `id` = '$book_id' ");
      ?>

  <script type="text/javascript">
  alert('Book Returned Successfully!');
  </script>
  echo '<script type="text/javascript">
  window.location = "../librarian/return_book.php";
  </script>';
  <?php

    }
    else {

      ?>

  <script type="text/javascript">
  alert('Book Not Returned');
  </script>
  echo '<script type="text/javascript">
  window.location = "../librarian/return_book.php";
  </script>';
  <?php

    }

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
</main>



<?php
require_once 'footer.php';
?>