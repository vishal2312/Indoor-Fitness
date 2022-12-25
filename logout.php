<?php  
    session_start();     
    include('connection.php');  
    $email_id = $_SESSION['email_id']; 
    if ($email_id == ''){
        echo '<script>alert("No user Logged In...........");</script>';
        echo '<script>window.location.href = "sign_in.html";</script>';                
 
    }
    else {
        echo "<script type='text/javascript'>alert('You are logged in as: $email_id. Are you sure you want to log out?');</script>"; 
        $_SESSION['logged'] = false;
        $_SESSION['email_id']= '';
        $email_id = $_SESSION['email_id']; 
        echo "<script type='text/javascript'>alert('Successfully Logged out: $email_id.');</script>"; 
        echo '<script>window.location.href = "sign_in.html";</script>';                

    }
?>