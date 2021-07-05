

<?php 
	include('menu.php'); 
	session_start();
	session_unset();
	session_destroy();
	$_SESSION = array(); 
?>

-
<?php
	//php script to login & validation
	//session_start();
	if(isset($_POST['login'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);	
	$password = mysqli_real_escape_string($conn, $_POST['password']);	
		if($conn){
		$query = "SELECT * from users WHERE username = '$username'";
		$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
					if($password==$row['password'] && $username==$row['username']){
						if(empty($_SESSION["username"])){
							session_start();
							$_SESSION["username"] = $row['username'];
							$_SESSION["email"] = $row['email'];
							$_SESSION["role"] = $row['role'];
							//echo "session added!";
						}else {
							//echo "problem is here!";
						}
						echo "<center><h2 style='background:yellow;max-width:380px;'>Success</h2></center>";
						//echo $_SESSION["username"];
						//echo $_SESSION["Name"];
						echo "<script>window.location.href = 'index.php';</script>";
					} else{
						$_SESSION["username"] = "";
						session_unset();
						echo "<center><h2 style='background:red;max-width:380px;'>Apply correct credentials.</h2></center>";
						//echo "<script>window.location.href = 'index.php';</script>";
					}
				}
			}else{
				$_SESSION["username"] = "";
				session_unset();
				echo "<center><h2 style='background:red;max-width:380px;'>Apply correct credentials.</h2></center>";
				//echo "<script>window.location.href = 'index.php';</script>";
			}
		}else{
			echo "not connected";
		}
	}

?>

<?php include('footer.php'); ?>