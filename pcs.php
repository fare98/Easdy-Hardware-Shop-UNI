

<?php
include_once 'header.php'; // unser Header
include_once 'navbar.php';
?>



<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php
            
            //sql statement to get all products from the database
            $sql = "SELECT * FROM product WHERE categoryID = '2'";
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






<?php
include_once 'footer.php'; // unser Footer
?>
</body>

</html>