<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate username
  if (empty(trim($_POST["username"]))) {
    $username_err = "Username cannot be blank";
  } else {
    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
      $param_username = trim($_POST["username"]);
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "This username is already taken";
        } else {
          $username = $param_username;
        }
      } else {
        echo "Error checking username: " . mysqli_stmt_error($stmt);
      }
      mysqli_stmt_close($stmt);
    }
  }

  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Password cannot be blank";
  } elseif (strlen(trim($_POST["password"])) < 5) {
    $password_err = "Password must be at least 5 characters";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm your password";
  } elseif (trim($_POST["password"]) !== trim($_POST["confirm_password"])) {
    $confirm_password_err = "Passwords should match";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
  }

  // If no errors, insert into DB
  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
      if (mysqli_stmt_execute($stmt)) {
        header("Location: login.php");
        exit;
      } else {
        echo "Insert failed: " . mysqli_stmt_error($stmt);
      }
      mysqli_stmt_close($stmt);
    } else {
      echo "Prepare failed: " . mysqli_error($conn);
    }
  } else {
    echo "<p>$username_err</p>";
    echo "<p>$password_err</p>";
    echo "<p>$confirm_password_err</p>";
  }

  mysqli_close($conn);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>register system</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css -->
  <!-- <link rel="stylesheet" href="home.css"> -->
  <link rel="icon" href="favicon (2).ico">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- font awsome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <!-- font family -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family='Tangerine', serif">
  <style>
    .navbar {
      /* padding: 500px; */
      display: flex;
      justify-content: space-between;
    }

    .navbar-brand {}

    .nav-item {
      /* font-weight: 500; */
      /* font-size: large; */

      padding: 0px 30px;
    }

    .nav-link {
      color: rgb(205, 183, 183);
    }

    .container {
      /* padding-top:50px; */
    }
  </style>
</head>


<body>
  <section id="title">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand " href="#">✦ Photography</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav ms-auto">

            <li class="nav-item">
            <!-- <li class="nav-item dropdown">
              <a class="btn-default btn-secondary nav-link dropdown-toggel" style="color:rgb(230, 217, 217)" href="#"
                role="Button" data-bs-toggle="dropdown" aria-expanded="false">Gallery </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="nature1.html">Nature</a></li>
                <li><a class="dropdown-item" href="birds1.html">Birds</a></li>
                <li><a class="dropdown-item" href="animal1.html">Animals</a></li>
                <li><a class="dropdown-item" href="Flowers1.html">Flowers</a></li>
                <li><a class="dropdown-item" href="sunrise,Sunset1.html">sunrise</a></li>

              </ul> -->
            <!-- </li>
            <a class="nav-link active" style="color:gray" aria-current="page"
              href="home.html">Home</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link active" style="color:gray" aria-current="page" href="">Login</a>
            </li> -->
            <!-- <li class="nav-item">
             <a class="nav-link active" style="color:gray" aria-current="page" href="">Feedback</a> -->
            <!-- </li> -->
            <li class="nav-item">
              <a class="nav-link active btn btn-outline" aria-current="page" href="login.php">Login</a>
            </li>
          </ul>
        </div>
    </div>
    </nav>
    <div class="container">
      <h2>Register here!!</h2>
      <form action="" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Username</label>
            <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Enter your username">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
          </div>
        </div>
        <div class="form-group  ">
          <label for="inputPassword4">Confirm Password</label>
          <input type="password" class="form-control" name="confirm_password" id="inputPassword"
            placeholder="Confirm Password">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Address </label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Enter your city">
          </div>
          <!-- <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div> -->
       
   <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip" placeholder=" Postal code">
          </div>
        </div>
        <!-- <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div> -->
        <button type="submit" href="login.php"class="btn btn-primary">Sign in</button>
      </form>
    </div>

</body>

</html> 
