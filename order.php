<?php
    session_start();
    if ((!isset($_SESSION['isLogin'])) && ($_SESSION['isLogin']==false))
    {
        header('Location: login.php');
        exit();
    }
    require_once("dbcontroller.php");
    $db_handle = new DBController();
?>
<HTML>
<HEAD>
<TITLE>Order Processed | Branded Shop</TITLE>
<link href="style/shop.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<style>
    
.text-center {
    text-align: center !important;
}
.mb-5 {
    margin-bottom: 3rem !important;
}
.mx-auto {
    margin-right: auto !important;
    margin-left: auto !important;
}
.text-reset {
    --bs-text-opacity: 1;
    color: inherit !important;
}
a {
    color: #5465ff;
    text-decoration: none;
}
body {
    background: #eee;
}
.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, 0.125);
    border-radius: 1rem;
}
.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem 1.5rem;
}
</style>
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

<div class="container-fluid">
    <div class="container text-center">
    <br><br><br>
        <h1>Thank you.</h1>
        <p class="lead w-lg-50 mx-auto">Your order has been placed successfully.</p>
        <p class="w-lg-50 mx-auto">Your order number is <a href="#">9237427634826</a>. We will immediatelly process your and it will be delivered in 2 - 5 business days.</p>
    </div>
    <div class="container">
        <h2 class="h5 mb-5 text-center">You may also like these products</h2>
        <div class="row">
            <?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach(array_slice($product_array, 0, 4) as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="shop.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img style="width:250px; height:155px" src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "Rp".$product_array[$key]["price"]; ?></div>
			
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
        </div>
    </div>
</div>

</body>
</html>