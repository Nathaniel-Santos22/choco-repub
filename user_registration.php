<?php
    include 'database/db.php';
    if(isset($_POST['submit'])){
     $name =  $_POST['name'];
     $contactno = $_POST['contactno'];
     $username =  $_POST['username'];
     $password = $_POST['password'];
     
     if($password == $confirmpass){
        $sql = "INSERT INTO users (name, contactno, username, password) VALUES ('$name','$contactno','$username','$password')";
     $result = mysqli_query($conn, $sql);
     
     if($result){
        header("location: user_index.php?user=$name");
     }
     else{
        echo "<script>alert('Registration Failed');</script>";
     }
     }else{
        echo "<script>
        alert('Password did not match');
        location.href = 'index.php';
        </script>";
     }
    }
?>