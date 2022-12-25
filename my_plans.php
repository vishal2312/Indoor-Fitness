<?php  
    session_start();       
    $email_id = $_SESSION['email_id'];
    $selected_exercise = $_POST['selected_exercise'];
    if ($email_id == ''){
        echo '<script>alert("You are not Logged In. Please Login to add plans");</script>';
        echo '<script>window.location.href = "sign_in.html";</script>';                 
    }
    // The below code is used for Special Programs
    if ($selected_exercise == "TOTAL BODY WORKOUT") {
    	$message = add_plan($email_id, "SPECIAL PROGRAMS", $selected_exercise);
    	echo "<script type='text/javascript'>alert('$message');</script>";
    	echo '<script>window.location.href = "total_body_workout.html";</script>';                         
    }
    else if ($selected_exercise == "MUSCLE BUILDING") {
    	$message = add_plan($email_id, "SPECIAL PROGRAMS", $selected_exercise);
    	echo "<script type='text/javascript'>alert('$message');</script>";
    	echo '<script>window.location.href = "muscle_building.html";</script>';                         
    }
    else if ($selected_exercise == "WEIGHT LOSS") {
    	$message = add_plan($email_id, "SPECIAL PROGRAMS", $selected_exercise);
    	echo "<script type='text/javascript'>alert('$message');</script>";
    	echo '<script>window.location.href = "weight_loss.html";</script>';                         
    }
    else if ($selected_exercise == "HIIT TRAINING") {
    	$message = add_plan($email_id, "SPECIAL PROGRAMS", $selected_exercise);
    	echo "<script type='text/javascript'>alert('$message');</script>";
    	echo '<script>window.location.href = "hiit_training.html";</script>';                         
    }
    else if ($selected_exercise == "CARDIO BLAST") {
    	$message = add_plan($email_id, "SPECIAL PROGRAMS", $selected_exercise);
    	echo "<script type='text/javascript'>alert('$message');</script>";
    	echo '<script>window.location.href = "cardio_blast.html";</script>';
    }
    // The below code is for OFFICE WORKOUT
    else if ($selected_exercise == "OFFICE WORKOUT") {
        $message = add_plan($email_id, "OFFICE WORKOUT", "OFFICE WORKOUT");
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo '<script>window.location.href = "office_workout.html";</script>';        
    }
    // The below code is for YOGA
    else if ($selected_exercise == "YOGA") {
        $message = add_plan($email_id, "YOGA", "YOGA");
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo '<script>window.location.href = "yoga.html";</script>';        
    }
    else {
    	echo "<script type='text/javascript'>alert('No Plan Selected. Please select a Plan');</script>";
    	echo '<script>window.location.href = "all_exercise.html";</script>';    	
    }

    function add_plan($email_id, $type_of_exercise, $selected_exercise) {
    	include('connection.php');
	    $sql = "select * from exercise_plans where email_id = '$email_id' and sub_group = '$selected_exercise'";  
	    $result = mysqli_query($con, $sql);  
	    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
	    $count = mysqli_num_rows($result);

	    if($count==0) {    
	        $sql="INSERT INTO exercise_plans(email_id,type_of_exercise,sub_group) VALUES('$email_id','$type_of_exercise', '$selected_exercise')";    
	        $result = mysqli_query($con, $sql);   
	        if($result) {    
	        	$message = "$selected_exercise added to your current plan. \\nLogged in with EmailId: $email_id";
	        }
	        else {
	        	$message = "Something Went Wrong while saving your plan. Please try again later";              
	        }
	    }
	    else {
	        $message = "Selected plan already exists";              
	    }
	    return $message;
    }
?>