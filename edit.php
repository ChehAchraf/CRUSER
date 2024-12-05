<?php  include('inc/header.php'); ?>
<?php 
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];
        echo $id;
        $sql = "SELECT * FROM `users`  WHERE `id` = '$id' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
    }else{
        header("Location: index.php");
    }
?>
    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Edit Info About User</h1>
    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" action="update.php">
            <div class="form-group">
                <?php echo $id; ?>
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" value="<?php echo $row['user_name'] ?>" class="form-control" id="exampleInputName1" >
                <input type="hidden" value="<?php echo $id; ?>"  name="id">          
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="email" name="email" value="<?php echo $row['user_mail'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password"  value="<?php echo $row['user_password'] ?>" class="form-control" id="exampleInputPassword1">
            </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   
<?php  include('inc/footer.php'); ?>

 
  