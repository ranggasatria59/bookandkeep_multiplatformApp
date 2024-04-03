<?php
	session_start();
	include 'config.php';
	if(isset($_POST['login'])){
		$id_user  = $_POST['id_user'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$query_username = mysqli_query($connect,"SELECT * FROM user WHERE username='$username' AND password='$password'");
		if($query_username){
			$data = mysqli_fetch_array($query_username);
			if($password == $data['password']){
				echo $_SESSION['id_user'] = $data['id_user'];
				echo $_SESSION['username'] = $data['username'];
				echo $_SESSION['name'] = $data['nama'];
				if($data['level'] == 'admin'){
					header('location: admin/index.php');
				}else{
					header('location: index-user.php');
				}
			}else{
				echo "<script>alert('Password Salah atau belum diisi');</script>";
				echo "<script>window.history.back();</script>";
			}
		}else{
			echo "<script>alert('Username tidak terdaftar');</script>";
		}

	}
?>