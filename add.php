<?php  include('inc/header.php'); ?>
<?php  include('inc/validation.php'); ?>
<?php 

    if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
        $name = $_POST['name'];
        $mail = sanitize_email($_POST['email']);
        $password = $_POST['password'];
        if(req($name )){
            echo "to small";
            return;
        }
        $hashed_pass = password_hash($password , PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`user_name`,`user_mail`,`user_password`) VALUES('$name' ,'$mail' , '$hashed_pass')";
        $result = mysqli_query($conn,$sql);
        if($result){
            $added = "Added Done";
        }
    }
?>
    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
    <div class="col-md-6 offset-md-3">
        <?php if(isset($added)):?>
            <div class="alert alert-success text-center">
                <?php echo $added ?>
            </div>
        <?php endif ?>
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" >
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
         
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   
<?php  include('inc/footer.php'); ?>

 
  