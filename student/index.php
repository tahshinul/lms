<?php
require_once 'header.php';


?>

<main class="content">
  <div class="container-fluid p-0">

    <div class="card row animated fadeInRight">

      <h4 class="card-header section-subtitle">Books Issued to <Strong><?= ucwords($s_info['name']) ?></Strong></h4>
      <div class="table">
        <div class="panel-content">
          <div class="table-responsive">
            <input class="container-fluid p-1  " type="text" id="myInput" onkeyup="myFunction()"
              placeholder="   Search for students..">
            <table id="basic-table" class="data-table table table-bordered nowrap table-hover" cellspacing="0"
              width="100%">
              <thead class="table-secondary">
                <tr>
                  <th>Book Name</th>
                  <th>Book Image</th>
                  <th>Book Issue Date</th>
                </tr>
              </thead>
              <tbody>

                <?php

$student_id = $_SESSION['student_id'];
$result = mysqli_query($con, query:"SELECT `issue_books`.`issue_date`,`books`.`book_name`,`books`.`book_image`
FROM `books`
INNER JOIN `issue_books` ON `issue_books`.`book_id` = `books`.`id`
WHERE `issue_books`.`sid` = '$student_id'");
while ($row = mysqli_fetch_assoc($result)) {

  ?>
                <tr>
                  <td><?=  $row['book_name'] ?></td>
                  <td><img src="../images/books/<?=  $row['book_image'] ?>" width="80" height="90" alt=""></td>
                  <td><?= date( 'd-M-Y',strtotime(  $row['issue_date']) ) ?></td>
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