<?php include('inc/header.php');  ?>
<?php include('inc/validation.php');  ?>
<?php 

    if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
        $name = $_POST['name'];
        $mail = sanitize_email($_POST['email']);
        $password = $_POST['password'];
        if(req($name )){
            echo "to small";
            return;
        }
        if($password){
            $hashed_pass = password_hash($password , PASSWORD_DEFAULT);
            $id = $_POST['id'];
            $hashed_pass = password_hash($password , PASSWORD_DEFAULT);
            $sql = "UPDATE `users` SET `user_name` = '$name' , `user_mail` = '$mail' , `user_password` = '$password' WHERE  `id` = '$id'";
            $result = mysqli_query($conn , $sql);
            if ($result){
                echo "jhello;";
                header("Location: index.php");
            }else{
            $sql = "UPDATE `users` SET `user_name` = '$name' , `use_mail` = '$mail'  WHERE  `id` = '$id'";
            }
            $result = mysqli_query($conn,$sql);
            if($result){
            $updated = "Updated Done";
            header("Location: index.php");
        }
        }
    }
?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Update info</h1>
    
   
<?php  include('inc/footer.php'); ?>

 
  