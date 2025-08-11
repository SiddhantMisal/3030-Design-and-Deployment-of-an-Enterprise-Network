<?php
session_start();

if (isset($_SESSION['username'])) {
  header("location: index.php");
  exit;
}

require_once "config.php";
$username = $password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
    $err = "Please enter username + password";
  } else {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  }

  if (empty($err)) {
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;

    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_store_result($stmt);
      if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
        if (mysqli_stmt_fetch($stmt)) {
          if (password_verify($password, $hashed_password)) {
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $id;
            $_SESSION["loggedin"] = true;
            header("location: index.php");
            exit;
          }
        }
      }
    }
  }
}
?>


<html>

<head>
  <meta charset="UTF-8">
  <title>Php login system</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css -->
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
                <li><a class="dropdown-item" href="animals1.html">Animals</a></li>
                <li><a class="dropdown-item" href="sunrise,Sunset1.html">Sunrise</a></li>
                <li><a class="dropdown-item" href="flowers1.html">Flowers</a></li>

              </ul>
            </li>
            <a class="nav-link active" style="color:gray" aria-current="page"
              href="home.html">Home</a>
            </li> -->
            </li>
            <!-- <a class="nav-link active" style="color:gray" aria-current="page"
              href="logout.php">logout</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link active" style="color:gray" aria-current="page" href="">Login</a>
            </li> -->
            <!-- <li class="nav-item">
             <a class="nav-link active" style="color:gray" aria-current="page" href="">Feedback</a> -->
            <!-- </li> -->
            <li class="nav-item">
              <a class="nav-link active btn btn-outline" aria-current="page" href="register.php">Register</a>
            </li>
          </ul>
        </div>
    </div>
    </nav>
    <div class="container">
      <h2>login here!!</h2>

      <form action="" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter Username">

        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password">
        </div>
        <!-- <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit"   class="btn btn-primary">Submit</button>
      </form>



    </div>

</body>

</html>
