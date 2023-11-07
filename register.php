<?php
session_start();

function validateRegistrationInput($name, $email, $password, $passwordCheck)
{
    $register_valid = true;

    if ((strlen($name) < 3) || (strlen($name) > 20)) {
        $register_valid = false;
    }

    $email_sanitize = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (
        (strlen($email) < 4) || (strlen($email) > 30) ||
        (filter_var($email, FILTER_VALIDATE_EMAIL) == false) ||
        ($email != $email_sanitize)
    ) {
        $register_valid = false;
    }

    if ((strlen($password) < 6) || (strlen($password) > 30) || ($password != $passwordCheck)) {
        $register_valid = false;
    }

    return $register_valid;
}

function registerUser($name, $email, $password)
{
    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connection = new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        }

        $result = $connection->query("SELECT id from user WHERE email='$email'");
        if (!$result) {
            throw new Exception($connection->error);
        }

        if ($result->num_rows > 0) {
            $connection->close();
            return 'E-mail telah terdaftar di sistem';
        }

        if ($connection->query("INSERT INTO user VALUES (NULL, '$name', '$email', '$password')")) {
            $connection->close();
            return 'success';
        }

        $connection->close();
    } catch (Exception $e) {
        return 'error';
    }
}

// Handle form submission
if ((isset($_SESSION['isLogin'])) && ($_SESSION['isLogin'] == true)) {
    header('Location: shop.php');
    exit();
}

if (isset($_POST['password'])) {
    $register_valid = validateRegistrationInput($_POST['name'], $_POST['email'], $_POST['password'], $_POST['password_check']);

    if ($register_valid === true) {
        $result = registerUser($_POST['name'], $_POST['email'], $_POST['password']);

        if ($result === 'E-mail telah terdaftar di sistem') {
            echo '<h2 style="text-align: center;color: #ed2d2d;">E-mail telah terdaftar di sistem</h2>';
        } elseif ($result === 'success') {
            $_SESSION['registered_successfully'] = true;
            header('Location: login.php');
        } else {
            header('Location: error.html');
        }
    }
}
?>


<HTML>
<HEAD>
<TITLE>Home | Branded Shop</TITLE>
<link href="style/index.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</HEAD>
<BODY>
<nav class="navbar navbar-expand-lg navbar-dark bg-grey">
  <a class="navbar-brand" href="#">Branded Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <?php  if ((isset($_SESSION['isLogin'])) && ($_SESSION['isLogin']==true)) {?>
        <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <?php } else { ?>
        <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
         <?php } ?>
    </ul>
  </div>  
</nav>

<form action="" method="post">


  <div class="container">
            <label for="name">Nama</label> <br/>
            <input minlength="3" maxlength="20" required id="name" type="text" name="name" placeholder="Masukkan nama"/> <br/>

            <label for="email">E-mail</label> <br/>
            <input minlength="4" maxlength="30" required type="text" id="email" name="email" placeholder="Masukkan e-mail"/> <br/>

            <label for="password">Password</label> <br/>
            <input required minlength="6" maxlength="30" type="password" id="password" name="password" placeholder="Masukkan password"/>
            

            <label for="password_check">Konfirmasi Password</label> <br/>
            <input required minlength="6" maxlength="30" type="password" id="password_check" name="password_check" placeholder="Masukkan kembali password"/>
            <br><br>
            <button type="submit">Register</button>
  </div>
</form>
</body>
</html>
