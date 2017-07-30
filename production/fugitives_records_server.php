<?php

$db = new PDO('mysql:host=127.0.0.1; dbname=bjmp_db', 'root', '9489489');
$page = isset($_GET['p'])?$_GET['p']:'';
if ($page == 'add') {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middlename = $_POST['middlename'];
	$age = $_POST['age'];
	$datemissing = $_POST['datemissing'];
	$stmt = $db->prepare("INSERT INTO fugitives_table values('',?,?,?,?,?)");
	$stmt->bindParam(1,$firstname);
	$stmt->bindParam(2,$lastname);
	$stmt->bindParam(3,$middlename);
	$stmt->bindParam(4,$age);
	$stmt->bindParam(5,$datemissing);
	if ($stmt->execute()) {
		echo "Success add data";
	} else {
		echo "Fail add data";
	}
} elseif ($page=='edit') {
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middlename = $_POST['middlename'];
	$age = $_POST['age'];
	$datemissing = $_POST['datemissing'];
	$stmt = $db->prepare("UPDATE fugitives_table SET firstname=?, lastname=?, middlename=?, age=?, datemissing=? WHERE id=?");
	$stmt->bindParam(1,$firstname);
	$stmt->bindParam(2,$lastname);
	$stmt->bindParam(3,$middlename);
	$stmt->bindParam(4,$age);
	$stmt->bindParam(5,$datemissing);
	$stmt->bindParam(6,$id);
	if ($stmt->execute()) {
		echo "Success update data";
	} else {
		echo "Fail update data";
	}
} elseif ($page=='delete') {
	
} else {
	$stmt = $db->prepare("SELECT * FROM fugitives_table order by id desc");
	$stmt->execute();
	while ($row = $stmt->fetch()) {
		?>
		<tr>
			<td><?php echo $row['id'] ?></td>
			<td><?php echo $row['firstname'] ?></td>
			<td><?php echo $row['lastname'] ?></td>
			<td><?php echo $row['middlename'] ?></td>
			<td><?php echo $row['age'] ?></td>
			<td><?php echo $row['datemissing'] ?></td>
			<td>
				<button class="btn btn-warning" data-toggle="modal" data-target="#edit-<?php echo $row['id'] ?>">Edit</button>
				<!-- Modal -->
				<div class="modal fade" id="edit-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel-<?php echo $row['id'] ?>">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="editLabel-<?php echo $row['id'] ?>">Modal title</h4>
				      </div>
				      <form>
				      <div class="modal-body">
				      	<div class="form-group">
				      		  <input type="hidden" id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>">
                              <label for="firstname">First Name</label>
                              <input type="text" class="form-control" id="firstname-<?php echo $row['id'] ?>" value="<?php echo $row['firstname'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="lastname">Last Name</label>
                              <input type="text" class="form-control" id="lastname-<?php echo $row['id'] ?>" value="<?php echo $row['lastname'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="middlename">Middle Name</label>
                              <input type="text" class="form-control" id="middlename-<?php echo $row['id'] ?>" value="<?php echo $row['middlename'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="age">Age</label>
                              <input type="number" class="form-control" id="age-<?php echo $row['id'] ?>" value="<?php echo $row['age'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="datemissing">Date Missing</label>
                              <input type="text" class="form-control" id="datemissing-<?php echo $row['id'] ?>" value="<?php echo $row['datemissing'] ?>">
                            </div>
                        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="submit" onclick="updateData(<?php echo $row['id'] ?>)" class="btn btn-primary">Update</button>
				      </div>
				      </form>
				    </div>
				  </div>
				</div>
				<!--/Modal-->
				<button class="btn btn-danger">Delete</button>
			</td>
		</tr>
		<?php
	}
}

?>