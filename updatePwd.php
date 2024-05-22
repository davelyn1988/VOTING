<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "votingsystem";

function test_input($data) {
    global $conn; 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

$conn = mysqli_connect($hostname, $username, $password, $database);


if(empty($_POST['existingPassword']) || empty($_POST['newPassword'])) {
    $error = "Fields Required.";
} else {
    
    $old = test_input($_POST['existingPassword']);
    $new = test_input($_POST['newPassword']);


    $old = mysqli_real_escape_string($conn, $old);
    $sql = "SELECT * FROM tbl_admin WHERE admin_password='$old'";
    $query = mysqli_query($conn, $sql);

    
    $rows = mysqli_num_rows($query);
    if($rows == 1) {
        
        $new = mysqli_real_escape_string($conn, $new); 
        $update_sql = "UPDATE tbl_admin SET admin_password='$new' WHERE admin_username='admin'";
        $update_query = mysqli_query($conn, $update_sql);
        if($update_query) {
            
            $success_message = "Password changed successfully.";
        } else {
            $error = "Failed to update password.";
        }
    } else {
        $error = "Old password is incorrect.";
    }
}

mysqli_close($conn); 
?>


<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

<div class="container">
</div>

<div class="container" style="padding-top: 150px;">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center" style="border: 2px solid gray; padding: 50px;">

            <?php if(isset($error)): ?>
                <img src="images/error.png" width="70" height="70">
                <h3 class="text-info specialHead text-center"><strong><?php echo $error; ?></strong></h3>
                <a href="index.html" class="btn btn-primary"> <span class="glyphicon glyphicon-ok"></span> <strong> Finish</strong> </a>
            <?php elseif(isset($success_message)): ?>
                <img src="images/success.png" width="70" height="70">
                <h3 class="text-info specialHead text-center"><strong><?php echo $success_message; ?></strong></h3>
                <a href="cpanel.php" class="btn btn-primary"> <span class="glyphicon glyphicon-ok"></span> <strong> Finish</strong> </a>
            <?php endif; ?>

        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>
</html>
