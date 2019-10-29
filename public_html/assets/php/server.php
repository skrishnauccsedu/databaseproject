<?php
include 'config.php';
$db = OpenCon();
echo "Connected Successfully";

// REGISTER USER
if (isset($_POST["reg_user"])) {
  // receive all input values from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $repeat_pass = $_POST['repeat-pass'];
  $name = $_POST['name'];
  $phnumber = $_POST['phnumber'];
  $code= $_POST['code'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($pass)) { array_push($errors, "Password is required"); }
  if ($pass != $repeat_pass) {
  array_push($errors, "The two passwords do not match");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Users WHERE UserName='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
    if ($user) { // if user exists
		if ($user['username'] === $username) {
		  array_push($errors, "Username already exists");
		}

		if ($user['email'] === $email) {
		  array_push($errors, "email already exists");
		}
	}
	if (count($errors) == 0) {
		$password = md5($pass);//encrypt the password before saving in the database

		$query = "INSERT INTO Users(Name, Email, Phone_number, UserName, Password, repass, confirmCode)
				  VALUES('$name' ,'$email','$phnumber' ,'$username', '$password', '$repeat_pass', '$code')";
		if(mysqli_query($db, $query)){
			echo "Records added successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
		}
		//mysqli_query($db, $query);
		//$_SESSION['username'] = $username;
		//$_SESSION['success'] = "You are now logged in";
		//$query->close();
	  }
  
}
  echo "Connected Successfully1";
CloseCon($db);
?>