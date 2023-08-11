<?php
require_once 'header.php';


if(isset($_POST['issue'])) {
$id = $_POST['id'];
$book_id = $_POST['book_id'];
$issue_date = $_POST['issue_date'];

$result = mysqli_query($con, query:" INSERT INTO `issue_books`( `sid`, `book_id`, `issue_date`) VALUES ('$id','$book_id','$issue_date') ");

if ($result){
  mysqli_query($con, " UPDATE `books` SET `available_qty` = `available_qty` - 1 WHERE `id` = '$book_id' ");
  ?>
<script type="text/javascript">
alert('Book Issued Successfully !');
</script>

<?php
    
  } else {
  
    ?>
<script type="text/javascript">
alert('Book not Issued !');
</script>

<?php
    
  }
}



?>




<br><br>

<div class="container">
  <div class="card">
    <div class="card-body">
      <h5 class="card-header position-absolute top-0 start-50 translate-middle-x">Search Students</h5>
      <br>
      <br>
      <div>
        <div class="row g-8 " style="padding-left:28% ;">
          <div class="col">
            <form class="form-inline" method="POST" action="">
              <div class="form-group">
                <select class="form-control" name="student_id">
                  <option value="30">select</option>
                  <?php
                    $result = mysqli_query($con, query: " SELECT * FROM `student` ");
                    while ( $row = mysqli_fetch_assoc($result)){
                      ?> <option value="<?= $row['id'] ?>">
                    <?=  $row['sid'].' - ( '.ucwords($row['name']). ' )' ?></option>
                  <?php } 
                  ?>
                </select>
              </div>

          </div>
          <div class="col ">
            <div class="form-group">
              <button type="submit" name="search" class="btn btn-primary">Search</button>
            </div>
          </div>
          </form>
        </div>
        <?php
        if (isset($_POST['search'])) {
        $id = $_POST['student_id'];
        $result = mysqli_query($con, query: " SELECT * FROM `student` WHERE `id` = '$id' ");
        $row = mysqli_fetch_assoc($result);
        // print_r($row);





        ?>
        <br>

        <!-- <div class="card"> -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <form method="post" action="">
                <div class="form-group" style="padding-bottom: 2% ;">
                  <label for="name" style="padding-bottom: 1% ;">Student name</label>
                  <input type="text" class="form-control" id="name" value=" <?=  ucwords($row['name'])  ?> " readonly>
                  <input type="hidden" value=" <?= $row['id']  ?>  " name='id'>
                </div>


                <div class="form-group" style="padding-bottom: 2% ;">
                  <label for="name" style="padding-bottom: 1% ;">Book name </label>

                  <select class="form-control" name="book_id">
                    <option value="30">select</option>
                    <?php
                    $result = mysqli_query($con, query: " SELECT * FROM `books` WHERE `available_qty` > 0 ");
                    while ( $row = mysqli_fetch_assoc($result)){
                      ?> <option value="<?= $row['id'] ?>">
                      <?= $row['book_name'] ?></option>
                    <?php } 
                  ?>
                  </select>


                </div>

                <div class="form-group" style="padding-bottom: 2% ;">
                  <label for="name" style="padding-bottom: 1% ;">Book Issue Date</label>
                  <input class="form-control" type="text" name="issue_date" value="<?= date('d-m-Y') ?>" readonly>
                </div>


                <!-- <div class="form-group" style="padding-bottom: 2% ;">
                  <label for="password" style="padding-bottom: 1% ;">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password">
                </div> -->



                <div class="form-group">
                  <button type="submit" name="issue" class="btn btn-primary">Issue Book</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php


      }
        ?>

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