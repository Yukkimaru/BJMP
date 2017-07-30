<?php
include_once 'config.php';
if(isset($_POST['btn-submit']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $folder="uploads/";
 $firstname =$_POST['firstname'];
 $lastname =$_POST['lastname'];
 $middlename =$_POST['middlename'];
 $age = $_POST['age'];
 $datemissing =$_POST['datemissing'];
 
 if(move_uploaded_file($file_loc,$folder,$file))
 {
 $sql="INSERT INTO fugitives_table(file,firstname,lastname,middlename,age,datemissing) VALUES('$file', '$firstname', '$lastname', '$middlename', '$age', '$datemissing')";
 mysqli_query($sql); 
?>
<script>
  alert('successfully uploaded');
        window.location.href='index.php?success';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');
        window.location.href='index.php?fail';
        </script>
  <?php
 }
}
?>