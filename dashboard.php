

	<?php
	include_once "header.php";
	?>
	<!-- NAVIGATION -->
	<!--<nav class="navbar navbar-inverse navbar-static-top" role="navigation" id="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" id="burger-menu" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
				</div>
			  
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="#">Home</a></li>
							<li><a href="#">PC</a></li>
							<li><a href="#">Laptops</a></li>
							<li><a href="#">Smartphones</a></li>
							<li><a href="#">Games/Consoles</a></li>	
							<li><a href="#">Accessories</a></li>
						</ul>
				</div>
				
			</div>
		</nav>-->

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section text-center  text-sm-start">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">My Account</h3>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION  for list of products -->

	<section class=" p-5 p-lg-0 pt-lg-5 text-center  text-sm-start">

		<?php
		include_once 'database.php';
		//check if session exists and get the id of the user
		if (isset($_SESSION['id'])) {
			$id = $_SESSION['id'];
			$query = "SELECT firstname, lastname, email, mobile FROM users WHERE id = '$id'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);

			$fname = $row['firstname'];
			$lname = $row['lastname'];
			$email = $row['email'];
			$mobile = $row['mobile'];
		} else {
			header("Location: index.php");
		}
		?>



		<div class="row">
			<div class="col-xs-6">
				<div class="col-md-8">
					<br>
					<br>
					<div class="card mb-3">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">First Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?php echo $fname; ?>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Last Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?php echo $lname; ?>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?php echo $email; ?>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<h6 class="mb-0">Mobile</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<?php echo $mobile; ?>
								</div>
							</div>
							<hr>
							<!--<div class="row">
								<div class="col-sm-12">
									<a class="btn btn-info " target="__blank" href="#">Edit</a>
								</div>
							</div>-->
						</div>
					</div>
				</div>

			</div>

			<?php
			if (isset($_SESSION["email"])) {
				echo '

			<div class="col-xs-6">
				<form action="upload.php" method="post" class="form-horizontal" enctype="multipart/form-data">
					<fieldset>

						<!-- Form Name -->
						<legend>PRODUCTS</legend>


						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
							<div class="col-md-4">
								<input id="product_name" name="product_name" placeholder="PRODUCT NAME"
									class="form-control input-md" required="" type="text">

							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="product_name_fr">PRODUCT CONDITION</label>
							<div class="col-md-4">
								<select id="product_name_fr" name="product_name_fr" class="form-control">
									<option>new</option>
									<option>used</option>
								</select>
							</div>
						</div>

						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
							<div class="col-md-4">
								<select id="product_categorie" name="product_categorie" class="form-control">
									<option>Laptops</option>
									<option>PC</option>
									<option>Smartphones</option>
									<option>Games/Consoles</option>
									<option>Accessoires</option>
								</select>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="available_quantity">AVAILABLE QUANTITY</label>
							<div class="col-md-4">
								<input id="available_quantity" name="available_quantity"
									placeholder="AVAILABLE QUANTITY" class="form-control input-md" required=""
									type="text">

							</div>
						</div>

						


						<!-- Textarea -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
							<div class="col-md-4">
								<textarea class="form-control" id="product_description"
									name="product_description"></textarea>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="product_price">Price</label>
							<div class="col-md-4">
								<input id="product_price" name="product_price"
									placeholder="Price" class="form-control input-md" required=""
									type="Text">

							</div>
						</div>

						<!-- File Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="file">Upload Image</label>
							<div class="col-md-4">
								<input id="file" name="file" class="input-file" type="file">
							</div>
						</div>

						<!-- Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="singlebutton">Send</label>
							<div class="col-md-4">
								<button id="singlebutton" name="singlebutton" class="btn btn-primary">Add
									product</button>
							</div>
						</div>

					</fieldset>
				</form>
			</div>';
			}
			?>



	</section>


	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section text-center  text-sm-start">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">My Products</h3>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->



	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<?php

				$id = $_SESSION['id'];
				//sql statement to get all products from the database
				$sql = "SELECT * FROM product WHERE userID = '$id'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$prod_id = $row['productID'];
						$prod_name = $row['prod_name'];
						$prod_description = $row['prod_description'];
						$prod_condition = $row['prod_condition'];
						$prod_img_name = $row['prod_img_name'];
						$prod_price = $row['price'];
						$prod_category = $row['categoryID'];
						$prod_quantity = $row['available_quantity'];
						$price = $row['price'];




				?>

						<div class="col-md-4">

							<!-- product -->
							<div class="product">
								<div class="product-img">
									<?php echo '<img src="uploads/' . $prod_img_name . '" alt="' . $prod_name . '" style="width:350px;height:195px;">'; ?>
								</div>
								<div class="product-body">

								<h5 class="prod-condition"><?php echo $prod_condition; ?></h5>
                                <h4 class="product-name"><?php echo $prod_name; ?></h4>
                                <h5 class="product-description"><?php echo $prod_description; ?></h5>
                                <h4 class="product-price"><?php echo $price; ?>€</h4>
                              

								</div>

							</div>

						</div>
				<?php
					}
				}
				?>

			</div>

			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->



	<?php include_once 'footer.php'; ?>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>