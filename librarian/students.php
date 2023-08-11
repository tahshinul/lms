<?php
require_once 'header.php';


?>

<main class="content">
  <div class="container-fluid p-0">

    <div class="card row animated fadeInRight">

      <h4 class="card-header section-subtitle"><b>Students list</b></h4>
      <div class="table">
        <div class="panel-content">
          <div class="table-responsive">
            <input class="container-fluid p-1  " type="text" id="myInput" onkeyup="myFunction()"
              placeholder="   Search for students..">
            <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0"
              width="100%">
              <thead class="table-secondary">
                <tr>
                  <th>Student Id</th>
                  <th>Name</th>
                  <th>Username</th>

                  <th>Phone</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $result = mysqli_query($con, query: " SELECT * FROM `student` ");
                    while ( $row = mysqli_fetch_assoc($result)) {
                 ?>
                <tr>
                  <td> <?=  $row['sid'] ?></td>
                  <td> <?=  $row['name'] ?></td>
                  <td> <?=  $row['username'] ?></td>

                  <td> <?=  $row['phone'] ?></td>
                  <td> <?=  $row['email'] ?></td>
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