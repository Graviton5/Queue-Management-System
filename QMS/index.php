<?php 

	include("config/db_connect.php");

	if(isset($_POST['resetp'])){
		mysqli_query($connected,"ALTER TABLE patients AUTO_INCREMENT=1");
	}

	if(isset($_POST['submitp'])){
		$checkboxp = isset($_POST['checkboxp']) ? $_POST['checkboxp'] : '';
		for($i=0;$i<count($checkboxp);$i++){
			$del_id = $checkboxp[$i]; 
			mysqli_query($connected,"DELETE FROM patients WHERE patient_ID='".$del_id."'");
			$message = "Data deleted successfully !";
			header('Location: index.php');
		}
	}

	if(isset($_POST['resetc'])){
		mysqli_query($connected,"ALTER TABLE children AUTO_INCREMENT=1");
	}

	if(isset($_POST['submitc'])){
		$checkboxc = isset($_POST['checkboxc']) ? $_POST['checkboxc'] : '';
		for($i=0;$i<count($checkboxc);$i++){
			$del_id = $checkboxc[$i]; 
			mysqli_query($connected,"DELETE FROM children WHERE Child_ID='".$del_id."'");
			header('Location: index.php');
		}
	}

	if(isset($_POST['resets'])){
		mysqli_query($connected,"ALTER TABLE seniors AUTO_INCREMENT=1");
	}

	if(isset($_POST['submits'])){
		$checkboxs = isset($_POST['checkboxs']) ? $_POST['checkboxs'] : '';
		for($i=0;$i<count($checkboxs);$i++){
			$del_id = $checkboxs[$i]; 
			mysqli_query($connected,"DELETE FROM seniors WHERE Senior_ID='".$del_id."'");
			$message = "Data deleted successfully !";
			header('Location: index.php');
		}
	}
	$result = mysqli_query($connected,"SELECT * FROM patients");
	mysqli_close($connected);
?>
 <!DOCTYPE html>
<html>
<head>
	<title>Queue Management System</title>
</head>
<body>
	<?php include("header.php");?>

	<div class="container" style="padding-top:4%">
		<form action="index.php" method="POST">
			<div class="row">
			    <div class="col s12" style="margin-bottom:3%">
			      <ul class="tabs">
			        <li class="tab col s4"><a class="active white-text blue lighten-1" href="#id1" >Patient Queue</a></li>
			        <li class="tab col s4"><a class="white-text blue lighten-1" href="#id2">Children Queue</a></li>
			        <li class="tab col s4"><a class="white-text blue lighten-1" href="#id3">Senior Queue</a></li>
			      </ul>
			    </div>
			
				<div id= "id1" class="col s12">
					<input type="submit" name="submitp" value="Remove" class = "btn blue" style="margin-bottom:3%">
					<input type="submit" name="resetp" value="Reset Queue" class = "btn blue" style="margin-bottom:3%">
					<table class="stripped highlight">
			        <thead>
			          <tr>
			          	<th>Select</th>
				        <th>Name</th>
				        <th>Contact No.</th>
				        <th>Queue Number</th>
				        <th>Doctor Token</th>
			          </tr>
			        </thead>

			        <tbody><?php foreach($patients as $patient):?>
			          <tr>
			        	<td class='check'>
			        		<label>
			       				<input class="checkbox" type="checkbox" name="checkboxp[]" value="<?php echo $patient['patient_ID'];?>"/>
			        			<span></span>
			   				</label>
			   			</td>
			            <td><?php echo htmlspecialchars($patient['name']); ?></td>
			            <td><?php echo htmlspecialchars($patient['contact_No']); ?></td>
			            <td><?php echo htmlspecialchars($patient['patient_ID']); ?></td>
			            <td><?php echo htmlspecialchars($patient['doctor']); ?></td>
			          </tr>
			          <?php endforeach; ?>
			        </tbody>
			      	</table>
			    </div>

			    <div id= "id2" class="col s12">
					<input type="submit" name="submitc" value="Remove" class = "btn blue" style="margin-bottom:3%">
					<input type="submit" name="resetc" value="Reset Queue" class = "btn blue" style="margin-bottom:3%">			    	
					<table class="stripped highlight">
			        <thead>
			          <tr>
			          	<th>Select</th>
				        <th>Name</th>
				        <th>Contact No.</th>
				        <th>Queue Number</th>
				        <th>Doctor Token</th>
			          </tr>
			        </thead>

			        <tbody><?php foreach($children as $child):?>
			          <tr>
			        	<td class='check'>
			        	<label>
			       			<input class="checkbox" type="checkbox" name="checkboxc[]" value="<?php echo $child['Child_ID'];?>"/>
			        		<span></span>
			   				</label>
			   			</td>
			            <td><?php echo htmlspecialchars($child['Name']); ?></td>
			            <td><?php echo htmlspecialchars($child['contact_No']); ?></td>
			            <td><?php echo htmlspecialchars($child['Child_ID']); ?></td>
			            <td><?php echo htmlspecialchars($child['doctor']); ?></td>
			          </tr>
			          <?php endforeach; ?>
			        </tbody>
			      	</table>
			    </div>

			    <div id= "id3" class="col s12">
			    	<input type="submit" name="submits" value="Remove" class = "btn blue" style="margin-bottom:3%">
					<input type="submit" name="resets" value="Reset Queue" class = "btn blue" style="margin-bottom:3%">
					<table class="stripped highlight">
			        <thead>
			          <tr>
			          	<th>Select</th>
				        <th>Name</th>
				        <th>Contact No.</th>
				        <th>Queue Number</th>
				        <th>Doctor Token</th>
			          </tr>
			        </thead>

			        <tbody><?php foreach($seniors as $senior):?>
			          <tr>
			        	<td class='check'>
			        	<label>
			       			<input class="checkbox" type="checkbox" name="checkboxs[]" value="<?php echo $senior['Senior_ID'];?>"/>
			        		<span></span>
			   				</label>
			   			</td>
			            <td><?php echo htmlspecialchars($senior['Name']); ?></td>
			            <td><?php echo htmlspecialchars($senior['contact_No']); ?></td>
			            <td><?php echo htmlspecialchars($senior['Senior_ID']); ?></td>
			            <td><?php echo htmlspecialchars($senior['doctor']); ?></td>
			          </tr>
			          <?php endforeach; ?>
			        </tbody>
			      	</table>
			    </div>
			</div>
      </form>
	</div>
	<script>
	  	$(document).ready(function(){
	    	$('.tabs').tabs();
	  	});
	</script>
</body>
</html>