<?php  
    session_start();     
    include('connection.php');  
    $email_id = $_POST['email_id'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $email_id = stripcslashes($email_id);  
        $password = stripcslashes($password);  
        $email_id = mysqli_real_escape_string($con, $email_id);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from users where email_id = '$email_id' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $_SESSION['logged'] = true;
            $_SESSION['email_id']= $row['email_id'];
            echo "<script type='text/javascript'>alert('Successfully logged in with email id: $email_id');</script>";
            echo '<script>window.location.href = "home.html";</script>';                         
        }  
        else{  
            echo '<script>alert("Login failed. Invalid username or password.");</script>';            
            echo '<script>window.location.href = "sign_in.html";</script>';             
        }     
?>