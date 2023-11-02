<?php
   include("database/db.php");
   session_start();
   if(isset($_POST['submit'])) {
      
      $username = $_POST['username'];
      $password = $_POST['password']; 
      
      $sql = "SELECT id, name FROM users WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);


      if ($result->num_rows > 0) {
        // output data of each row
        while($rows = $result->fetch_assoc()) {
          echo $name = $rows["name"]; 
        }
        $_SESSION['$name'] = $user;
        if($username == "admin"){
            echo "<script>
            alert('Login Successfully');
            location.href = 'admin_dashboard.php';
            </script>";
        }else{
            header("location: user_index.php?user=$name");
            
        }
      }else {
        echo "<script>
        alert('invalid username or password');
        location.href = 'index.php';
        </script>";
      }
   }
?>