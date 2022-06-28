<?php
session_start();
require "database.php";

if (isset($_POST["singlebutton"]))
{
    #retrieve file title
    $user_id = $_SESSION["id"];
    echo $user_id;
    $name = $_POST["product_name"];
    $condition = $_POST["product_name_fr"];
    $category = $_POST["product_categorie"];
    $quantity = $_POST["available_quantity"];
    $description = $_POST["product_description"];
    $price = $_POST["product_price"];
    echo $description;

    $cat;
    switch($category) {
        case "Laptops":
            $cat = 1;
            break;
        case "PC":
            $cat = 2;
            break;
        case "Smartphones":
            $cat = 3;
            break;
        case "Games/Consoles":
            $cat = 4;
            break;
        case "Accessoires":
            $cat = 5;
            break;
    }
   
    //$file = $_FILES["filebutton"]["name"];
    $namebild = $_FILES["file"]["name"];

    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    $tname = $_FILES["file"]["tmp_name"];
    
    $uploads_dir = 'uploads';
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);

    
    $sql = "INSERT into product ( prod_name, available_quantity, prod_description, prod_condition, prod_img_name, price, categoryID, userID) 
    VALUES ( '$name', '$quantity', '$description', '$condition', '$pname', '$price', '$cat', '$user_id');";
   
   if(mysqli_query($conn,$sql)){
        echo "File Sucessfully uploaded";
        header("Location: dashboard.php?upload=success");
    }
    else {
        echo "Error";
        header("Location: dashboard.php?uploadfailed");
    }
    
}