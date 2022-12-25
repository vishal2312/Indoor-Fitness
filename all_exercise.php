<?php  
    session_start();       
    $email_id = $_SESSION['email_id'];
    $selected_exercise = $_POST['selected_exercise'];
    if ($email_id == ''){
        echo '<script>alert("You are not Logged In. Please Login to add plans");</script>';
        echo '<script>window.location.href = "sign_in.html";</script>';                 
    }
    if ($selected_exercise == "ABS WORKOUT") {
    	$message = add_plan($email_id, "ALL EXERCISE", $selected_exercise);
    	echo "<script type='text/javascript'>alert('$message');</script>";
    	echo '<script>window.location.href = "abs_workout.html";</script>';                         
    }
    else if ($selected_exercise == "ARMS WORKOUT") {
    	$message = add_plan($email_id, "ALL EXERCISE", $selected_exercise);
    	echo "<script type='text/javascript'>alert('$message');</script>";
    	echo '<script>window.location.href = "arms_workout.html";</script>';                         
    }
    else if ($selected_exercise == "CHEST WORKOUT") {
    	$message = add_plan($email_id, "ALL EXERCISE", $selected_exercise);
    	echo "<script type='text/javascript'>alert('$message');</script>";
    	echo '<script>window.location.href = "chest_workout.html";</script>';                         
    }
    else if ($selected_exercise == "LEGS WORKOUT") {
    	$message = add_plan($email_id, "ALL EXERCISE", $selected_exercise);
    	echo "<script type='text/javascript'>alert('$message');</script>";
    	echo '<script>window.location.href = "legs_workout.html";</script>';                         
    }
    else if ($selected_exercise == "BACK AND SHOULDER WORKOUT") {
    	$message = add_plan($email_id, "ALL EXERCISE", $selected_exercise);
    	echo "<script type='text/javascript'>alert('$message');</script>";
    	echo '<script>window.location.href = "back_and_shoulder_workout.html";</script>';
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