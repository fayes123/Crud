<?php  include('design/header.php'); ?>
<?php include('design/validation.php') ?>

    <h1 class="text-center col-12 bg-danger py-3 text-white my-2">Update Information About User</h1>
  

    <?php
       if($_SERVER['REQUEST_METHOD'] === "POST"){
        $name=sanitize_input($_POST['name']);

        $email=sanitize_email($_POST['email']);

        if(required_input($name) && required_input($email)){
            
            if(minmum_input($name, 3) && maxmum_input($name, 30)){
                    
                if(valid_EMail($email)){
                        
                        if(isset($_POST['id']) && is_numeric($_POST['id'])){
                        
                          $id_user = $_POST['id'];
                            if($password){
                                
                                if(minmum_input($password, 8) && maxmum_input($password, 25)){  
                                    $password=sanitize_input($_POST['password']);
                                
                                    $hash_password=password_hash($password, PASSWORD_DEFAULT);
                                
                                    $sql= "UPDATE users SET user_name='$name' , user_email='$email', password='$hash_password'
                                    where user_id = $id_user";
                                }else{
                                    $Errors.="the password min length 8 and maxmum lenght 25";  
                                }

                            }else{
                                $sql="UPDATE users set user_name='$name', user_email='$email'
                                where user_id =$id_user";
                            }

                            $result = mysqli_query($conn, $sql);

                            if($result === false){
                                die(print_r(mysqli_connect_error()));
                            }else{
                                $succes.="Succed Update";
                                header("refresh:5; url=index.php");
                            }
                        }else{
                            header("loaction:edit.php");
                        }       

                    }else{
                        $Errors.="please enter a valid E_mail";
                    }

            }else{
                $Errors.="the name Must be Grater than 3 And less than 30";
            }

        }else{
          $Errors.="this fields is required";
        }

       }
    ?>
       <?php if($Errors): ?>
        <h5 class="alert alert-danger text-center"> <?php echo $Errors; ?> </h5>
     <?php  endif; ?>

     <?php if($succes): ?>
        <h5 class="alert alert-success text-center"> <?php echo $succes; ?> </h5>
     <?php  endif; ?>


<?php  include('design/footer.php'); ?>
