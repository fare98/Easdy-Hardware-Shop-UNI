<?php


$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
$queryResults = mysqli_num_rows($result);

if (isset($_POST['submit-search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM product WHERE 
    prod_name LIKE '%$search%' OR prod_description LIKE '%$search%' OR prod_condition LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
        while ($row = mysqli_fetch_array($result)) {


            $prod_name = $row['prod_name'];
            $prod_description = $row['prod_description'];
            $prod_condition = $row['prod_condition'];
            $prod_img_name = $row['prod_img_name'];
            $prod_price = $row['price'];
            $prod_category = $row['categoryID'];
            $prod_quantity = $row['available_quantity'];
            $price = $row['price'];
        
?>

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

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

                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /SECTION -->
    <?php
    } }else {
        echo "<font color='white'>Sorry, there are no results matching your search.</font>";
    }
}
