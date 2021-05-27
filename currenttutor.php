<?php include 'session.php'; ?>
<?php
if(isset($_POST["submit"]))
{
include 'db.php';
if (isset($_POST['tusername'])) {
  // code...
  $teacher=$_POST['tusername'];
  $student=$_SESSION['username'];


  $teacherphone="SELECT phone FROM teacher WHERE username='$teacher'";
  $result=$conn->query($teacherphone);

  if ($result->num_rows>0) {

    // code...
    $retrive=mysqli_fetch_array($result);
    $phone=$retrive['phone'];


  //student phone
  // teacher's phone
  $studentphone="SELECT phone FROM student WHERE username='$student'";
  $result=$conn->query($studentphone);
  $retrive=mysqli_fetch_array($result);
  $sphone=$retrive['phone'];

  $sql1="INSERT INTO currenttuitions (student,teacher,teacherphone,studentphone) VALUES ('$student','$teacher','$phone','$sphone')";
  $result=$conn->query($sql1);

  echo '<script type="text/javascript"> alert("Tutor added");window.location="currenttutor.php";</script>';
  }
  else {
    echo '<script type="text/javascript"> alert("Tutor Not found");window.location="status.php";</script>';

  }
}

}


?>

 <?php

 if(isset($_GET['delete']))
 {
   include 'db.php';
   $teacher=$_GET['delete'];
   $sql1="DELETE FROM currenttuitions WHERE teacher='$teacher'";
   $result=$conn->query($sql1);
   // header("Location:currenttutor.php");

   echo '<script type="text/javascript"> alert("Tutor deleted");window.location="currenttutor.php";</script>';
 }
  ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
 <link rel="stylesheet" href="profilestyle.css">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<body>
	<center><h1 style="color: white">Your tutors</h1></center>
	<div class="container">
	<table class="table-secondary table table-striped">
		<tr>
 			<th width="40%">Teacher Name</th>
 			<th width="40%">Phone</th>
      <th width="20%">Remove</th>
<tbody>
  <?php
  include 'db.php';


  $username=$_SESSION['username'];

  $sql="SELECT * FROM currenttuitions WHERE student='$username'";
  $result=$conn->query($sql );
  // $retrive=mysqli_fetch_array($result);

  while($row = mysqli_fetch_assoc($result)){
  echo'
  <tr>
    <td>' . $row['teacher'] . '</td>
    <td>' . $row['teacherphone']. '</td>
    <td>
    <a class="btn btn-primary" href="?delete='.$row['teacher'].'" type="submit">Delete</a>

  </tr>
  '
       ;
  }
  ?>
</tbody>

	 </table>
	 <br>
	</div>
	<div class="checkreview">
	<a href="checkreview.php">Check Review</a>
	</div>
	<br><br>

  <div class="container">
  	<div class="row">
  		<div class="col-md-4"></div>
  		<div class="  p-3 border col-md-4 bg-transparent">


          <form action="currenttutor.php" method="post">
            <h1 style="text-align: center; ">Add tutor</h1>

            <label for="username">Enter Username:</label>
            <input type="username" class="form-control" name="tusername"  placeholder="Enter username ">
            <br><br><br>
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-outline-primary" type="submit" name="submit" value="submit">
            </div>
            <br>
          </form>


  		</div>
  		<div class="col-md-4"></div>
  	</div>
  </div>

	<div class="homebtn">
		<center><a href="home.php">Home</a></center>
	</div>

</body>
</html>
