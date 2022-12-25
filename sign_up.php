<?php      
    include('connection.php');  
    $email_id = $_POST['email_id'];  
    $password = $_POST['password']; 
    $password_repeat = $_POST['password_repeat'];  

    if ($password != $password_repeat){
        echo '<script>alert("Password and Confirm Password must match. Please Try again");</script>'; 
        echo '<script>window.location.href = "sign_up.html";</script>';                         
    }

    $sql = "select * from users where email_id = '$email_id'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);

    if($count==0){    
        $sql="INSERT INTO users(email_id,password) VALUES('$email_id','$password')";    
        $result = mysqli_query($con, $sql);     
        if($result){    
            echo '<script>alert("Account Successfully Created. Please Sign In to proceed further");</script>'; 
            echo '<script>window.location.href = "sign_in.html";</script>';                
        } 
        else {    
            echo '<script>alert("Failure in Account Creation. Please try again!");</script>'; 
            echo '<script>window.location.href = "sign_up.html";</script>';  
        }   
    }

    else {
        echo '<script>alert("Email is already registered!");</script>'; 
        echo '<script>window.location.href = "sign_in.html";</script>';                
    }

