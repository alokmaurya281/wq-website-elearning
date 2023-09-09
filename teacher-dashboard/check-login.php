<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['type']=='teachers'){
}
else{
	echo '<script>alert("Access denied");window.location.assign("../login.php");</script>';
}
?>