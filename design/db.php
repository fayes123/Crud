<?php

 /////////////////// connect database ///////////////////////

//  DESKTOP-U8UOE8J

 $name_server="localhost";
 $name_DB="Crud";
 $user_name="root";
 $password="";

 $conn=mysqli_connect($name_server,$user_name,$password,$name_DB);
if(!$conn)
  die("not succed conect ".mysqli_connect_error());



  // "INSERT INTO your_table_name (user_name, user_email, password) VALUES ('mohamed fayed', 'mhmfayd975@gmail.com', 'your_password')";

// $connection =[
//  "Database"=>$name_DB,
//  "Uid"=>$user_name,
//  "PWD" => $password 
// ];

// $conn=sqlsrv_connect($name_server,$connection);

//  $tsql="SELECT * from Users_sch.Users";

//    $stmt =sqlsrv_query($conn,$tsql);

//    if($stmt == false){
//     echo "Error";
//    }

//    while($obj = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
//      echo "name: ". $obj['name_user']." ";
//      echo "E_mail: ". $obj['e_mailuser']." ";
//      echo "password: ". $obj['password']."<br>";
//    }

//   sqlsrv_free_stmt($stmt);
//    sqlsrv_close($conn);

