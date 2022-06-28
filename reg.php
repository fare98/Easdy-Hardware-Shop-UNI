<?php include('register.php'); 
   
    include 'header.php';
    include 'navbar.php';
    ?>
    
    <div class="container mt-5 py-5" style="max-width: 500px">
        <form action="" method="POST">
            <h3 class="text-center mb-5">User Registration Form</h3>
            <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control" name="firstname" id="firstName" />
            </div>
            <div class="form-group">
             <label>Last name</label>
                <input type="text" class="form-control" name="lastname" id="lastName" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" name="mobile" id="mobilenumber" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" />
            </div> 
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" />
                <font size="1">(At least 6 characters)</font>
            </div>
            <div class="form-group">
                <label>Repeat password</label>
                <input type="password" class="form-control" name="password2" id="password" />
            </div>


<?php
    $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(strpos($fullURL, "signup=email") == true) {
        echo '<center><h4 style="color:#FF0000">The email you entered already exists!</h4></center>';
    }

    if(strpos($fullURL, "signup=empty") == true) {
        echo '<center><h4 style="color:#FF0000">You did not fill in all fields!</h4></center>';
    }

    if(strpos($fullURL, "signup=password") == true) {
        echo '<center><h5 style="color:#FF0000">Please type in a password with at least 6 characters!</h5></center>';
    }

    if(strpos($fullURL, "signup=matching") == true) {
        echo '<center><h4 style="color:#FF0000">The passwords do not match!</h54></center>';
    }
?>

            <div><button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">
                Register
            </button>
            </div>
        </form>
    </div>
    

<?php
 include_once 'footer.php'; // unser Footer 
 ?>
