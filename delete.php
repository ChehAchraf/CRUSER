

<?php  include('inc/header.php'); ?>
<?php  include('inc/validation.php'); ?>
<?php 
    if( isset( $_GET['id'] )){
       
        $id = $_GET['id'];
        $sql = "SELECT * FROM `users` WHERE `id` = '$id' LIMIT 1";
        $result = mysqli_query($conn , $sql);
        $check = mysqli_num_rows($result);
        if(!$check){
            header('Location: index.php');
            exit();
        }else{
            $sql = "DELETE FROM `users` WHERE `id` = '$id'";
            $result = mysqli_query($conn , $sql);
            header("refresh:3;url=index.php");
        }
    }
    
?>
    <h1 class="text-center col-12 bg-danger py-3 text-white my-2">Delete User</h1>
  
   
<?php  include('inc/footer.php'); ?>

 
   