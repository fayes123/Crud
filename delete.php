<?php  include('design/header.php'); ?>
<?php  include('design/validation.php')  ?>

    <h1 class="text-center col-12 bg-danger py-3 text-white my-2">User Deleted</h1>
   <?php
     if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id_user=$_GET['id'];
        $sql="SELECT * FROM users where user_id = $id_user";
         $stmt=mysqli_query($conn,$sql);

        $query = "DELETE FROM users where user_id = $id_user";

        $result= mysqli_query($conn, $query);

        if($result === false){
            header("location:index.php");
        }else{
            if(mysqli_num_rows($stmt)<=0){
                $Errors.="DELETED NOT SUCCESSFULLY";
                header("refresh: 3;url=index.php");
            }
            else{
            $succes.="User Deleted successfully";
            header("refresh: 3;url=index.php");
            }
        }
     }else{
          header("location:index.php");
     }

    ?>
   
   
   <?php if($succes): ?>
        <h5 class="alert alert-success text-center"> <?php echo $succes; ?> </h5>
     <?php  endif; ?>

   <?php if($Errors): ?>
        <h5 class="alert alert-success text-center"> <?php echo $Errors; ?> </h5>
     <?php  endif; ?>

<?php  include('design/footer.php'); ?>

 
  