<?php  include('design/header.php'); ?>
<?php 

 if(isset($_GET['id']) && is_numeric($_GET['id'])){
          $id_user=$_GET['id'];

          $query ="SELECT * FROM users where user_id =$id_user";

          $result = mysqli_query($conn, $query);
          
          if(mysqli_num_rows($result)<=0){
            header("location:index.php");
          }

 }else{
    header("location: index.php");
 }

 $row = mysqli_fetch_assoc($result);

?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Edit Information About User</h1>
    <div class="col-md-6 offset-md-3">

         <form class="my-2 p-3 border" method="post" action="updata.php"> 
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" value="<?php echo $row['user_name']; ?>" class="form-control" id="exampleInputName1" >
                <input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="email" name="email" value="<?php echo $row['user_email'];   ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" value=" <?php echo $row['password'] ?>" class="form-control" id="exampleInputPassword1">
            </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   
<?php  include('design/footer.php'); ?>

 
  