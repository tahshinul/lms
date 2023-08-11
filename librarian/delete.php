<?php

require_once '../dbcon.php';

if (isset($_GET['bookdelete'])) {
  $id =$_GET['bookdelete'];

  mysqli_query($con, query: "DELETE FROM `books` WHERE `id` = '$id' ");
  header('location: manage-books.php');

}
?>