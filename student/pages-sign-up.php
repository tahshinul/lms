<?php

require_once '../dbcon.php';
session_start();

if (isset($_SESSION['student_login'])){
  header('location: index.php');
}

if ( isset ($_POST['student_register'])) {
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';

	
	$name = $_POST['name'];
	$uname = $_POST['uname'];
	$sid = $_POST['sid'];
	$phone = $_POST['phone'];
	$email= $_POST['email'];
	$password = $_POST['password'];

	$input_errors = array();
	if(empty($name)) {
		$input_errors['name'] = "Name field is required";
	}if(empty($uname)) {
		$input_errors['uname'] = "Username field is required";
	}if(empty($sid)) {
		$input_errors['sid'] = "Student ID is required";
	}if(empty($phone)) {
		$input_errors['phone'] = "Phone number is required";
	}if(empty($email)) {
		$input_errors['email'] = "E-mail is required";
	}if(empty($password)) {
		$input_errors['password'] = "Password field is required";
	}
	mysqli_report(MYSQLI_REPORT_STRICT);
	// print_r($input_errors);
	if (count($input_errors) == 0 ) {

		$email_check= mysqli_query($con, query: " SELECT * FROM `student` WHERE `email` = '$email' ");
		$email_checck_row = mysqli_num_rows($email_check);
		if ( $email_checck_row == 0){
		$uname_check= mysqli_query($con, query: " SELECT * FROM `student` WHERE `username` = '$uname' ");
		$uname_checck_row = mysqli_num_rows($uname_check);
			if ( $uname_checck_row == 0){
				 if (strlen($password)>6){
					$password_hash = password_hash($password, algo: PASSWORD_DEFAULT);
					$result = mysqli_query($con, query:"INSERT INTO `student`(`name`, `username`, `sid`, `phone`, `email`, `password`) VALUES ('$name','$uname','$sid','$phone','$email','$password_hash')");
					if ($result){
							$success = "Registered successfully !";
						} else {
						 $error = "Something Went Wrong !";
						}
				 }else {
					$password_error = "Password must be more then 6 characters";
				 }
			}
			else {
				$uname_exists = "This username already exists !";
			}
		}
		else {
			 $email_exists = "This email already exists !";
		}





		

}


	
}

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

  <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

  <title>Sign Up</title>

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
              <h1 class="h2">Get started</h1>
              <p class="lead">
                Please sign up to use library services
              </p>
            </div>


            <div class="card">
              <div class="card-body">
                <div class="m-sm-4">
                  <div class="text-center">
                    <img src="../assets/img/avatars/library.png" alt="library logo" class="img-fluid rounded-circle"
                      width="132" height="132" />
                  </div>
                  <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input class="form-control form-control-lg" type="text" name="name"
                        value="<?= isset($name)? $name:'' ?>" placeholder="Enter your name" />

                      <?php 
												if ( isset($input_errors['name']) ) {
													echo '<span class="input-error">'.$input_errors['name'].'</span>';
												}
											?>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">User Name</label>
                      <input class="form-control form-control-lg" type="text" name="uname"
                        value="<?= isset($uname)? $uname:'' ?>" placeholder="Enter your preferred Username" />
                      <?php 
												if ( isset($input_errors['uname']) ) {
													echo '<span class="input-error">'.$input_errors['uname'].'</span>';
												}
											?>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Student Id</label>
                      <input class="form-control form-control-lg" type="text" name="sid" pattern="[0-9]{8}"
                        value="<?= isset($sid)? $sid:'' ?>" placeholder="Enter your Student Id" />
                      <?php 
												if ( isset($input_errors['sid']) ) {
													echo '<span class="input-error">'.$input_errors['sid'].'</span>';
												}
											?>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Phone No.</label>
                      <input class="form-control form-control-lg" type="text" name="phone" placeholder="01*********"
                        value="<?= isset($phone)? $phone:'' ?>" pattern="01[1|5|6|7|8|9][0-9]{8}" />
                      <?php 
												if ( isset($input_errors['phone']) ) {
													echo '<span class="input-error">'.$input_errors['phone'].'</span>';
												}
											?>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input class="form-control form-control-lg" type="email" name="email"
                        pattern="[^@\s]+@[^@\s]+\.[^@\s]+" value="<?= isset($email)? $email:'' ?>"
                        placeholder="Enter your Email" />
                      <?php 
												if ( isset($input_errors['email']) ) {
													echo '<span class="input-error">'.$input_errors['email'].'</span>';
												}
											?>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input class="form-control form-control-lg" type="password" name="password"
                        value="<?= isset($password)? $password:'' ?>" placeholder="Enter password" />
                      <?php 
												if ( isset($input_errors['password']) ) {
													echo '<span class="input-error">'.$input_errors['password'].'</span>';
												}
											?>
                    </div>
                    <div class="text-center mt-3">
                      <input class="btn btn-lg btn-primary" type="submit" name="student_register" value="Sign Up">
                    </div>
                    <?php
										if (isset($success)){
											?>
                    <br>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                      <div>
                        <?= $success ?>
                      </div>
                      <div style="position:absolute;right:15px;"><button type="button" class="btn-close"
                          data-bs-dismiss="alert" aria-label="Close"></button></div>
                    </div>
                    <?php
										}
										?>
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
                    <?php
										if (isset($email_exists)){
											?>
                    <br>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                      <div>
                        <?= $email_exists ?>
                      </div>
                      <div style="position:absolute;right:15px;"><button type="button" class="btn-close"
                          data-bs-dismiss="alert" aria-label="Close"></button></div>
                    </div>
                    <?php
										}
										?>
                    <?php
										if (isset($uname_exists)){
											?>
                    <br>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                      <div>
                        <?= $uname_exists ?>
                      </div>
                      <div style="position:absolute;right:15px;"><button type="button" class="btn-close"
                          data-bs-dismiss="alert" aria-label="Close"></button></div>
                    </div>
                    <?php
										}
										?>
                    <?php
										if (isset($password_error)){
											?>
                    <br>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                      <div>
                        <?= $password_error?>
                      </div>
                      <div style="position:absolute;right:15px;"><button type="button" class="btn-close"
                          data-bs-dismiss="alert" aria-label="Close"></button></div>
                    </div>
                    <?php
										}
										?>





                    <br>
                    <div class="form-group text-center">
                      Have an account? <a href="pages-sign-in.php">Sign In</a>
                    </div>
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