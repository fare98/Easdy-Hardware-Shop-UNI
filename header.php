<?php
session_start();
include 'database.php';
	//check if session exists and get the id of the user
	if(isset($_SESSION['id'])){	
		$id = $_SESSION['id'];
		$query = "SELECT firstname, lastname, email, mobile FROM users WHERE id = '$id'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
	
		$fname = $row['firstname'];
		$lname = $row['lastname'];
		$email = $row['email'];
		$mobile = $row['mobile'];
	}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Easy Hardware Shop</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">

            <div class="container">
                <ul class="header-links pull-left">
                <li><a class="nav-link " href="dashboard.php"><?php if(isset($_SESSION['id'])) {echo $fname;}  ?></a></li>
                </ul>
                    

                <ul class="header-links pull-right">
                    <!-- alternating btw. login/logout -->
                    <?php if (isset($_SESSION['email'])) { ?>
                        <li><a class="nav-link " href="index.php">Home</a></li>
                        <li><a class="nav-link" href="dashboard.php">My Account</a></li>
                        <li><a class="nav-link" href="logout.php">Log out</a></li>

                    <?php } else { ?>
                        <li><a class="nav-link" href="index.php">Home</a></li>
                        <li><a class="nav-link" href="login.php">Log in</a></li>
                        <li><a class="nav-link" href="reg.php">Sign up</a></li>
                    <?php } ?>
                </ul>


            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="index.php" class="logo">
                                <img src="./img/ehslogo1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="index.php" method="post">
                                <select class="input-select" id="mySelect" onchange="handleSelect(this)">
                                        <option class="hidden" value="" disabled selected>Categories</option>
                                        <option value="index">All Categories</option>
                                        <option value="newproducts">new</option>
                                        <option value="usedproducts">used</option>
                                </select>

                                <input  class="input" type="text" name="search" placeholder="Search here">
                                <button type="submit" name="submit-search" class="search-btn">Search</button>
                            </form>
                            
<?php
include_once 'search.php';
?>  

                        </div>
                    </div>

                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->