<?php  include('design/header.php'); ?>
<?php include ('design/validation.php')  ?>

<?php

    if(isset($_POST['submit'])){
        $name =sanitize_input($_POST['name']);

        $email =sanitize_email($_POST['email']);
        
        $password =sanitize_input($_POST['password']);
        
        if(required_input($name) && required_input($email) && required_input($password)){
            if(minmum_input($name, 3) && maxmum_input($name, 20)){
                if(minmum_input($password, 8) && maxmum_input($password,20)){
                    
                    if(valid_EMail($email)){

                        $hashed_password=password_hash($password,PASSWORD_DEFAULT);

                        $sql = "INSERT INTO Users (user_name, user_email, password ) 
                        VALUES ('$name', '$email', '$hashed_password') ";

                        $result = mysqli_query($conn, $sql);

                        if($result === false){
                            echo "<pre>";
                            die(print_r(mysqli_connect_error()));
                        }else{
                            $succes.="ADDED SUCCESSFULLY";
                            header("location:index.php");
                        }
                    }else{
                        $Errors.="please enter a valid E_mail";
                    
                    }

             }else{
                $Errors.="the password Must be Grater than 3 And less than 25 Digits";
             }  
            
            }else{
                $Errors.="the name Must be Grater than 3 And less than 30";
            }  

        }else{

            $Errors.="please Fill this fields";
        }
    }
?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
        
        <?php if($Errors): ?>
           <h5 class="alert alert-danger text-center"> <?php echo $Errors; ?> </h5>
        <?php  endif; ?>

        <?php if($succes): ?>
           <h5 class="alert alert-success text-center"> <?php echo $succes; ?> </h5>
        <?php  endif; ?>


    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="post" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
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
         
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
   
<?php  include('design/footer.php'); ?>