<?php
    session_start();
    $maxp = $maxc = $maxs = 10;
    if(isset($_POST['setp'])){
        $_SESSION['maxp'] = $_POST['amountInputp'];
    }else{$_SESSION['maxp']= 10;}
    if(isset($_POST['setc'])){
        $_SESSION['maxc'] = $_POST['amountInputc'];
    }else{$_SESSION['maxc']= 10;}
    if(isset($_POST['sets'])){
        $_SESSION['maxs'] = $_POST['amountInputs'];
    }else{$_SESSION['maxs']= 10;}
 ?>
<!DOCTYPE html>
<html>
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
	<style type="text/css">
        .font{
            font-family: serif, Comic Sans MS;
        }
        #font{
            font-family: serif, Comic Sans MS;
        }
	</style>
</head>
<body>
	<header>
		<nav class="nav-wrapper blue accent-5 z-depth-3">
			<div class="container">
			    <a href="#" class="brand-logo" id="font">Queue Management System</a>
                <a href="#" class="sidenav-trigger" data-target="mobile-links">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php" id="font">Home</a></li>
                    <li><a href="add.php" id="font">Add a Patient</a></li>
                </ul>
                <ul class="sidenav blue accent-5 z-depth-3" id="mobile-links">
                    <li><a href="#" id="font">Queue Management System</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="add.php">Add a Patient</a></li>
                </ul>
            </div>
		</nav>
	</header>
    <details class='container' style="padding-top:4%">
        <summary class='font'>Change Max Queue Sizes</summary>
        <div class="row" style="width:100% padding-top:4%">
            <form method="POST" class='center col s4' style="width:33%">
                <label id='font'>Set Max Queue Size (1-1000)</label>
                <!-- <input type="range" name="amountRangep" min="1" max="1000" value="$_SESSION['maxp']" oninput="this.form.amountInputp.value=this.value" /> -->
                <input type="number" name="amountInputp" min="1" max="1000" value="$_SESSION['maxp']" oninput="this.form.amountInputp.value=this.value" />
                <input type="submit" name="setp" value="Set Patient" class="btn brand blue">
                <div class="black-text">
                    <?php
                    echo "Current Queue Size set to ".$_SESSION['maxp'];
                    ?>
                </div>
            </form>
            <form method="POST" class='center col s4' style="width:33%">
                <label id='font'>Set Max Queue Size (1-1000)</label>
                <!-- <input type="range" name="amountRangec" min="1" max="1000" value="$_SESSION['maxc']" oninput="this.form.amountInputc.value=this.value" /> -->
                <input type="number" name="amountInputc" min="1" max="1000" value="$_SESSION['maxc']" oninput="this.form.amountInputc.value=this.value" />
                <input type="submit" name="setc" value="Set Children" class="btn brand blue">
                <div class="black-text">
                    <?php
                    echo "Current Queue Size set to ".$_SESSION['maxc'];
                    ?>
                </div>
            </form>
            <form method="POST" class='center col s4' style="width:33%">
                <label id='font'>Set Max Queue Size (1-1000)</label>
                <!-- <input type="range" name="amountRanges" min="1" max="1000" value="$_SESSION['maxs']" oninput="this.form.amountInputs.value=this.value" /> -->
                <input type="number" name="amountInputs" min="1" max="1000" value="$_SESSION['maxs']" oninput="this.form.amountInputs.value=this.value" />
                <input type="submit" name="sets" value="Set Senior" class="btn brand blue">
                <div class="black-text">
                    <?php echo "Current Queue Size set to ".$_SESSION['maxs'];
                    ?>
                </div>
            </form>
    </div>
    </details>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        
        $(document).ready(function(){
            $('.sidenav').sidenav();
        })
    </script>
</body>
</html>