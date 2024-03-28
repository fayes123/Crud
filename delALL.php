<?php include ('design/header.php') ?>
<?php include ('design/validation.php')  ?>

<h1 class="text-center col-12 bg-danger py-3 text-white my-2">Deleted ALL Users</h1>

<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
   
    if(isset($_POST['Delete'])){
        
        $Sql= "SELECT * FROM users";
        $STMT =mysqli_query($conn, $Sql);

        $query ="DELETE FROM users";
        $result = mysqli_query($conn, $query);

        if($result){
           if(mysqli_num_rows($STMT) <= 0){
              $Errors.='Not Found Users For Deleted';
              header("refresh: 3; url=index.php");
           }else{
            $succes.="SUCCESSED DELETE ALL USERS";
            header("refresh: 3; url=index.php");
           }
        }else{
            header("location.index.php");
        }
    }
}

?>

<?php if($Errors): ?>
    <h5 class="alert alert-danger text-center"> <?php echo $Errors; ?> </h5>
<?php  endif; ?>

<?php if($succes): ?>
    <h5 class="alert alert-success text-center"> <?php echo $succes; ?> </h5>
<?php  endif; ?>

<?php include ('design/footer.php') ?>