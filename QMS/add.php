<?php ob_start();
    include("header.php");
    $name = $contact_No = '';
    $errors = array('name'=>'','contact_No'=>'');
    include("config/db_connect.php");
    if(isset($_POST['enter'])){ //Submit Pressed

        //Entry Error Check
        if(empty($_POST['name'])){
                $errors['name'] = 'Name is required.  <br />';
        }
        else{
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                $errors['name'] = "Enter a vaild name.<br />";
            }
        }
        if(empty($_POST['contact_No'])){
            $errors['contact_No'] = 'Contact Number is required for communication. <br />';
        }
        else{
            $contact_No = $_POST['contact_No'];
            if(!preg_match('/^[6-9][0-9]{9}$/', $contact_No)){
                $errors['contact_No'] = "Enter a valid Contact Number (10 digits) <br />";
            }
        }

        //Selecting the Table to insert data into
        if($_POST['radio'] == "adult"){
            $result=mysqli_query($connected,"SELECT count(*) as total from patients");
            $data = mysqli_fetch_assoc($result);
            $num = $data['total'];

            if(!array_filter($errors) && $num < $_SESSION['maxp']){

                $name = mysqli_real_escape_string($connected, $_POST['name']);
                $contact_No = mysqli_real_escape_string($connected, $_POST['contact_No']);
                $doctor = mysqli_real_escape_string($connected, $_POST['doctor']);
                $sql = "INSERT INTO patients(name, contact_No, doctor) VALUES('$name', '$contact_No', '$doctor')";

                if(mysqli_query($connected, $sql)){
                    header("Location:add.php");
                } 
                else{
                    echo 'Query Error: '.mysqli_error($connected);
                }
            }
            else{
                echo "<div class='container red-text'>Queue Full!</div>";
            }
            mysqli_close($connected);  
        }
        else if($_POST['radio'] == "child"){
            $result=mysqli_query($connected,"SELECT count(*) as total from children");
            $data = mysqli_fetch_assoc($result);
            $num = $data['total'];

            if(!array_filter($errors) && $num < $_SESSION['maxc']){

                $name = mysqli_real_escape_string($connected, $_POST['name']);
                $contact_No = mysqli_real_escape_string($connected, $_POST['contact_No']);
                $doctor = mysqli_real_escape_string($connected, $_POST['doctor']);
                $sql = "INSERT INTO children(name, contact_No, doctor) VALUES('$name', '$contact_No', '$doctor')";

                if(mysqli_query($connected, $sql)){
                    header("Location: add.php");
                } 
                else{
                    echo 'Query Error: '.mysqli_error($connected);
                }
            }
            else{
                echo "<div class='container red-text'>Queue Full!</div>";
            }
            mysqli_close($connected);  
                
            } 
        else if($_POST["radio"] == "senior"){
            $result=mysqli_query($connected,"SELECT count(*) as total from seniors");
            $data = mysqli_fetch_assoc($result);
            $num = $data['total'];

            if(!array_filter($errors) && $num < $_SESSION['maxs']){

                $name = mysqli_real_escape_string($connected, $_POST['name']);
                $contact_No = mysqli_real_escape_string($connected, $_POST['contact_No']);
                $doctor = mysqli_real_escape_string($connected, $_POST['doctor']);
                $sql = "INSERT INTO seniors(name, contact_No, doctor) VALUES('$name', '$contact_No', '$doctor')";

                if(mysqli_query($connected, $sql)){
                    header("Location: add.php");
                } 
                else{
                    echo 'Query Error: '.mysqli_error($connected);
                }
            }
            else{
                echo "<div class='container red-text'>Queue Full!</div>";
            }
            mysqli_close($connected);  
        }
        else{
            echo "<div class='container red-text'>Input Error! Please Select a Patient Type!</div>";
        }
        ob_end_flush();     
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>       
	<title>Queue Management System</title>
    <style>
        [type="radio"]:checked + span:after,
        [type="radio"].with-gap:checked + span:before,
        [type="radio"].with-gap:checked + span:after {
          border: 2px solid #2196F3;
        }

        [type="radio"]:checked + span:after,
        [type="radio"].with-gap:checked + span:after {
            background-color: #2196F3;
        }
 
</style>
</head>
<body>
    <section class="container">
        <h4 class="center">Enter the Patient Information</h4>
        <form class="white" action="add.php" method="POST">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
            <div class="red-text"><?php echo $errors['name'];?></div>

            <label>Contact Number:</label>
            <input type="text" name="contact_No"  value="<?php echo htmlspecialchars($contact_No) ?>">
            <div class="red-text"><?php echo $errors['contact_No'];?></div>
            <label>Select the Doctor:</label>
            <select name="doctor" style="display:block; width:40%; margin: 2% 0;">
                <?php foreach($doctors as $doctor):?>

                <option value="<?php echo $doctor['Doctor_ID'] ?>"><?php echo htmlspecialchars('Dr.'.$doctor['Name'].' - '.$doctor['Doctor_ID']); ?></option>

                <?php endforeach; ?>
            </select>
            <p>
                <label>
                    <input type="radio" name="radio" value='adult' checked>
                    <span>Adult</span>
                </label>

                <label>
                    <input type="radio" name="radio" value='child'>
                    <span>Child</span>
                </label>

                <label>
                    <input type="radio" name="radio" value='senior'>
                    <span>Senior Citizen</span>
                </label>
            </p>
            
            <div class="center">
                <input type="submit" name="enter" value="submit" class="btn brand blue"></input>
            </div>
        </form>
    </section>
</body>
</html>