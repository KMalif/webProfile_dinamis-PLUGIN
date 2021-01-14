<?php 
session_start();
include 'koneksi.php';
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$query=mysqli_query($koneksi, "SELECT username FROM admin WHERE id= '$id'");
	$result=mysqli_fetch_assoc($query);

	if($key === hash('sha256', $result['username'])){
		$_SESSION['login'] = true;
	}
}

if(isset($_SESSION["login"])){
	header("location: admin.php");
	exit;

}

if( isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result=mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");

        if(mysqli_num_rows($result) === 1){
           $row =  mysqli_fetch_assoc($result);
           if($password == $row["password"]){
			$_SESSION["login"] = true;
			if(isset($_POST['remember'])){
				setcookie('id',$row['id'], time() + 60);
				setcookie('key',hash('sha256', $row['username']), time() + 60);
			} 
               header("location: admin.php");
               exit;
           }
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLUGIN</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
    
<div class="container">
    <div class="row justify-content-center h-100">
        <div class="card w-25 my-auto">
            <div class="card-header bg-dark text-white text-center">
                <h2>Login Form</h2></div>
            <div class="card-body">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input type="text" id="username" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" id="password" class="form-control" name="password">
                    </div>
                    <input type="submit" class="btn btn-dark w-100" value="Login" name="login" >
                </form>
            </div>
            <div class="card-footer text-center">
                <small>&copy; PLUGIN</small></div>
        </div>
    </div>
</div>
</body>
</html>