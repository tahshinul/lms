<?php
require_once '../dbcon.php';
session_start();

if (isset($_SESSION['librarian_login'])){
  header('location: index.php');
}

if (isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
  $result = mysqli_query($con, query: "SELECT * FROM `librarian` WHERE `email` = '$email'  ");
if ( mysqli_num_rows($result) == 1) {
	$row = mysqli_fetch_assoc($result);
	if (($row['password']) == $password) {
    $_SESSION['librarian_login'] = $email;
    $_SESSION['librarian_username'] = $row['name'];
		header('location: index.php');
	} else {
		$error= "Password invalid";
	}
} else {
$error = "E-mail or Username invalid";
}

}
else{
	$email = '';
	$password = '';
}

// print_r($row);



















?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
  <meta name="author" content="AdminKit">
  <meta name="keywords"
    content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="../assets/img/icons/icon-48x48.png" />

  <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

  <title>Sign In</title>

  <link href="../assets/css/app.css" rel="stylesheet">
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
  <main class="d-flex w-100">
    <div class="container d-flex flex-column">
      <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">

            <div class="text-center mt-4">
              <h1 class="h2">ABC LIBRARY</h1>
              <p class="lead">
                Sign in to your account to continue
              </p>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="m-sm-4">
                  <div class="text-center">
                    <img src="../assets/img/avatars/library.png" alt="library logo" class="img-fluid rounded-circle"
                      width="132" height="132" />
                  </div>
                  <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                    <div class="mb-3">
                      <label class="form-label">Email or Username</label>
                      <input class="form-control form-control-lg" type="text" name="email"
                        placeholder="Enter your email or username" value="<?= isset($email)? $email:'' ?>" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input class="form-control form-control-lg" type="password" name="password"
                        placeholder="Enter your password" />

                    </div>
                    <div class="text-center mt-3">
                      <input type="submit" value="Sign In" class="btn btn-lg btn-primary" name="login">
                      <!-- <a href="index.html" class="btn btn-lg btn-primary">Sign in</a> -->
                      <!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
                    </div>
                    <?php
										if (isset($error)){
											?>
                    <br>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                      <div>
                        <?= $error ?>
                      </div>
                      <div style="position:absolute;right:15px;"><button type="button" class="btn-close"
                          data-bs-dismiss="alert" aria-label="Close"></button></div>
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
      </div>
    </div>
  </main>

  <script src="../assets/js/app.js"></script>

</body>

</html>