<?php
// session_start();
 include 'dbh.php';
 include 'session.php';

// $username=$_SESSION['username'];

$sql="SELECT * FROM student WHERE username='$username'";
$result=$conn->query($sql);
$retrive=mysqli_fetch_array($result);
//print_r($retrive);

$firstname=$retrive["firstname"];
$lastname=$retrive["lastname"];

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="profilestyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
  <div class="container-fluid">
    <h1><a style="color:white;" class="navbar-brand">Knowledge Hub</a></h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav p-4">
        <li class="nav-item"><a href="home.php" class="fa fa-home" style=" color: #ffc107 "><button class="btn btn-outline-warning" type="button">Home</button></a></li>
        <li class="nav-item"><a href="profile.php" class="fa fa-user-circle" style="color: #ffc107" ><button class="btn btn-outline-warning" >Profile</button></a></li>
        <li class="nav-item"><a href="findteacher.php" class="fa fa-search" style="color: #ffc107"><button class="btn btn-outline-warning">Find Teacher</button></a></li>
        <li class="nav-item"><a href="status.php" class="fa fa-users" style="color: #ffc107"><button class="btn btn-outline-warning">Status</button></a></li>
        <li class="nav-item"><a href="message.php" class="fa fa-telegram" style="color: #ffc107"><button class="btn btn-outline-warning">Messages</button></a></li>
        <li class="nav-item"><a href="logout.php" class="fa fa-sign-out" style="color: #ffc107"><button class="btn btn-outline-warning">Logout</button></a></li>
      </div>
    </div>
  </div>
</nav>
  <div class="welcome">
		<h4 class="serif">Welcome to Knowledge Hub <?php echo $firstname." ".$lastname."!"; ?></h4>
	</div>

	<div class="quotes">
		<h6 class="serif">"Education is the most powerful weapon which you can use to change the world" - Nelson Mandela</h6>

	</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
