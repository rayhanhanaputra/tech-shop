<?php
    session_start();
    if ((isset($_SESSION['isLogin'])) && ($_SESSION['isLogin']==true))
    {
        header('Location: shop.php');
        exit();
    }
    if ((isset($_POST['email'])) && (isset($_POST['password'])))
    {
        require_once "connect.php";
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno != 0)
        {
            echo "Error code: ".$connection->connect_errno;
        }
        else {

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($result = @$connection->query(
            sprintf("SELECT * FROM user WHERE email='%s'",
            mysqli_real_escape_string($connection,$email))))
            {
                $users_number = $result->num_rows;
                if($users_number>0)
                {
                    $row = $result->fetch_assoc();
                    
                    if ($password == $row['password'])
                    {
                        $_SESSION['isLogin'] = true;
                        $_SESSION['name'] = $row['nama'];
                        $_SESSION['clientID'] = $row['id'];
                        $result->free_result();
                        header('Location: shop.php');
                    }
                    else 
                    {
                        echo '<h3 style="text-align: center; color: #ed2d2d; margin-top: 2%;">Kredential salah, silahkan coba lagi</h3>';
                    }
                }
                else
                {
                    echo '<h3 style="text-align: center; color: #ed2d2d; margin-top: 2%;">Kredential salah, silahkan coba lagi</h3>';
                } 
            }
        }
        $connection->close();
    }
?>
<HTML>
<HEAD>
<TITLE>Home | Tech Shop</TITLE>
<link href="style/index.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</HEAD>
<BODY>
<nav class="navbar navbar-expand-lg navbar-dark bg-grey">
  <a class="navbar-brand" href="#">Tech Shop</a>
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
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
<br>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="myInput" required>
      
      <input type="checkbox" onclick="myFunction()">Show Password
    <button type="submit">Login</button>

  </div>
</form>
    
    <script>
        function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
</body>
</html>